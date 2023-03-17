<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){

        $request->validate([
            "name" => 'required',
        ]);
        try{
            Category::create(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    "parentid" => $request->category,
                ]
                );
            return redirect()->back()->with(["success" => "Category Created"]);
        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function update(Request $request){
        $request->validate([
            "name" => 'required',
            "id" => "required"
        ]);
        try{
            Category::where('id', $request->id)->update(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    "parentid" => $request->category,
                ]
                );
            return redirect()->back()->with(["success" => "Category Updated"]);
        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function delete($id){
        try{
            Category::where('id', $id)->delete();
            return redirect()->back()->with(["success" => "Category deleted"]);
        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
