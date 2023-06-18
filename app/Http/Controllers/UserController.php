<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Like;
use App\Models\User;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Wallet;
use App\Models\Earning;
use App\Models\Enrolled;
use App\Models\Question;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\QuizEnrolled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Classes\SystemFileManager;
use App\Mail\InstructorSignUp;
use App\Mail\InstructorSignUpAdmin;

class UserController extends Controller
{


    public function instructorApplication(Request $request){
       $request->validate([
            'fullname' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'photo' => 'mimes:jpeg,png,jpg|max:4048',
            'dob' => 'required',
            'email' => 'required',
            'address' => 'required',
            'job_title' => 'required',
            'school_name' => 'required',
            'degree' => 'required',
            'about_me' => 'required',
            'cv' => 'mimes:jpeg,png,jpg,pdf|max:4048',
            'sample_video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm|max:20480',
            'agree'=> "required",
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
            if($request->sample_video){
                $sample_video = SystemFileManager::InternalUploader($request->sample_video, "documents");
            }else{
                $sample_video = $request->sample_videospan;
            }
            User::where('id', auth()->user()->id)->update([
                'fullname' => $request->fullname,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
                'photo' => $photo,
                'dob' => $request->dob,
                'address' => $request->address,
                'about_me' => $request->about_me,
                'job_title' => $request->job_title,
                'school_name' => $request->school_name,
                'degree' => $request->degree,
                'cv' => $cv,
                'sample_video' => $sample_video,
                'instructor_status' => 'pending',
            ]);
            $data = [
                "fullname" => $request->fullname,
                "email" => auth()->user()->email,
                "mobile" => $request->mobile,
                "gender" => $request->gender,
                "status" => "complete",
            ];

        Mail::to($data['email'])->send(new InstructorSignUp($data));
        Mail::to('support@fanalystacademy.org')->send(new InstructorSignUpAdmin($data));

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

    public function updateBankDetails(Request $request){
        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
        ]);

        try {
            User::where("id", auth()->user()->id)->update(
                [
                    "account_name" => $request->account_name,
                    "account_number" => $request->account_number,
                    "bank_name" => $request->bank_name
                ]
            );
            return redirect()->back()->with(['success' => 'Bank details Updated']);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }


    public function deleteUser($id){
        User::whereId($id)->delete();
        Course::where("instructor", $id)->delete();
        Rating::where("userid", $id)->delete();
        Transaction::where("userid", $id)->delete();
        Enrolled::where("userid", $id)->delete();
        QuizEnrolled::where("userid", $id)->delete();
        Like::where("userid", $id)->delete();
        // Notification::where("userid", $id)->delete();
        Question::where("userid", $id)->delete();
        Answer::where("user_id", $id)->delete();
        Wallet::where("userid", $id)->delete();
        Earning::where("userid", $id)->delete();
        return redirect()->back()->with(['success' => 'Account Deleted']);
    }


    public function withdrawal(Request $request){
        try {
            $amount = $request->amount;
            $wallet = Wallet::where("userid", $request->id)->first();
            if($amount > $wallet->balance){
                return redirect()->back()->with(["error" => "There is not enough amount for the withdrawal"]);
            }else{
                $balance = floatval($wallet->balance) - floatval($amount);
                Wallet::where("userid", $request->id)->update([
                    "balance" => $balance
                ]);
                //store withdrawal history
                Earning::create([
                    "userid" => $request->id,
                    "amount" => $amount,
                    "type" => "withdrawal",
                ]);
                //mail
                return redirect()->back()->with(['success' => 'Amount withdraw to User Account']);
            }
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
