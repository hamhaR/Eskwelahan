@extends("layout")
@section("content")
	{{$friend->fname." ".$friend->lname}} <br>
	{{$friend->email}} <br>
	{{$friend->address}} <br>
@stop
@section("rightsidebar")
 @if((Auth::user()->role != 'admin') &&  (Auth::user()->id != $friend->id))
        @if(count(Auth::user()->friends()->where('f_id','=',$friend->id)->get()) === 0)
            {{Form::open(array('url' => 'friends'))}}
            {{Form::hidden('friend_id',$friend->id)}}
            <td>
              <button class='btn btn-primary'>Add Friend</button>
            </td>
            {{Form::close()}}
        @else
        	{{Form::open(['method' => 'DELETE','route' => ['friends.destroy',$friend->id]])}}
        	 <button type="submit" class='btn btn-danger' data-toggle="modal" data-target="#unfriendModal">Unfriend</button>
        	{{ Form::close() }}	

        @endif
  @endif
@stop

	<!-- Delete Modal -->
<div class="modal fade" id="unfriendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete</p>
               

      </div>
      <div class="modal-footer">

        {{Form::open(['method' => 'DELETE','route' => ['friends.destroy',$friend->id]])}}
        	<button type="submit" class="btn btn-danger" >Unfriend</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         {{ Form::close() }}
         
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->