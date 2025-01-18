<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    //
    protected $books = [
        'book 1', 'book 2', 'book 3'
    ];
    
    public function index(){
        return view('books', ['books' => $this->books]);
    }

    public function delete($id){
        if (array_key_exists($id, $this->books)){
            unset($this->books[$id]);
        }
        return view('books', ['books' => $this->books]);
    }

    public function store(Request $request){
        if($request->book_name){
            $this->books[] = $request->book_name;
        }
        return view('books', ['books' => $this->books]);
    }
}
