<?php

namespace App\Http\Controllers;

use App\Events\ChatPrivate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GroupChat;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\UserOnlined;
class ChatController extends Controller
{
   public function chat() {
        $users = User::where('id', '<>', Auth::user()->id)->get();
        return view('chat/chatpublic')->with([
            'users' => $users
        ]);
   }


   public function sendMessage(Request $req) {
    broadcast(new UserOnlined($req->user(), $req->message));
    
    return json_encode([
        'success' => 'done'
    ]);
   }

   public function chatPrivate($idUser){
    $user = User::find($idUser);
    return view('chat/chatprivate')->with([
        'user' => $user
    ]);
   }

   public function messagePrivate($idUser, Request $request){
    broadcast(new ChatPrivate($request->user(), User::find($idUser), $request->message));
    return response()->json('Msg broadcast');
   }
}
