<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function showUser(){

        // DB::connection('mysql')->table('user')->insert(['first_name' => 'Nikolay', 'last_name' => 'Nikolaev', 'email' => 'nikolaev@mail.ru']);
        // DB::connection('mysql')->table('user')->insert(['first_name' => 'Semen', 'last_name' => 'Sidorov', 'email' => 'sidorov@mail.ru']);
        // DB::connection('mysql')->table('user')->insert(['first_name' => 'Nikita', 'last_name' => 'Novikov', 'email' => 'novikov@mail.ru']);
        $users = DB::connection('mysql')->table('user')->select(['first_name', 'last_name', 'email'])->get();

        return view('user', ['users' => $users]);
    }
}
