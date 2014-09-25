@extends("layout")
@section("content")
<div class="container">

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Course Code </td>
			<td>Course Title</td>
			<td>Course Description</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php $length = count($rows); ?>
		@for ($i = 0; $i < $length; $i++)
		<tr>
			<td>{{ $rows[$i]['course_code'] }}</td>
			<td>{{ $rows[$i]['course_title'] }}</td>
			<td>{{ $rows[$i]['course_description'] }}</td>
			<td>
				<a class="btn btn-success" href="{{ URL::route('courses.edit', $rows[$i]['id']) }}"><span class="glyphicon glyphicon-pencil"></span> Edit Course</a>
				<button class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation"><span class="glyphicon glyphicon-remove"></span> Delete Course</button>
				
				<!-- Modal for Delete Course-->
				<div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  					<div class="modal-dialog">
    					<div class="modal-content">
      						<div class="modal-header">
        						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        						<h4 class="modal-title" id="myModalLabel">Warning</h4>
      						</div>
      						<div class="modal-body">
        						<p>Are you sure you want to delete this course?</p>
        						<p>This cannot be undone.</p>
      						</div>
      						<div class="modal-footer">
        						{{ Form::open(array('url' => 'courses/' . $rows[$i]['id'])) }}
          						{{ Form::hidden('_method', 'DELETE') }}
          						{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}

					          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        						{{ Form::close() }}
      						</div>
    					</div>
  					</div>
				</div>
				<!-- end of Modal for Delete Course -->

			</td>
		</tr>
		@endfor
	</tbody>
</table>

<a class="btn btn-primary" href="{{ URL::route('courses.create') }}"><span class="glyphicon glyphicon-plus"></span> Create Course</a>

</div>
