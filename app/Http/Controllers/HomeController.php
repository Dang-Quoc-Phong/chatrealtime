<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\GroupChat;
use App\Models\GroupChatDetail;
use App\Events\ChatGroup;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '<>', Auth::user()->id)->get();
        $myGroup = GroupChat::where('leader', Auth::user()->id)
        ->select('groupchat.id', 'groupchat.name')
        ->get();
        $myGroupNotLeader = GroupChat::
        leftJoin('groupchat_detail', 'groupchat.id', '=', 'groupchat_detail.groupchat_id')
        ->select('groupchat.id as groupchatId', 'groupchat.name')
        ->where('groupchat_detail.menber_id',  Auth::user()->id)->get();

        return view('home')->with([
            'users' => $users,
            'myGroup' => $myGroup,
            'myGroupNotLeader' =>  $myGroupNotLeader
        ]);
    }

    public function createGroup(Request $req) {
        if(count($req->menber) >= 3) {
            $data = [
                'name' => $req->name,
                'leader' => Auth::user()->id

            ];
            $groupChat = GroupChat::create($data);
            foreach($req->menber as $menber) {
                $data = [
                    'groupchat_id' => $groupChat->id,
                    'menber_id' => $menber
                ];
                GroupChatDetail::create($data);
            }

        }
        return redirect()->back();
        
    }

    public function chatGroup($grouId) {
        $groupChat = GroupChat::find($grouId);
        $leader = User::find($groupChat->leader);
        $menber_id = GroupChatDetail::where('groupchat_id', $grouId)->pluck('menber_id')->toArray();
        $menber = User::whereIn('id', $menber_id)->get();
        return view('chat/chatgroup')->with([
            'groupChat' =>  $groupChat,
            'leader'    =>  $leader,
            'menber'    =>  $menber
        ]);
    }



    public function sendMessageGroup(Request $req){
        broadcast(new ChatGroup(
        GroupChat::find($req->groupId),
        $req->user(),
        $req->message,
        ));
        return response()->json('message broadcast send');
    }
}
    
