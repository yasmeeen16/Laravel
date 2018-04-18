@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="post" action="/Add" class="Add-Form" style=" width:50%"   enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">


            <input type="text" placeholder="First Name" class="form-control col-sm-5" name="fName" required="required"></br> </br>

            <input type="email" placeholder="Email"  class="form-control col-sm-5" name="uEmail" required="required"></br> </br>

            <input type="password" placeholder="Password" class="form-control col-sm-5"  name="uPass" required="required"></br> </br>
            <input type="text" placeholder="Second Name" class="form-control col-sm-5"  name="sName" required="required"></br> </br>
            <input type="text" placeholder="Job Title" class="form-control col-sm-5" name="job" required="required"></br> </br>
            <input type="checkbox" name="active"/> <lable>Active</lable>
            <input type="checkbox" name="admin"/> <lable>Admin</lable></br> </br>
            <input id="mapLable" name="location"/>
            <input type="button" value="Display Location" onclick="getmyposition();" class="btn btn-outline-success"  />
            </br> </br>
            <input type="file" name="img"/></br>
            <input type="submit"class="btn btn-success" value="Add"/>
        </form>
        @if(count($errors))
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $key=>$error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif





   <script>
        window.addEventListener('load', doitfirst);
        function doitfirst() {
            map = document.getElementById('map');
            mapLable = document.getElementById('mapLable');
        }
        function getmyposition() {
            // 1- check availaiblity of geolocation in navigator
            if(navigator.geolocation)
            {
                // get permission
                navigator.geolocation.getCurrentPosition(getposition, errorhandeler);
            }
            else
            {
                // geolocation not availaible
                map.innerText = 'Sorry , Update your brwoser and try Agian !!';
            }
        }
        function getposition(position) {

            // console.log(position);
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            // 1- create LATLON google object
            mylocation = new google.maps.LatLng(lat, lon);
            // 2- create attributes for returned image
            myattributes = { zoom: 17, center: mylocation , mapTypeId: google.maps.MapTypeId.ROADMAP};
            var myimg = new Image();
            myimg.src = new google.maps.Map(map, myattributes);
            var maps = new google.maps.Map(map, myattributes);
            // TestMarker();
            map.appendChild(myimg);
               var marker = new google.maps.Marker({
                position:mylocation,
                  map: maps,
                  draggable: true,
                title:"Hello World!"
            });
              marker.addListener('drag', function() {
                   mapLable.value=marker.getPosition();
                });




            //latllon = lat + ' , ' + lon;
        //    map.innerText = latllon;
        }
        function errorhandeler(error)
        {
            switch(error.code)
            {
                case error.PERMISSION_DENIED:
                    map.innerText = 'PERMISSION_DENIED';
                    break;
                case error.POSITION_UNAVAILABLE:
                    map.innerText = 'POSITION_UNAVAILABLE';
                    break;
                case error.TIMEOUT:
                    map.innerText = 'TIMEOUT';
                    break;
                case error.UNKOWN_ERROR:
                    map.innerText = 'UNKOWN_ERROR';
                    break;
            }
        }
function TestMarker() {
    mylocation= new google.maps.LatLng(lat, lon);
    addMarker(mylocation);
}
    </script>
    <div id="map" style=" width:600px;
            height:600px;">

    </div>


    </div>
</div>

@endsection
