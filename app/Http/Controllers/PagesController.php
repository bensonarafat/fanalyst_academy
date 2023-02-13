<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Curriculum;
use App\Models\CurriculumLecture;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view("index");
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


    public function addCategory(){
        return view('dashboard.category.add');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('dashboard.category.edit', compact('category'));
    }

    public function viewCategory($id){
        $category = Category::find($id);
        return view('dashboard.category.view', compact('category'));
    }
    public function explore(){
        return  view('dashboard.explore.index');
    }

    public function saved(){
        return view('dashboard.saved.index');
    }

    public function analysis(){
        return view('dashboard.analysis.index');
    }

    public function courses(){
        $courses = Course::where('instructor', auth()->user()->id)->latest()->get();
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

        return view('dashboard.courses.view', compact('course', 'instructor', 'rate', 'ratings', 'curriculum'));
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
        return view('dashboard.users.view', compact('user'));
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

        return view('dashboard.courses.stream', compact('course','instructor'));
    }
}

