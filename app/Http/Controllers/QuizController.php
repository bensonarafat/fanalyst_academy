<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Quiz;
use App\Models\Topic;
use App\Models\Answer;
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
            "topic" => "required",
        ]);
        try {
            Quiz::create([
                "topic" => $request->topic,
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
            "level" => "required",
            "category" => "required",
            "time" => "required",
        ]);

        try {
            Topic::create([
                "name" => $request->name,
                "level" => $request->level,
                "category_id" => $request->category,
                "time" => $request->time,
            ]);

            return redirect()->route("quiz.index")->with(["success" => "Topic uploaded"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function updateTopic(Request $request){
        $request->validate([
            "name" => "required",
            "level" => "required",
            "category" => "required",
            "time" => "required",
            "id" => "required",
        ]);

        try {
            Topic::where("id", $request->id)->update([
                "name" => $request->name,
                "level" => $request->level,
                "category_id" => $request->category,
                "time" => $request->time,
            ]);

            return redirect()->route("quiz.index")->with(["success" => "Topic updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function deleteTopic($id){
        try {
            Topic::where("id", $id)->delete();
            Quiz::where("topic", $id)->delete();
            return redirect()->back()->with(["success" => "Topic Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
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
           $quiz =  Quiz::where("topic", $id)->latest()->get()->toArray();
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
            Excel::import(new QuizImport($request->topic), $quizpath);
            return redirect()->back()->with(["success" => "Question imported"]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
