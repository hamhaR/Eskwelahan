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