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
<h5>Pending</h5>
<div class="list">
  @foreach($pending as $p)
  <div class="list-group-item">
    {{$p->fname}} {{$p->lname}}
    {{Form::open(['url' => 'confirmfriend'])}}
    <button class="btn btn-primary" >Confirm</button>
    {{Form::hidden('u_id',Auth::id())}}
    {{Form::hidden('f_id', $p->id)}}
    {{Form::close()}}
  </div>
  @endforeach
</div>
@stop