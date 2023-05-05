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
        $validator = validator($request->all(),
                    [
                        'title' => 'required',
                        'short_description' => 'required',
                        'description' => 'required',
                        'will_learn' => 'required',
                        'prerequisites' => 'required',
                        'category' => 'required',
                        'courseMediaType' => 'required',
                        'courseThumbnail' =>  'required|image|mimes:jpg,png,jpeg|max:2048',
                        'instructor_id' => 'required',
                    ]
        );

        if($validator->fails()) {
            // return as appropriate
            return response()->json($validator->errors(), 422);
        }

        try {

            $video = null;

            if($request->courseMediaType == 'mp4'){
                if($request->courseVideo == null || $request->courseVideo == 'null'){
                    // return redirect()->back()->with(["error" => "You must provide a video"]);
                    return response()->json(["status" => false, "error" => "You must provide a video"]);
                }else{
                    $validator = validator($request->all(),
                                [
                                    'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
                                ]
                    );
                    if($validator->fails()) {
                        return response()->json($validator->errors(), 422);
                    }
                    $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                }
            }elseif($request->courseMediaType == 'url'){
                if($request->courseURL == null){
                    return response()->json(["status" => false, "error" => "You must provide a video url"]);
                }else{
                    $video = $request->courseURL;
                }
            }else if($request->courseMediaType == 'youtube'){
                if($request->courseYoutube == null){
                    return response()->json(["status" => false, "error" => "You must provide a youtube url"]);
                }else{
                    $video = $request->courseYoutube;
                }
            }else{
                return response()->json(["status" => false, "error" => "Oops, there was an error"]);

            }

            $require_login = 0;
            $require_enroll = 0;
            $amount = 0.00;
            $discount = 0.00;
            $isFree = 0;

            if($request->is_free){
                $amount = $request->amount;
                $discount = $request->discount ?? 0.00;
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
                "instructor" => $request->instructor_id,
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
                "link" => generateRandomString(10),
            ]);

            return response()->json(['status' => true, 'data' => $course], 200);
            // return redirect()->route('view.course', $course->id);
        } catch (Exception $e) {
            return response()->json(['status' => false, "error" => "Oops, there was an error", 'e' => $e->getMessage()], 200);
            // return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateCourse(Request $request){
        $validator = validator($request->all(),
            [
                'title' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'will_learn' => 'required',
                'prerequisites' => 'required',
                'category' => 'required',
                'courseMediaType' => 'required',
            ]);

            if($validator->fails()) {
                // return as appropriate
                return response()->json($validator->errors(), 422);
            }
        try {

            $video = null;

            if($request->courseMediaType == 'mp4'){
                if($request->courseVideo == null || $request->courseVideo == 'null'){
                    if($request->courseVideoSpan == null || $request->courseVideoSpan == 'null'){
                        return response()->json(["status" => false, "error" => "You must provide a video"]);
                    }else{
                        $video = $request->courseVideoSpan;
                    }
                }else{
                    $validator = validator($request->all(),
                        [
                            'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
                        ]
                    );
                    if($validator->fails()) {
                        return response()->json($validator->errors(), 422);
                    }
                    $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                }

            }elseif($request->courseMediaType == 'url'){
                if($request->courseURL == null){
                    return response()->json(["status" => false, "error" => "You must provide a video url"]);
                }else{
                    $video = $request->courseURL;
                }
            }else if($request->courseMediaType == 'youtube'){
                if($request->courseYoutube == null){
                    return response()->json(["status" => false, "error" => "You must provide a youtube url"]);
                }else{
                    $video = $request->courseYoutube;
                }
            }else{
                return response()->json(["status" => false, "error" => "Oops, there was an error"]);
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
            if($request->courseThumbnail  == null || $request->courseThumbnail  == 'null'){
                $thumbnail = $request->courseThumbnailSpan;
            }else{
                $validator = validator($request->all(),
                    [
                        'courseThumbnail' =>  'image|mimes:jpg,png,jpeg|max:2048',
                    ]
                );
                if($validator->fails()) {
                    return response()->json($validator->errors(), 422);
                }
                $thumbnail = SystemFileManager::InternalUploader($request->courseThumbnail, "thumbnails");

            }

             Course::where('id', $request->id)->update([
                "title" => $request->title,
                "short_description" => $request->short_description,
                "description" => $request->description,
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

            return response()->json(['status' => true, 'id' => $request->id], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false, "error" => "Oops, there was an error", 'e' => $e->getMessage()]);
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

        $validator = validator($request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'lectureType' => 'required',
            ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {

            $video = null;

            if($request->lectureType == "video"){
                if($request->courseMediaType == 'mp4'){
                    if( $request->courseVideo == 'null'){
                        return response()->json(["status" => false, "error" => "You must provide a video"]);
                    }else{
                        $validator = validator($request->all(),
                                    [
                                        'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
                                    ]
                        );
                        if($validator->fails()) {
                            return response()->json($validator->errors(), 422);
                        }
                        $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                    }
                }elseif($request->courseMediaType == 'url'){
                    if($request->courseURL == null){
                        return response()->json(["status" => false, "error" => "You must provide a video url"]);
                    }else{
                        $video = $request->courseURL;
                    }
                }else if($request->courseMediaType == 'youtube'){
                    if($request->courseYoutube == null){
                        return response()->json(["status" => false, "error" => "You must provide a youtube url"]);
                    }else{
                        $video = $request->courseYoutube;
                    }
                }else{
                    return response()->json(["status" => false, "error" => "Oops, there was an error"]);
                }
            }else{
                if($request->courseDocument == 'null'){
                    return response()->json(["status" => false, "error" => "You must provide a course document"]);
                }else{
                    $validator = validator($request->all(),
                                [
                                    'courseDocument' =>  'mimes:doc,docx,pdf,jpg,png',
                                ]
                    );
                    if($validator->fails()) {
                        return response()->json($validator->errors(), 422);
                    }
                    $courseDocument = SystemFileManager::InternalUploader($request->courseDocument, "document");
                }
            }

            $thumbnail = null;

            if($request->courseThumbnail != 'null'){
                $validator = validator($request->all(),
                                [
                                    'courseThumbnail' =>  'required|image|mimes:jpg,png,jpeg|max:2048',
                                ]
                    );
                    if($validator->fails()) {
                        return response()->json($validator->errors(), 422);
                    }
                $thumbnail = SystemFileManager::InternalUploader($request->courseThumbnail, "thumbnails");
            }

            $CurriculumLecture = CurriculumLecture::create(
                [
                    'courseid' => $request->courseid,
                    'curriculumid' => $request->curriculumid,
                    'title' => $request->title,
                    'description' => $request->description,
                    'media_video' => $video,
                    'document' => $courseDocument,
                    'media_type' => $request->courseMediaType,
                    'media_thumbnail'=> $thumbnail,
                    "lecture_type" => $request->lectureType
                ]
            );
            return response()->json(['status' => true, 'data' => $CurriculumLecture], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false, "error" => "Oops, there was an error"]);
        }
    }

    public function updateLecture(Request $request){

        $validator = validator($request->all(),
        [
            'title' => 'required',
            'description' => 'required',
            'courseMediaType' => 'required',
            'lectureType' => 'required',
            'id' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {

            $video = null;

            if($request->lectureType == "video"){
                if($request->courseMediaType == 'mp4'){
                    if($request->courseVideo == 'null'){
                        if($request->courseVideoSpan == 'null'){
                            return response()->json(["status" => false, "error" => "You must provide a video"]);
                        }else{
                            $video = $request->courseVideoSpan;
                        }
                    }else{
                        $validator = validator($request->all(),
                            [
                                'courseVideo' =>  'mimes:mp4,ogx,oga,ogv,ogg,webm',
                            ]
                        );
                        if($validator->fails()) {
                            return response()->json($validator->errors(), 422);
                        }
                        $video = SystemFileManager::InternalUploader($request->courseVideo, "videos");
                    }

                }elseif($request->mediaTypeRaido == 'url'){
                    if($request->courseURL == null){
                        return response()->json(["status" => false, "error" => "You must provide a video url"]);
                    }else{
                        $video = $request->courseURL;
                    }
                }else if($request->mediaTypeRaido == 'youtube'){
                    if($request->courseYoutube == null){
                        return response()->json(["status" => false, "error" => "You must provide a youtube url"]);
                    }else{
                        $video = $request->courseYoutube;
                    }
                }else{
                    return response()->json(["status" => false, "error" => "Oops, there was an error"]);
                }
            }else{
                if($request->courseDocument == 'null'){
                    if($request->courseDocumentSpan == 'null'){
                        return response()->json(["status" => false, "error" => "You must provide a document"]);
                    }else{
                        $courseDocument = $request->courseDocumentSpan;
                    }
                }else{
                    $validator = validator($request->all(),
                                [
                                    'courseDocument' =>  'mimes:doc,docx,pdf,jpg,png',
                                ]
                    );
                    if($validator->fails()) {
                        return response()->json($validator->errors(), 422);
                    }
                    $courseDocument = SystemFileManager::InternalUploader($request->courseDocument, "document");
                }
            }

            $thumbnail = null;
            if($request->courseThumbnail  == 'null'){
                $thumbnail = $request->courseThumbnailSpan;
            }else{
                $validator = validator($request->all(),
                    [
                        'courseThumbnail' =>  'image|mimes:jpg,png,jpeg|max:2048',
                    ]
                );
                if($validator->fails()) {
                    return response()->json($validator->errors(), 422);
                }
                $thumbnail = SystemFileManager::InternalUploader($request->courseThumbnail, "thumbnails");

            }

            CurriculumLecture::where('id', $request->id)->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'media_video' => $video,
                    'media_type' => $request->courseMediaType,
                    'media_thumbnail'=> $thumbnail,
                    'document' => $courseDocument,
                    "lecture_type" => $request->lectureTyp,
                ]
            );
            $lecture = CurriculumLecture::find($request->id);

            return response()->json(['status' => true, 'id' => $lecture->curriculumid], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false, "error" => "Oops, there was an error", 'e' => $e->getMessage()]);

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
