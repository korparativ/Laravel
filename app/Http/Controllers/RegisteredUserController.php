<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    //
    public function store(Request $request){
        $user = new User();
        return view('email/welcome', ['user' => $user]);
    }
}
