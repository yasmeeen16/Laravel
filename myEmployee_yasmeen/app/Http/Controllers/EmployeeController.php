<?php

namespace App\Http\Controllers;

use App\employee;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::get(); 
        return view("index")->with(array('employee'=>  $employees));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = employee::get(); 
        return view("list")->with(array('employee'=>  $employees));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    use AuthenticatesUsers;
    public function store(Request $request )
    {
            $imgPath="";
            if ($request->hasFile('img')){
                $imgPath=$request->file('img')->Store('public');
            }
            $employees=new employee;
            User::create([
                'name' => $request->fName,
                'email' => $request->uEmail,
                'password' => Hash::make($request->uPass),
                'admin' => $request->admin,
            ]);
            // $users->name=$request->fName;
            // $users->email=$request->uEmail;
            // $users->password=$request->uPass;
      
            echo $imgPath;
            $employees->FirstName= $request->fName;
            $employees->SecondName= $request->sName;
            $employees->img= $imgPath;
            $employees->job= $request->job;
            $employees->status= $request->active;
            $employees->lng= $request->location;
            $employees->lat= $request->location;
            $employees->user_id= "1";
            $employees->save();
            return  back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $employees = employee::get(); 
        return view("list")->with(array('employee'=>  $employees));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $getEmployee= employee::find($id);
   
         return view("EmpEdit",compact('getEmployee'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getEmployee= employee::find($id);
        $getEmployee->FirstName= $request->fName;
        $getEmployee->SecondName= $request->sName;
        $getEmployee->img= "img";
        $getEmployee->job= $request->job;
        $getEmployee->status= $request->active;
        $getEmployee->lng= "long";
        $getEmployee->lat= "lat";
        $getEmployee->user_id= "1";
        $getEmployee->save();
        $employees = employee::get(); 
        return view("list")->with(array('employee'=>  $employees));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getEmployee= employee::find($id);
        $getEmployee->delete();
        return back();
    }
}