<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function storeCourse(Request $request){
        try {
            dd($request->all());
        } catch (Exception $e) {
            dd($e);
        }
    }
}
