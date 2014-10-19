@extends("layout")
@section("content")
<div class="row">
<h5>{{$convo->convo_name}}</h5>
</div>
<div class="row">
	{{Form::open(['url' => 'messages'])}}
	<div class="form-group">
		<textarea rows="4" class="form-control" placeholder="Type a message here..." name="msg_content"></textarea>
		<button type="submit" class="btn btn-primary pull-right">Send</button>
	</div>
	{{Form::hidden('convo_id',$convo->convo_id)}}
	{{Form::close()}}
</div>
<div class="row>"

<div class="list">
	@foreach($msgs as $msg)
		<div class="list-group-item">
			<p><strong>{{User::find($msg->sender_id)->fname ." ". User::find($msg->sender_id)->lname.": "}}</strong> {{$msg->msg_content}}</p>
		</div>
	@endforeach
</div>


{{$msgs->links()}}
@stop

@section("rightsidebar")
<h5>Members</h5>
@foreach($convo->persons as $p)
	<a href="/users/{{$p->id}}"><p>{{$p->fname}} {{$p->lname}}</p></a>
@endforeach
@stop