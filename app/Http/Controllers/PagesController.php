<?php

namespace App\Http\Controllers;

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
}
