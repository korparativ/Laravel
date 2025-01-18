<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function index(){
        return view('upload');
    }

    public function upload(Request $request){
        $number = $request->cookie('number_of_uploads') ? : 0;

        if($number>2){
            return response('To many uploads ' . $number);
        }
        $name = $request->input('file_name');
        $file = $request->file('uploaded_file');

        $tempPath = $file->getRealPath();
        $newFileName = $name . '.' . $file->getClientOriginalExtension();

        $file->move('public/uploads', $newFileName);

        $number++;

        echo $request->header('host') . '/public/uploads/' . $newFileName;
        return response ($request->header('host') . '/public/uploads/' . $newFileName)->cookie('number_of_uploads', $number);
    }
}
