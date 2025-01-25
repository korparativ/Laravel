<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestTestController extends Controller
{
    //
    public function testRequest(Request $request){

        // $firstName = $request->input('first_name', 'User');
        // $lastName = $request->input('last_name', 'None');

        // echo $firstName . ' ' . $lastName;

        // $firstName = $request->all();
        // print_r($firstName);

        // $requestParam = $request->all();
        // echo $requestParam['first_name'];

        $requestParam = $request->collect();
        //var_dump($requestParam);
        $requestParam->each(function($field){
            echo $field . ' ';
        });
    }
}
