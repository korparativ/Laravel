<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestHeaderController extends Controller
{
    //
    public function getHeader(Request $request){
        $userAgent = $request->header('User-Agent');
        echo $userAgent . ' ';
        if($request->hasHeader('User-Agent')){
            echo $request->header('User-Agent');
        }
    }
}
