<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatPrivate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userSend;
    public $userRevice;
    public $message;
    public function __construct(User $userSend, User $userRevice,  $message)
    {
        $this->userSend = $userSend;
        $this->userRevice = $userRevice;
        $this->message = $message;
        
    }

    
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat.pirvate.'. $this->userSend->id . "." . $this->userRevice->id )
        ];
    }
}
