<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormProcessor extends Controller
{
    //
    public function index(){
        return view('formProcessor');
    }

    public function store(Request $request){
        $userForm = ['User name' => $request->username, 'Last name' => $request->last_name, 'email' => $request->email];

        // return response()->json($userForm);
        return view('helloFormProcessor', ['name' => $request->username, 'last_name' => $request->last_name, 'email' => $request->email]);
    }
}
