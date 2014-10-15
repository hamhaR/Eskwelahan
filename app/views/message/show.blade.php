@extends("layout")
@section("content")
		<p>{{$sender->fname." ".$sender->lname}}: {{$msg->msg_content}}</p>

		{{Form::open(array('url' => 'messages'))}}
		<div class="row">
			<div class="col-xs-10 ">
				<textarea class="form-control" name="msg_content" row="3"></textarea>
			</div>
			<div class="col-xs-2">
				<button class="btn btn-primary">Reply</button>
			</div>
		</div>
		{{Form::hidden('receiver_id',$msg->sender_id)}}
		{{Form::close()}}
		

@stop
@section("rightsidebar")

@stop