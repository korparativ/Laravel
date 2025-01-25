<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JsonParseController extends Controller
{
    //
    public function parseJson(Request $request){
        var_dump($request->json()->all());
    }
}
