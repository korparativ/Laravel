<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestRedirectController extends Controller
{
    //
    public function __invoke(){

        //return redirect()->away('https://google.com');

        //return redirect()->action([LibraryUserController::class, 'show'], ['id' => 1]);

        return redirect()->route('books');
    }
}
