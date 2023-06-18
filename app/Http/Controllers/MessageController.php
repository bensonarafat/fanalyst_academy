<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;

class MessageController extends Controller
{
    public function conversations(): JsonResponse {
        //check if conversation already exist
        $exists = Conversation::
                where("user2_id", auth()->user()->id)
                ->orWhere("user1_id", auth()->user()->id)
                ->exists();
        if($exists){
            $conversations = Conversation::
                where("user2_id", auth()->user()->id)
                ->orWhere("user1_id", auth()->user()->id)
                ->with(["lastMessage"])
                ->latest()->get();

                foreach($conversations as $conv){
                    if(auth()->user()->id == $conv->user2_id){
                        $user = User::find($conv->user1_id);
                        // count number of unseen
                        $unseen = Message::where(["sender_id" => $conv->user1_id, "seen" => "0"])->count();
                    }else{
                        $user = User::find($conv->user2_id);
                        $unseen = Message::where(["sender_id" => $conv->user2_id, "seen" => "0"])->count();

                    }

                    $conv['user'] = $user;
                    $conv['unseen'] = $unseen;
                }

                return response()->json([
                    "status" => true,
                    "message" => "Conversation found",
                    "conversations" => $conversations
                ], 200);
        }else{
            return response()->json([
                "status" => false,
                "message" => "No Conversation yet"
            ], 200);
        }
    }
    public function messages($conversationId) : JsonResponse {
        $messages = Message::where("conversation_id", $conversationId)->with(['user', "conversation"])->orderBy("created_at", "ASC")->get();
        //update seen
        Message::where(["conversation_id" => $conversationId])->whereNotIn("sender_id", [auth()->user()->id])->update(["seen" => "1"]);
        return response()->json([
            "status" => true,
            "messages" => $messages
        ], 200);
    }
    public function chatMessage(Request $request) : JsonResponse{
        //check if conversation already exist
        $exists = Conversation::
                                where(["user1_id" => $request->receiver_id, "user2_id" => auth()->user()->id])
                                ->orWhere(["user1_id" => auth()->user()->id, "user2_id" => $request->receiver_id])
                                ->exists();
        if($exists){
            $conversation = Conversation::
                            where(["user1_id" => $request->receiver_id, "user2_id" => auth()->user()->id])
                            ->orWhere(["user1_id" => auth()->user()->id, "user2_id" => $request->receiver_id])
                    ->first();
            $message = Message::create([
                "conversation_id" => $conversation->id,
                "sender_id" => auth()->user()->id,
                "message" => $request->message,
            ]);
            Conversation::whereId($conversation->id)->update([
                "last_message_id" => $message->id,
            ]);

            broadcast(new NewChatMessage($message))->toOthers();
        }else{
            //create new conversation
            $coversation = Conversation::create([
                "user1_id" => auth()->user()->id,
                "user2_id" => $request->receiver_id,
            ]);

            $message = Message::create([
                "conversation_id" => $coversation->id,
                "sender_id" => auth()->user()->id,
                "message" => $request->message,
            ]);

            Conversation::whereId($coversation->id)->update([
                "last_message_id" => $message->id,
            ]);

            broadcast(new NewChatMessage($message))->toOthers();
        }

        return response()->json([
            "status" => true
        ], 200);
    }


    public function startMessage(Request $request) {
        //check if conversation already exist
        $exists = Conversation::
                        where(["user1_id" => $request->receiver_id, "user2_id" => auth()->user()->id])
                        ->orWhere(["user1_id" => auth()->user()->id, "user2_id" => $request->receiver_id])
                                ->exists();
        if($exists){
            $conversation = Conversation::
                        where(["user1_id" => $request->receiver_id, "user2_id" => auth()->user()->id])
                        ->orWhere(["user1_id" => auth()->user()->id, "user2_id" => $request->receiver_id])
                ->first();
            $message = Message::create([
                "conversation_id" => $conversation->id,
                "sender_id" => auth()->user()->id,
                "message" => $request->message,
            ]);
            Conversation::whereId( $conversation->id)->update([
                "last_message_id" => $message->id,
            ]);

            broadcast(new NewChatMessage($message))->toOthers();
        }else{
            //create new conversation
            $coversation = Conversation::create([
                "user1_id" => auth()->user()->id,
                "user2_id" => $request->receiver_id,
            ]);

            $message = Message::create([
                "conversation_id" => $coversation->id,
                "sender_id" => auth()->user()->id,
                "message" => $request->message,
            ]);

            Conversation::whereId($coversation->id)->update([
                "last_message_id" => $message->id,
            ]);
            broadcast(new NewChatMessage($message))->toOthers();
        }
        return redirect()->route("messages.index");
    }
}
