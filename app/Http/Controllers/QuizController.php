<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Like;
use App\Models\Quiz;
use App\Models\Topic;
use App\Models\Answer;
use App\Models\Question;
use App\Imports\QuizImport;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Classes\SystemFileManager;

class QuizController extends Controller
{
    public function storeQuiz(Request $request){

        $request->validate([
            "question" => "required",
            "a" => "required",
            "b" => "required",
            "c" => "required",
            "answer" => "required",
            "topicid" => "required",
            "qid" => "required",
        ]);
        try {
            Quiz::create([
                "topic" => $request->topicid,
                "qid" => $request->qid,
                "question" => $request->question,
                "a" => $request->a,
                "b" => $request->b,
                "c" => $request->c,
                "d" => $request->d,
                "e" => $request->e,
                "answer_option" => $request->answer,
                "explanation" => $request->explanation,
            ]);
            return redirect()->back()->with(["success" => "Question uploaded"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateQuiz(Request $request){
        $request->validate([
            "question" => "required",
            "a" => "required",
            "b" => "required",
            "c" => "required",
            "answer" => "required",
            "id" => "required",
        ]);
        try {
            Quiz::where("id", $request->id)->update([
                "question" => $request->question,
                "a" => $request->a,
                "b" => $request->b,
                "c" => $request->c,
                "d" => $request->d,
                "e" => $request->e,
                "answer_option" => $request->answer,
                "explanation" => $request->explanation,
            ]);
            return redirect()->back()->with(["success" => "Question updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function deleteQuiz($id){
        try {
            Quiz::where("id", $id)->delete();
            return redirect()->back()->with(["success" => "Quiz Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function storeTopic(Request $request){
        $request->validate([
            "name" => "required",
            "image" => "required|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        try {
            $image = SystemFileManager::InternalUploader($request->image, "topic");
            Topic::create([
                "name" => $request->name,
                "image" => $image,
            ]);

            return redirect()->route("quiz.index")->with(["success" => "Topic uploaded"]);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateTopic(Request $request){
        $request->validate([
            "name" => "required",
            "image" => "image|mimes:jpg,png,jpeg|max:2048",
        ]);

        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "topic");
            }else{
                $image = $request->imagespan;
            }
            Topic::where("id", $request->id)->update([
                "name" => $request->name,
                "image" => $image,
            ]);
            return redirect()->route("quiz.index")->with(["success" => "Topic updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }



    public function deleteTopic($id){
        Topic::where("id", $id)->delete();
        Question::where("topicid", $id)->delete();
        Quiz::where("topic", $id)->delete();
        return redirect()->back()->with(["success" => "Topic Deleted"]);
    }



    public function storeQuestion(Request $request){
        $request->validate([
            "name" => "required",
            "time" => "required",
            "isfree" => "required",
            "file" => "mimes:xlsx,txt",
            "image" => "required|image|mimes:jpg,png,jpeg|max:2048"
        ]);

        try {
            $image = SystemFileManager::InternalUploader($request->image, "questions");
           $question =  Question::create([
                "userid" => auth()->user()->id,
                "name" => $request->name,
                "time" => $request->time,
                "topicid" => $request->topicid,
                "price" => $request->price,
                "isfree" => $request->isfree,
                "description" => $request->description,
                "image" => $image,
            ]);
            if($request->file){
                $questionid = $question->id;
                $quizpath = SystemFileManager::InternalUploader($request->file, "quiz");
                Excel::import(new QuizImport($request->topicid, $questionid), $quizpath);
            }
            return redirect()->route("view.test", $question->id)->with(["success" => "Question uploaded"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateQuestion(Request $request){
        $request->validate([
            "name" => "required",
            "time" => "required",
            "file" => "mimes:xlsx,txt",
            "isfree" => "required",
            "image" => "image|mimes:jpg,png,jpeg|max:2048"
        ]);

        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "questions");
            }else{
                $image = $request->imagespan;
            }
            Question::where("id", $request->id)->update([
                "userid" => auth()->user()->id,
                "name" => $request->name,
                "time" => $request->time,
                "topicid" => $request->topicid,
                "price" => $request->price,
                "isfree" => $request->isfree,
                "description" => $request->description,
                "image" => $image,
            ]);
            if($request->file){
                $quizpath = SystemFileManager::InternalUploader($request->file, "quiz");
                Excel::import(new QuizImport($request->topicid, $request->id), $quizpath);
            }
            return redirect()->route("view.test", $request->id)->with(["success" => "Question updated"]);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function deleteQuestion($id){
        Question::where("id", $id)->delete();
        Quiz::where("qid", $id)->delete();
        return redirect()->back()->with(["success" => "Question Deleted"]);
    }


    public function submitQuiz(Request $request) {
        $request->validate([
            "topic" => "required",
        ]);
        try {
            $questions = $request->question;

            $ref = generateRandomString(10);
            for ($i=0; $i < count($questions); $i++){
                    Answer::create([
                    "qid" => $request->qid,
                    "topic" => $request->topic,
                    "user_id" => Auth::user()->id,
                    "question" => $questions[$i],
                    "select" => $request->select[$i],
                    "mark" => $request->answer[$i],
                    "answer" => $request->answer_option[$i],
                    "ref" => $ref
                ]);
            }
            return redirect()->route('result.score', $ref);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function getQuiz($id) :JsonResponse {
        try {
           $quiz =  Quiz::where("qid", $id)->latest()->get()->toArray();
           $collection  = collect($quiz)->shuffle()->take(20);
            return response()->json([
                "status" => true,
                "data" => $collection->all(),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Oops, there was an error"
            ], 500);
        }
    }


    public function importQuestion(Request $request){
        $request->validate([
            "topic" => "required",
            "file" => "required|mimes:xlsx,txt"
        ]);
        try {
            $quizpath = SystemFileManager::InternalUploader($request->file, "quiz");
            Excel::import(new QuizImport($request->topic, ''), $quizpath);
            return redirect()->back()->with(["success" => "Question imported"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function likeQuiz($id, $status){
        try{
            if($status == 'like'){
                Like::create(['questionid' => $id, 'userid' => auth()->user()->id]);
                Question::find($id)->increment('likes');
            }else{
                Question::find($id)->decrement('likes');
                Like::where(['questionid' => $id, 'userid' => auth()->user()->id])->delete();
            }
            return redirect()->back()->with(['success' => "You $status course"]);
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
