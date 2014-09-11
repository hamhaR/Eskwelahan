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
			<td>Course Section</td>
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
				{{ Form::open(array('url' => 'courses/' . $rows[$i]['id'] . '/edit')) }}
					{{ Form::hidden('_method', 'GET') }}
					{{ Form::submit('Edit Course', ['class' => 'btn btn-default']) }}
				{{ Form::close() }}
	
				{{ Form::open(array('url' => 'courses/' . $rows[$i]['id'])) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Course', ['class' => 'btn btn-default', 'data-toggle' => 'modal']) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endfor
			{{ Form::open(array('url' => 'courses/create')) }}
				{{ Form::hidden('_method', 'GET') }}
				{{ Form::submit('Create Course') }}
			{{ Form::close() }}
	</tbody>
</table>

</div>
