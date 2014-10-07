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
		@foreach($rows as $key => $row)
			<tr>
				<td>{{ $row['course_code'] }}</td>
				<td>{{ $row['course_title'] }}</td>
				<td>{{ $row['course_description'] }}</td>
				<td>
					<button class="btn btn-success" data-toggle="modal" data-target="#edit{{$key}}"><span class="glyphicon glyphicon-pencil"></span> Edit Course</button>
					<button class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation{{$key}}"><span class="glyphicon glyphicon-remove"></span> Delete Course</button>
				
					<!-- Modal for Edit Course-->
					<div class="modal fade" id="edit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Edit Course</h4>
								</div>
								<div class="modal-body">
									{{ Form::open(array('url' => 'courses/' . $row['id'], 'autocomplete' => 'off',
										'class' => 'form-horizontal')) }}
									<div class="form-group">
										<label class="col-md-4 control-label" for="course_code"><span style="font-family:sans-serif; font-size:13px ">Course Code</span></label>
										{{ $row['course_code'] }}
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="course_code"><span style="font-family:sans-serif; font-size:13px ">Course Code</span></label>
										{{ $row['course_title'] }}
									</div>
									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="course_description"><span style="font-family:sans-serif; font-size:13px ">Course Description</span></label>  
										<div class="col-md-8">
											<input id="course_description" name="course_description" type="textarea" placeholder="" value="{{ $row['course_description'] }}" class="form-control input-md" required="">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									{{ Form::hidden('_method', 'PUT') }}
									{{ Form::submit('Submit', ['class' => 'btn btn-default']) }}

									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									{{ Form::close() }}
								</div>
							</div>
						</div>
					</div>
					<!-- end of Modal for Edit Course -->


					<!-- Modal for Delete Course-->
					<div class="modal fade" id="deleteConfirmation{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									{{ Form::open(array('url' => 'courses/' . $row['id'])) }}
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
		@endforeach
	</tbody>
</table>

	<button class="btn btn-primary" data-toggle="modal" data-target="#create"><span class="glyphicon glyphicon-plus"></span> Create Course</button>

</div>

<!-- Modal for Create Course-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Create Course</h4>
			</div>
			<div class="modal-body">
				{{ Form::open(array('url' => 'courses')) }}

			    <div class="form-group">
			        <label for="course_code">Course code</label>
			        <input class="form-control" id="course_code" name="course_code" placeholder="Course code">
			    </div>
			    <div class="form-group">
			        <label for="course_title">Course title</label>
			        <input class="form-control" id="course_title" name="course_title" placeholder="Course title">
			    </div>
			    <div class="form-group">
			        <label for="course_description">Course description</label>
			        <input class="form-control" id="course_description" name="course_description" placeholder="Course description">
			    </div>
			    <div class="form-group">
			        {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}

			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			    </div>

				{{ Form::close() }}
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- end of Modal for Create Course -->