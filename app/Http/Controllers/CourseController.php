<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Like;
use App\Models\Course;
use App\Models\Enrolled;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use App\Models\CurriculumLecture;
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

    public function updateCourse(Request $request){
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
                    if($request->courseVideoSpan == null){
                        return redirect()->back()->with(["error" => "You must provide a video"]);
                    }else{
                        $video = $request->courseVideoSpan;
                    }
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
            }else{
                $thumbnail = $request->courseThumbnailSpan;
            }

            Course::where('id', $request->id)->update([
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

            return redirect()->route('view.course', $request->id);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function deleteCourse($id){
        try {
            Course::where('id',$id)->delete();
            Curriculum::where('courseid', $id)->delete();
            CurriculumLecture::where('courseid', $id)->delete();
            return redirect()->back()->with(["success" => "Course Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateCourseStatus(Request $request){
        try {
            Course::where('id' , $request->id)->update(['status' => $request->status]);
            return redirect()->back()->with(["success" => "Course Status Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);

        }
    }

    public function newCurriculum(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);

        try{
            Curriculum::create([
                'name' => $request->name,
                'courseid' => $request->id
            ]);
            return redirect()->route('view.course', $request->id)->with(['success' => 'New Curriculum created']);
        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateCurriculum(Request $request){
        $request->validate([
            "name" => 'required',
            "id" => "required"
        ]);
        try{
            Curriculum::where('id', $request->id)->update(
                [
                    'name' => $request->name,
                ]);
            return redirect()->back()->with(["success" => "Curriculum Updated"]);
        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function deleteCurriculum($id, $courseid){
        try {
            Curriculum::where('id', $id)->delete();
            CurriculumLecture::where(['curriculumid' => $id, 'courseid' => $courseid])->delete();
            return redirect()->route('view.course', $courseid)->with(['success' => 'Curriculum deleted']);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function storeLecture(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'mediaTypeRaido' => 'required',
            'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
            'courseThumbnail' =>  'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $video = null;

            if($request->mediaTypeRaido == 'mp4'){
                if($request->courseVideo == null){
                    return redirect()->back()->with(["error" => "You must provide a video"]);
                }else{
                    $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                }
            }elseif($request->mediaTypeRaido == 'url'){
                if($request->courseURL == null){
                    return redirect()->back()->with(["error" => "You must provide a video url"]);
                }else{
                    $video = $request->courseURL;
                }
            }else if($request->mediaTypeRaido == 'youtube'){
                if($request->courseYoutube == null){
                    return redirect()->back()->with(["error" => "You must provide a youtube url"]);
                }else{
                    $video = $request->courseYoutube;
                }
            }else{
                return redirect()->back()->with(["error" => "Oops, there was an error"]);
            }
            $thumbnail = null;
            if($request->courseThumbnail){
                $thumbnail = SystemFileManager::InternalUploader($request->courseThumbnail, "thumbnails");
            }

            CurriculumLecture::create(
                [
                    'courseid' => $request->courseid,
                    'curriculumid' => $request->curriculumid,
                    'title' => $request->title,
                    'description' => $request->description,
                    'media_video' => $video,
                    'media_type' => $request->mediaTypeRaido,
                    'media_thumbnail'=> $thumbnail,
                ]
            );

            return redirect()->back()->with(['success' => 'New Lecture added']);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateLecture(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'mediaTypeRaido' => 'required',
            'id' => 'required',
            'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
            'courseThumbnail' =>  'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {

            $video = null;

            if($request->mediaTypeRaido == 'mp4'){
                if($request->courseVideo == null){
                    if($request->courseVideoSpan == null){
                        return redirect()->back()->with(["error" => "You must provide a video"]);
                    }else{
                        $video = $request->courseVideoSpan;
                    }
                }else{
                    $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                }
            }elseif($request->mediaTypeRaido == 'url'){
                if($request->courseURL == null){
                    return redirect()->back()->with(["error" => "You must provide a video url"]);
                }else{
                    $video = $request->courseURL;
                }
            }else if($request->mediaTypeRaido == 'youtube'){
                if($request->courseYoutube == null){
                    return redirect()->back()->with(["error" => "You must provide a youtube url"]);
                }else{
                    $video = $request->courseYoutube;
                }
            }else{
                return redirect()->back()->with(["error" => "Oops, there was an error"]);
            }
            $thumbnail = null;
            if($request->courseThumbnail){
                $thumbnail = SystemFileManager::InternalUploader($request->courseThumbnail, "thumbnails");
            }else{
                $thumbnail = $request->courseThumbnailSpan;
            }

            CurriculumLecture::where('id', $request->id)->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'media_video' => $video,
                    'media_type' => $request->mediaTypeRaido,
                    'media_thumbnail'=> $thumbnail,
                ]
            );

            return redirect()->back()->with(['success' => 'Lecture updated']);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
    public function deleteLecture($id){
        try {
            CurriculumLecture::where('id',$id)->delete();
            return redirect()->back()->with(['success' => 'Lecture deleted']);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function enrollFree(Request $request){
        try {
            Enrolled::create([
                'userid' => auth()->user()->id,
                'courseid' => $request->id,
                'is_free' => 1,
            ]);
            //increment course enrolled
            Course::find($request->id)->increment('enrolled');
            return redirect()->back()->with(['success' => 'Course Enrolled Successful']);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function likeCourse($id, $status){
        try{
            if($status == 'like'){
                Like::create(['courseid' => $id, 'userid' => auth()->user()->id]);
                Course::find($id)->increment('likes');
            }else{
                Course::find($id)->decrement('likes');
                Like::where(['courseid' => $id, 'userid' => auth()->user()->id])->delete();
            }
            return redirect()->back()->with(['success' => "You $status course"]);
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
