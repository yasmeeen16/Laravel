@extends('layouts.app')

@section('content')
       
<div class="container">              
<div class="row justify-content-center">
<form action="/posts" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
            <input type="text" placeholder="First Name" name="fName"></br> </br>
            <input type="email" placeholder="Email" name="uEmail"></br> </br>
            <input type="password" placeholder="Password" name="uPass"></br> </br>
            <input type="text" placeholder="Second Name" name="sName"></br> </br>
            <input type="text" placeholder="Job Title" name="job"></br> </br>
            <input type="checkbox" name="active"/> <lable>Active</lable></br> </br>
            <input type="checkbox" name="admin"/> <lable>Admin</lable></br> </br>
            <input id="mapLable" name="location"/>
            <input type="button" value="Display Location"  class="btn btn-outline-success"  />
            </br> </br>
            <input type="file" name="image"/></br>
            <input type="submit" value="Add"/>
        </form>
     



@endsection

