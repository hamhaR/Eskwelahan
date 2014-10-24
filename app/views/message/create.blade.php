@extends("layout")
@section("content")
        {{Form::open(array('url' => 'conversations'))}}
          <div class="form-group pre-scrollable">
            <div class="list col-xs-12" >
            <div class="checkbox">
              @foreach($people as $stud)
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
        {{$people->links()}}
@stop