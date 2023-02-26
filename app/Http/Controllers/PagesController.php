<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use App\Models\CurriculumLecture;
use App\Models\Enrolled;
use App\Models\Like;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        $totalSales = 0;
        $totalEnroll = 0;
        $totalCourse = 0;
        $totalStudents = 0;
        $courses = null;
        $instructors = null;
        $featured = null;
        $freeCourses = null;
        $paidCourses = null;
        if(Auth::check()){
            if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin'){
                $instructorCourses = Course::where('instructor', auth()->user()->id)->get();
                foreach ($instructorCourses as $row) {
                    $totalSales += Transaction::where(['courseid' => $row->id, 'status' => 'success'])->count();
                    $totalEnroll += Enrolled::where(['courseid' => $row->id])->count();
                }
                $totalCourse  = Course::where('instructor',auth()->user()->id)->count();
                $totalStudents = User::where('type', 'student')->count();
                $courses = Course::where(['instructor' => auth()->user()->id, 'status' => 'active'])->latest()->limit(5)->get();
            }else{
                $courses = Course::where('status', 'active')->latest()->limit(5)->get();
                $featured = Course::where('status', 'active')->orderBy('created_at', 'asc')->limit(5)->get();
                $instructors = User::where('type', 'instructor')->latest()->limit(5)->get();
            }
        }else{
            $freeCourses = Course::where(['status' =>  'active', 'is_free' => 0])->latest()->limit(10)->get();
            $paidCourses = Course::where(['status' =>  'active', 'is_free' => 1])->latest()->limit(10)->get();
        }
        return view("index", compact('totalSales', 'totalEnroll', 'totalCourse', 'totalStudents', 'instructors', 'courses', 'featured', 'freeCourses', 'paidCourses'));
    }

    public function about(){
        return view("about");
    }

    public function contact(){
        return view("contact");
    }

    public function students(){
        return view("students");
    }

    public function lectures(){
        return view("lectures");
    }

    public function privacy_policy(){
        return view('privacy_policy');
    }
    public function cookie(){
        return view('cookie');
    }

    public function instructorAgreement(){
        return view('instructor-agreement');
    }

    public function terms(){
        return view('terms');
    }

    public function faq(){
        return view('faq');
    }

    public function courseSection(){
        return view('course');
    }

    public function exploreView(){
        return view('course-explore');
    }

    public function addCategory(){
        return view('dashboard.category.add');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('dashboard.category.edit', compact('category'));
    }

    public function viewCategory($id){
        $category = Category::find($id);
        $courses = Course::where(['category' => $id, 'status' => 'active'])->latest()->get();
        return view('dashboard.category.view', compact('category', 'courses'));
    }
    public function explore(){
        $courses = Course::where('status', 'active')->latest()->get();
        return  view('dashboard.explore.index', compact('courses'));
    }

    public function saved(){
        return view('dashboard.saved.index');
    }

    public function analysis(){

        if(auth()->user()->type == "instructor"){
            $courses = Course::where(['status' => 'active', 'instructor' => auth()->user()->id])->latest()->get();
        }else{
            $courses = Course::where('status' , 'active', )->latest()->get();
        }

        return view('dashboard.analysis.index', compact('courses'));
    }

    public function cart(){
        return  view('dashboard.cart');
    }


    public function courses(){
        if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin'){
            if(auth()->user()->type == "instructor"){
                $courses = Course::where('instructor', auth()->user()->id)->latest()->get();
            }else{
                $courses = Course::latest()->get();
            }
        }else{
            $courses = Course::where('status', 'active')->latest()->get();
        }
        return view('dashboard.courses.index', compact('courses'));
    }

    public function createCourse(){
        $categories = Category::latest()->get();
        return view('dashboard.courses.create', compact('categories'));
    }

    public function viewCourse($id){
        $course = Course::find($id);
        $instructor = User::find($course->instructor);
        $rate = Rating::where('courseid', $course->id)->avg('vote');
        $ratings = Rating::where('courseid', $course->id)->get();
        $curriculum = Curriculum::where('courseid', $course->id)->get();

        $enrolled = Enrolled::where([ 'courseid' => $id])->count();
        $isLike = Like::where(['userid' => auth()->user()->id, 'courseid' =>  $id])->count();
        if($isLike == 0){
            $like = 'like';
        }else{
            $like = 'unlike';
        }
        $students = Enrolled::where([ 'courseid' => $id])->latest()->get();
        return view('dashboard.courses.view', compact('course', 'instructor', 'rate', 'ratings', 'curriculum', 'enrolled', 'like', 'students'));
    }

    public function editCourse($id){
        $course = Course::find($id);
        $categories = Category::latest()->get();
        return view('dashboard.courses.edit', compact('categories', 'course'));
    }

    public function editCurriculum($id){
        $curriculum = Curriculum::find($id);
        return view('dashboard.courses.curriculum.edit', compact('curriculum'));
    }

    public function addLecture($id){
        $curriculum = Curriculum::where('id', $id)->first();
        $lectures = CurriculumLecture::where('curriculumid', $id)->latest()->get();
        $curriculumid = $id;
        $courseid = $curriculum->courseid;
        return view('dashboard.courses.curriculum.lectures.add', compact('lectures', 'curriculumid', 'courseid'));
    }

    public function editLecture($id){
        $lecture = CurriculumLecture::find($id);
        return view('dashboard.courses.curriculum.lectures.edit', compact('lecture'));
    }

    public function notifications(){
        return view('dashboard.notifications.index');
    }

    public function reviews(){
        return view('dashboard.reviews.index');
    }

    public function earnings(){
        return view('dashboard.earnings.index');
    }


    public function payouts(){
        return view('dashboard.payouts.index');
    }

    public function statements(){
        return view('dashboard.statements.index');
    }

    public function verifications(){
        return view('dashboard.verifications.index');
    }

    public function users(){
        $users = User::latest()->get();
        return view('dashboard.users.index', compact('users'));
    }

    public function viewUser($id){
        $user = User::find($id);
        if(auth()->user()->type == 'student'){
            $courses = Enrolled::where('userid', auth()->user()->id)->latest()->get();
        }else{
            $courses = Course::where('instructor', auth()->user()->id)->latest()->get();
        }
        return view('dashboard.users.view', compact('user', 'courses'));
    }
    public function settings(){
        return view('dashboard.settings.index');
    }

    public function instructorApplication(){
        return view('dashboard.instructor-application');
    }

    public function stream($courseid, $curriculumid, $lectureid){
        $course = Course::find($courseid);
        $instructor = User::find($course->instructor);
        $lecture = CurriculumLecture::find($lectureid);
        return view('dashboard.courses.stream', compact('course','instructor', 'lecture'));
    }

    public function purchased($status){
        return view('dashboard.purchased', compact('status'));
    }
}

