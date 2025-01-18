<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendFileController extends Controller
{
    //
    public function __invoke(){
        return response()->file('C:\Users\korpa\Documents\Разработчик\PHP_Laravel\lesson1\example-app\public\uploads\matrix.pdf');
    }
}
