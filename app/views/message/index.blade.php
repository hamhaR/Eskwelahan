@extends("layout")
@section("content")
<h5>Conversations</h5>
	<div class="row">
    <div class="list">
		@foreach($convos as $convo)
			
				
					<a class="list-group-item" href="conversations/{{$convo->convo_id}}">{{$convo->convo_name}}
            <div class='pull-right'><p>{{$convo->created_at}}</p></div>
          </a>
          
				
			
		@endforeach
    </div>
	</div>
@stop
@section("rightsidebar")
	<a class="btn btn-primary"  href="/conversations/create"> New Conversation </a>
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
        {{Form::open(array('url' => 'conversations'))}}
          <div class="form-group pre-scrollable">
            <div class="list col-xs-12" >
            <div class="checkbox">
              @foreach(User::all() as $stud)
                @if($stud->id <> Auth::id())
                <div class="list-group-item">
                <input type="checkbox" value="{{$stud->id}}" name="receiver_ids[]">
                  {{$stud->fname}} {{$stud->lname}} 
                </input>
                </div>
                @endif
              @endforeach
            </div>
          </div>

          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="convo_name" placeholder="Conversation Name"></input>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         {{ Form::submit('OK', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>