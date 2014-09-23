@extends("layout")
@section("content")

<div class="col-md-6">
@if(Auth::check())

		
			<h2>{{ $homeworks->homework_title }}</h2>
			<p>Posted on {{ date('j F Y, h:i A',strtotime($homeworks->created_at)) }}</p>
			@if($homeworks->created_at != $homeworks->updated_at)
				<p>Last edit: {{ date('j F Y, h:i A',strtotime($homeworks->updated_at)) }}</p>
			@endif

			{{ $homeworks->homework_instruction }}
		



	@if(Auth::user()->role == 'teacher' && $homeworks->teacher_id == Auth::user()->id)
		<a class="btn btn-success" href="{{ URL::route('homeworks.edit', $homeworks->id) }}"><span class="glyphicon glyphicon-pencil"></span> Edit This Homework</a>
	<!--	<a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-remove"></span> Delete This Homework</a> -->
		<button class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation"><span class="glyphicon glyphicon-remove"></span> Delete This Homework</button>

	@endif
@endif
</div>

<!-- Modal -->
<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete this homework?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the following homework: {{ $homeworks->homework_title }}?</p>
        <p>This cannot be undone.</p>
      </div>
      <div class="modal-footer">
      <!--	<button type="button" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button> -->
        {{ Form::open(array('url' => 'homeworks/' . $homeworks->id)) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}

          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>