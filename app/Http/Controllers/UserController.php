<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Classes\SystemFileManager;

class UserController extends Controller
{


    public function instructorApplication(Request $request){
       $request->validate([
            'fullname' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'photo' => 'mimes:jpeg,png,jpg|max:4048',
            'town' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'address' => 'required',
            'about_me' => 'required',
            'email' => 'required',
            'job_title' => 'required',
            'skills' => 'required',
            'school_name' => 'required',
            'degree' => 'required',
            'employment_title' => 'required',
            'employment_company' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'cv' => 'mimes:jpeg,png,jpg,pdf|max:4048',
            'certificate' => 'mimes:jpeg,png,jpg|max:4048',
       ]);

       try{
            if($request->photo){
                $photo = SystemFileManager::InternalUploader($request->photo, "photo");
            }else{
                $photo = $request->photospan;
            }
            if($request->cv){
                $cv = SystemFileManager::InternalUploader($request->cv, "documents");
            }else{
                $cv = $request->cvspan;
            }
            if($request->certificate){
                $certificate = SystemFileManager::InternalUploader($request->certificate, "documents");
            }else{
                $certificate = $request->certificatespan;
            }
            User::where('id', auth()->user()->id)->update([
                'fullname' => $request->fullname,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
                'photo' => $photo,
                'town' => $request->town,
                'dob' => $request->dob,
                'city' => $request->city,
                'address' => $request->address,
                'about_me' => $request->about_me,
                'job_title' => $request->job_title,
                'skills' => $request->skills,
                'school_name' => $request->school_name,
                'degree' => $request->degree,
                'employment_title' => $request->employment_title,
                'employment_company' => $request->employment_company,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'bank_name' =>  $request->bank_name,
                'cv' => $cv,
                'certificate' => $certificate,
                'instructor_status' => 'pending',
                'youtube_url' =>  $request->youtube_url,
                'twitter_url' => $request->twitter_url,
                'facebook_url' => $request->facebook_url,
                'linkedin_url' => $request->linkedin_url,
            ]);
        return redirect()->back()->with(["success" => "Instructor Application Sent"]);
       }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
       }
    }

    public function updateInstructorStatus(Request $request){
        $request->validate([
            'status' => 'required',
            'id' => 'required'
        ]);
        try{
            $data = [];
            if($request->status == 'approved'){
                $data['type']  = 'instructor';
                $data['roleid'] = 2;
            }
            $data['instructor_status'] = $request->status;

            User::where('id', $request->id)->update($data);
            return redirect()->back()->with(['success' => 'Instructor Status Updated']);
        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateProfile(Request $request){
        $request->validate([
            'fullname' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'photo' => 'mimes:jpeg,png,jpg|max:4048',
            'town' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        try {
            if($request->photo){
                $photo = SystemFileManager::InternalUploader($request->photo, "photo");
            }else{
                $photo = $request->photospan;
            }
            User::where('id', auth()->user()->id)->update(
                [
                    "fullname" =>  $request->fullname,
                    "mobile" => $request->mobile,
                    "gender" => $request->gender,
                    "photo" => $photo,
                    "town" => $request->town,
                    "dob" => $request->dob,
                    "city" => $request->city,
                    "address" => $request->address,
                    'youtube_url' =>  $request->youtube_url,
                    'twitter_url' => $request->twitter_url,
                    'facebook_url' => $request->facebook_url,
                    'linkedin_url' => $request->linkedin_url,
                ]
            );

            return redirect()->back()->with(['success' => 'Account Updated']);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);

        }
    }
}
