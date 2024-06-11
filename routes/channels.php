<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
use App\Models\GroupChat;
use App\Models\GroupChatDetail;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    if($user != null) {
        return [
            'id' => $user->id,
            'name' => $user->name
        ];
    }else {
        return false;
    }
});

        Broadcast::channel('chat.private.{userSend}.{userRevice}', function($user, $userSend, $userRevice){
        if($user != null) {
        if($user->id == $userSend || $user->id == $userRevice) {
        return true;
        }
        }
        return false;
        });



Broadcast::channel('users', function ($user) {
    return $user != null;
});


Broadcast::channel('chat.group.{groupChatId}', function ($user, $groupChatId) {
    if($user){
    $groupChat = GroupChat::find($groupChatId);
    $menber_id = GroupChatDetail::where('groupchat_id', $groupChatId)->pluck('menber_id')->toArray();
    if($user->id == $groupChat->leader || in_array($user->id, $menber_id )){
    return true;
      
     }
  }
return false;
});

// Broadcast::channel('chat.group.{groupChatId}', function ($user, $groupChatId) {
//    if($user) {
//     $groupChat = GroupChat::find($groupChatId);
//     $menber_id = GroupChatDetail::where('groupchat_id', $groupChatId)->pluck('menber_id')->toArray();
//     if($user->id ==  $groupChat->leader || in_array($user->id, $menber_id)){
//         return true;
//     }
//    }
//    return false;
// });
