<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SimpleController extends Controller
{
    //
    public function test(Request $request){
        $response = ['param' => $request->param, 'param1' => $request->param1];

        // return new Response(json_encode($response));
        return response()->json($response);
    }
}
