@extends("layout")
@section("content")
<h5>Incoming Messages</h5>
	<div class="row">
    <div class="list">
		@foreach($messages as $msg)
			
				<div class="list-group-item">
					<a href="/messages/{{$msg->msg_id}}">{{User::find($msg->sender_id)->fname. " " .User::find($msg->sender_id)->lname}} </a>
          <div class='pull-right'><p>{{$msg->created_at}}</p></div>
				</div>
			
		@endforeach
    </div>
	</div>
@stop
@section("rightsidebar")
	<button class="btn btn-primary"  data-toggle="modal" data-target="#myModal"> New Conversation </button>
@stop

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">New Conversation</h4>
      </div>
      <div class="modal-body">
        {{Form::open(array('url' => 'messages'))}}
          <div class="form-group">
            <select class="form-control" id="receiver_id" name="receiver_id">
              @foreach(User::where('role','=','student')->get() as $stud)
                
                <option value="{{$stud->id}}">
                  {{$stud->fname}} {{$stud->lname}} 
                </option>

              @endforeach
            </select>

          </div>   
          <textarea class="form-control" rows="3" name="msg_content" id="msg_content"></textarea>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         {{ Form::submit('OK', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>