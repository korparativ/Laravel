<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    //
    public function index(){
        return view('form');
    }

    public function store(Request $request){

        $request->validate([
            'title' => ['required', 'max:255', 'unique:books'],
            'author' => ['required', 'max:100']
        ]);
        $book = new Book($request->all());
        $book->save();

        // $books = DB::connection('mysql')->table('books')->select(['id', 'title', 'author', 'genre'])->get();

        // return view('bookView', ['books' => $books]);

        return response()->json('Book is successfully validated and data has been saved');

    }
}
