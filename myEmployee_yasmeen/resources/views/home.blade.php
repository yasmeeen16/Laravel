@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>

    </div>
</div>
<div class="">
  <a href="/index"  class="navbar-brand">Add Employee</a>
  <a href="/list"  class="navbar-brand">List Employee</a>
</div>


@endsection
