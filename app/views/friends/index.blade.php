@extends("layout")
@section("content")
  <h5>Friends</h5>
    <div class="list">
		@foreach($friends as $key => $friend)
                <a href="/users/{{$friend->id}}" class="list-group-item">{{$friend->fname . " " . $friend->lname }}</a>
      
		@endforeach
  </div>
@stop

@section("rightsidebar")
@if(count($confirmations) > 0)
<h5>Request Confirmations</h5>
<div class="list">
  @foreach($confirmations as $p)
  <div class="list-group-item">
    {{$p->fname}} {{$p->lname}}
    {{Form::open(['url' => 'confirmfriend'])}}
    <button class="btn btn-primary" >Confirm</button>
    {{Form::hidden('u_id',Auth::id())}}
    {{Form::hidden('f_id', $p->id)}}
    {{Form::close()}}

    {{Form::open(['url' => 'unconfirmfriend'])}}
    <button class="btn btn-danger" >Not Now</button>
    {{Form::hidden('u_id',Auth::id())}}
    {{Form::hidden('f_id', $p->id)}}
    {{Form::close()}}

  </div>
  @endforeach
</div>
@endif
@if(count($requests) > 0)
  <h5>Sent Requests</h5>
  <div class="list">
    @foreach($requests as $r)
    <a class="list-group-item" href="/users/{{$r->id}}">
       {{$r->fname}} {{$r->lname}}
     </a>

    @endforeach
  </div>
@endif
@stop