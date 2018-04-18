@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <form class="form-inline" action="http://127.0.0.1:8000/api/search" method="get">

                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search"/>
                </form>
  <table class ="table table-striped">
    	<tr>
    		<th>FirstNmae</th>
            <th>LastName</th>
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
                    <td><a class="btn btn-outline-success" href="/editEmployee/{{$employees->id}}/">Edit</a>
                    <a  class="btn btn-outline-danger" href="/deleteEmployee/{{$employees->id}}">Delete</a>
                    <a  class="btn btn-outline-primary " href="http://127.0.0.1:8000/api/employee/{{$employees->id}}">View Deatails</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>


    </div>
</div>

@endsection
