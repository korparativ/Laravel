<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CustomLogServiceInterface;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class TestDiController extends Controller
{
    //
    public function showUrl(Request $request, CustomLogServiceInterface $customLogDbService){
        echo $request->getUri();
        $customLogDbService->rotateLogs();
    }
}
