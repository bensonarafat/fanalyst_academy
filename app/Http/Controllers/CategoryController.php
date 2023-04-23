<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Classes\SystemFileManager;

class CategoryController extends Controller
{
    public function store(Request $request){

        $request->validate([
            "name" => 'required',
            "icon" => "image|mimes:jpg,png,jpeg,svg|max:2048"
        ]);
        try{
            $icon = null;
            if($request->icon){
                $icon = SystemFileManager::InternalUploader($request->icon, "icons");
            }
            Category::create(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    "parentid" => $request->category,
                    "icon" => $icon,
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
            "id" => "required",
            "icon" => "image|mimes:jpg,png,jpeg|max:2048"
        ]);
        try{
            if($request->iconspan){
                $icon = $request->iconspan;
            }else{
                $icon = SystemFileManager::InternalUploader($request->icon, "icons");
            }

            Category::where('id', $request->id)->update(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    "parentid" => $request->category,
                    "icon" => $icon,
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
