<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
class UserController extends Controller
{
    public function showListUsers() {
        $users = User::get();
        return view('users/showUsers')->with([
            'users' => $users
        ]);
    }

    public function postAddUser(Request $req) {
        $data = [
            'name' => $req->name,
            'image' => $req->image,
            'email' => $req->email,
            'password' => Hash::make('password')
        ];
        $user = User::create($data);
        broadcast(new UserCreated($user));
        return json_encode([
            'success' => 'done'
        ]);
    }

    public function postDetailUser(Request $req){
        $user = User::select('name', 'image', 'email')->find($req->id);
        return json_decode($user);
    }

    public function postUpdateUser(Request $req){
        $data = [
            'name' => $req->name,
            'image' => $req->image,
            'email' => $req->email,
            
        ];
        User::where('id', $req->id)->update($data);
        broadcast(new UserUpdated(User::find( $req->id)));
        return json_encode([
            'success' => 'done'
        ]);
    }

    public function postDeleteUser(Request $req){
        broadcast(new UserDeleted(User::find( $req->id)));
        User::where('id', $req->id)->delete();
        return json_encode([
            'success' => 'done'
        ]);
    }
}
