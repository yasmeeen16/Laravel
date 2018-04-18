@extends('layouts.app')
@section('content')

<div class="" style="margin:50px ; padding:20px;">
  <form method="get" action="/saveEdit/{{ $getEmployee->id}}"  enctype="multipart/form-data" style=" width:50% ; align:center; margin:50 auto; " class="form center" >
   <div class="form-group">
  <input type="text" placeholder="First Name" class="form-control col-sm-5" name="fName" value="{{ $getEmployee->FirstName}} "></br> </br>
  </div>
   <div class="form-group">
  <input type="text" placeholder="Second Name" class="form-control col-sm-5"  name="sName" value="{{ $getEmployee->SecondName}} "></br> </br>
  </div>
   <div class="form-group">
  <input type="text" placeholder="Job Title" class="form-control col-sm-5" name="job"></br> </br>
  </div>
   <div class="form-group">
              <input type="checkbox" name="active"/> <lable>Active</lable></br> </br>
            </div>
              <lable>Location</lable></br> </br>
              <div class="form-control-file">
                <input type="file" /></br>
              </div>


              <input type="submit" value="Add"/>

  </form>

</div>
@endsection
