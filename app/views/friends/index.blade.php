@extends("layout")
@section("content")
<div class='container'>
	<div class='row'>
		@foreach($friends as $key => $friend)
		<div class='col-md-6'>
		<div class="panel panel-primary">
              <div class="panel-heading">
                <a href="/users/{{$friend->id}}"><h3 class="panel-title">{{$friend->fname . " " . $friend->lname }}</h3></a>
              </div>
              <div class="panel-body">
              	
                <button type="submit" class='btn btn-danger' data-toggle="modal" data-target="#unfriendModal{{$key}}">Unfriend</button>
              	
              </div>
            </div>
		</div>
		<!-- Delete Modal -->
<div class="modal fade" id="unfriendModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		@endforeach
	</div>
</div>

