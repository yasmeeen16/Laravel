<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;

class Emp extends Controller
{
    public function index(){
        $emp = employee::all();
        return response()->json($emp);
    }
      public function employee($id){
        $emp = employee::find($id);
        return response()->json($emp);
    }
    public function employeeSearch(Request $request){
        $search= $request->search;
        $emp = employee::where('FirstName', 'LIKE',"%{$search}%")->get();
       return view("EmpList")->with(array('employee'=> $emp ));
    }
  
}