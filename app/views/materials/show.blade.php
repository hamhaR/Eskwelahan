@extends("layout")
@section("content")

@if(Auth::check())
			<h3>{{ $materials->material_title }}</h3>
			<p>Posted on {{ date('j F Y, h:i A',strtotime($materials->created_at)) }}</p>
			@if($materials->created_at != $materials->updated_at)
				<p>Last edit: {{ date('j F Y, h:i A',strtotime($materials->updated_at)) }}</p>
			@endif

			{{ $materials->material_instruction }}
@endif
@stop

@section("rightsidebar")
  @if(Auth::user()->role == 'teacher' && $materials->teacher_id == Auth::user()->id)
    <a class="btn btn-success" href="{{ URL::route('materials.edit', $materials->id) }}"><span class="glyphicon glyphicon-pencil"></span> Edit Material</a><br />
    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation"><span class="glyphicon glyphicon-remove"></span> Delete Delete</button>

  @endif
  
  <a class="btn btn-primary" href="{{ URL::route('materials.index') }}"><span class="glyphicon glyphicon-chevron-left"></span> Return</a>
@stop

<!-- Modal -->
<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete?: {{ $materials->material_title }}?</p>
        <p>This cannot be undone.</p>
      </div>
      <div class="modal-footer">
        {{ Form::open(array('url' => 'materials/' . $materials->id)) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}

          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>