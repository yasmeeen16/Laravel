@extends('layouts.app')
@section('content')
<div class="container">
<form class="form-inline" action="http://127.0.0.1:8000/api/search" method="get">

<input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
<input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search"/>
<!-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> -->
</form>
    <div class="row">


            <table class ="table table-striped">
            <tr>
                <th>First Nmae</th>
                <th>Last Name</th>
                <th>created_at</th>
                <th>job</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

                    @foreach ($employee as $employees)
                        <tr>
                        <td>{{$employees->FirstName}}</td>
                        <td><a href="">{{$employees->SecondName}}</a></td>
                        <td>{{$employees->created_at}}</td>
                        <td>{{$employees->job}}</td>
                         <td><img src="{{ Storage::disk('local')->url($employees->img)}}" width="100" height="100"/></td>
                        <td>
                        <a class="btn btn-success" href="/editEmployee/{{$employees->id}}/">Edit</a>
                        <a  class="btn btn-danger " href="/deleteEmployee/{{$employees->id}}">Delete</a>
                        <a  class="btn btn-primary " href="http://127.0.0.1:8000/api/employee/{{$employees->id}}"> Deatails</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>

@endsection
