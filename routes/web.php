<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\LogRequestMiddleware;
use App\Mail\BookingCompletedMeiling;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('log-request')->group(function (){
    Route::get('/log-ip', function(){
         return response()->json(['status' => 'success']);
        });
});

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{user}', [UsersController::class, 'show']);

Route::get('book', function(){
    $email = 'korparativ1990@gmail.com';
    Mail::to($email)->send(new BookingCompletedMeiling());
    return response()->json(['status' => 'success']);
});

Route::get('test-telegram', function(){
    \Telegram\Bot\Laravel\Facades\Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID'),
        'parse_mod' => 'html',
        'text' => 'Произошло тестовое событие'
    ]);
    return response()->json(['status' => 'success']);
});
