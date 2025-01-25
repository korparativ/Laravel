<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    // public function index(){
    //     return view('formProcessor');
    // }

    public function index(){
        return view('employee');
    }

    public function store(Request $request){

        //
        $textJson = $request->input('textarea', 'None');
        $textJsonDecode = json_decode($textJson, true);
        $employees = new Employee();
        $employees->first_name = $request->input('name', 'None');
        $employees->last_name = $request->input('last_name', 'None');
        $employees->address = $request->input('address', 'None');
        $employees->email = $request->input('email', 'None');
        $employees->workData = $request->input('workData', 'None');
        $employees->textarea = $request->input('textarea', 'None');
        $employees->save();
        $users = DB::connection('mysql')->table('employees')->select(['id', 'first_name', 'last_name', 'address', 'email', 'workData', 'textarea'])->get();

        return view('employeeView', ['users' => $users]);

    }

    public function update(Request $request, $id){
        DB::connection('mysql')->table('employees')->where('id', '=', $id)->update(['first_name' => $request->input('name', 'None')]);

    }

    public function getPath(Request $request){
        $path = $request->path();
        return $path;
    }

    public function getUrl(Request $request){
        $url = $request->url();
        return $url;
    }
}
