@extends("layout")
@section("content")

  <div class="col-md-2">
      <img src="bootflat/img/default_user.jpg" width= "75px" height="auto"class="img-circle">
  </div>

  <div class="col-md-10">
    <span style="font-weight: bold; font-size: 24px;">Welcome {{ Auth::user()->fname }}! </span>
    <br>
    <i class="glyphicon glyphicon-user"></i>       <span style="text-transform:uppercase;">{{ Auth::user()->role }}
  </div>

@stop
@section("rightsidebar")
<h5>Notifications</h5>
<div class="list">
	<a class="list-group-item"> <p>12:34 AM: <br>You added Vercillius</p> </a>
	<a class="list-group-item"> <p>09:12 PM: <br>You added San Juan</p>  </a>
	<a class="list-group-item"> <p>08:45 PM: <br>You added Pablo</p> </a>
	<a class="list-group-item"> <p>08:34 PM: <br>You recieved a message from Pablo</p>  </a>
	<a class="list-group-item"> <p>06:00 PM: <br>You recieved a message from Pablo</p>  </a>
</div>
@stop