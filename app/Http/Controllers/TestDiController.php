<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CustomLogServiceInterface;
use App\Services\SmsSenderInterface;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class TestDiController extends Controller
{
    //
    public function showUrl(Request $request, CustomLogServiceInterface $customLogDbService){
        echo $request->getUri();
        $customLogDbService->rotateLogs();
    }

    public function sendSms(SmsSenderInterface $sender){
        $sender->send('Hello world!!!');
    }
}
