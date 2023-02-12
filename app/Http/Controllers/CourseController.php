<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Classes\SystemFileManager;

class CourseController extends Controller
{
    public function storeCourse(Request $request){
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'will_learn' => 'required',
            'prerequisites' => 'required',
            'category' => 'required',
            'courseMediaType' => 'required',
            'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
            'courseThumbnail' =>  'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $video = null;

            if($request->courseMediaType == 'mp4'){
                if($request->courseVideo == null){
                    return redirect()->back()->with(["error" => "You must provide a video"]);
                }else{
                    $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                }
            }elseif($request->courseMediaType == 'url'){
                if($request->courseURL == null){
                    return redirect()->back()->with(["error" => "You must provide a video url"]);
                }else{
                    $video = $request->courseURL;
                }
            }else if($request->courseMediaType == 'youtube'){
                if($request->courseYoutube == null){
                    return redirect()->back()->with(["error" => "You must provide a youtube url"]);
                }else{
                    $video = $request->courseYoutube;
                }
            }else{
                return redirect()->back()->with(["error" => "Oops, there was an error"]);
            }

            $require_login = 0;
            $require_enroll = 0;
            $amount = 0.00;
            $discount = 0.00;
            $isFree = 0;
            if($request->is_free){
                $amount = $request->amount;
                $discount = $request->discount;
                $isFree = 1;
            }else{
                if($request->require_login){
                    $require_login = 1;
                }
                if($request->require_enroll){
                    $require_enroll = 1;
                }
            }

            $thumbnail = null;
            if($request->courseThumbnail){
                $thumbnail = SystemFileManager::InternalUploader($request->courseThumbnail, "thumbnails");
            }
            $course = Course::create([
                "title" => $request->title,
                "short_description" => $request->short_description,
                "description" => $request->description,
                "instructor" => auth()->user()->id,
                "category" => $request->category,
                "will_learn" => $request->will_learn,
                "prerequisites" => $request->prerequisites,
                "is_free" => $isFree,
                "require_enroll" => $require_enroll,
                "require_login" => $require_login,
                "amount" => $amount,
                "discount" => $discount,
                "media_video" => $video,
                "media_type" => $request->courseMediaType,
                "media_thumbnail" => $thumbnail,
            ]);

            return redirect()->route('view.course', $course->id);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
