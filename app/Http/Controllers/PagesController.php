<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
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
        return view('dashboard.courses.index');
    }

    public function createCourse(){
        $categories = Category::latest()->get();
        return view('dashboard.courses.create', compact('categories'));
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
}

