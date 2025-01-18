<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryUserController extends Controller
{
    protected $users = [
        ['id' => 0, 'username' => 'user1', 'first_name' => 'vasiliy', 'last_name' => 'pupkin', 'list_of_books' => ['book1', 'book2', 'book3']],
        ['id' => 1, 'username' => 'user2', 'first_name' => 'vitaliy', 'last_name' => 'ivanov', 'list_of_books' => ['book4', 'book5', 'book6']]
    ];
    public function show($id){

        return view('user', ['user' => $this->users[$id]]);
    }
}
