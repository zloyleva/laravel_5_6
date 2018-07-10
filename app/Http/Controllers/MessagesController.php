<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Message $message){
        return view('chat');
    }

    public function store(Request $request){
        $user = auth()->user();
        $message = $user->messages()->create([
            'text' => $request->get('text'),
            'chat_id' => 1
        ]);

        return $message;
    }

    public function list(Message $message){
        return $message->with('user')->get();
    }
}
