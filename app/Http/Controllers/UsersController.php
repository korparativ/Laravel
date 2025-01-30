<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function index(){
        //$users = DB::connection('mysql')->table('users')->select(['id', 'name', 'surname', 'email'])->get();
        return view('addUser');
    }

    public function getUser($id) {
        $users = Users::where('id', $id)->get();
        return view('usersView', ['users' => $users]);
    }

    public function addUser(Request $request){
        $request->validate([
            'name' => ['required', 'max:50'],
            'surname' => ['required', 'max:50'],
            'email' => ['required', 'email']
        ]);

        $users = new Users($request->all());
        $users->save();
        $users = DB::connection('mysql')->table('users')->select(['id', 'name', 'surname', 'email'])->get();
        return view('usersView', ['users' => $users]);
    }
}
