<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('authentication')->group(function ()  {
    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('sendMessage');


    Route::get('/list-users', [UserController::class, 'showListUsers'])->name('showListUsers');
    Route::post('/post-add-user', [UserController::class, 'postAddUser'])->name('postAddUser');
    Route::post('/post-detail-user', [UserController::class, 'postDetailUser'])->name('postDetailUser');
    Route::post('/post-update-user', [UserController::class, 'postUpdateUser'])->name('postUpdateUser');
    Route::post('/post-delete-user', [UserController::class, 'postDeleteUser'])->name('postDeleteUser');

    // chat private
    Route::get('/chat-private/{idUser}', [ChatController::class, 'chatPrivate'])->name('chatPrivate');
    // gui tin nhan private
    Route::post('/post-message-private/{idUser}', [ChatController::class, 'messagePrivate'])->name('messagePrivate');


   // Creategroup
   Route::post('/create-group', [HomeController::class, 'createGroup'])->name('createGroup');
   Route::get('/chat-group/{grouId}', [HomeController::class, 'chatGroup'])->name('chatGroup');
   Route::post('/send-message-group', [HomeController::class, 'sendMessageGroup'])->name('sendMessageGroup');


});
