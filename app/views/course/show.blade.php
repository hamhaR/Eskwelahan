@extends("layout")
@section("content")

<div class="col-md-6 col-md-offset-3">
	<table class="table table-striped table-hover">
		<tbody>
			<tr>
				<td> Course Code: </td>
				<td> {{ $rows['course_code'] }} </td>
			</tr>
			<tr>
				<td> Course Section: </td>
				<td> {{ $rows['course_section'] }} </td>
			</tr>
			<tr>
				<td> Course Title: </td>
				<td> {{ $rows['course_title'] }} </td>
			</tr>
			<tr>
				<td> Course Description: </td>
				<td> {{ $rows['course_description'] }} </td>
			</tr>
		</tbody>
	</table>
				<td>
					{{ Form::open(array('url' => 'course/' . $rows['id'] . '/edit')) }}
						{{ Form::hidden('_method', 'GET') }}
						{{ Form::submit('Edit Course', ['class' => 'btn btn-default']) }}
					{{ Form::close() }}
				</td>
				<td>
					{{ Form::open(array('url' => 'course/' . $rows['id'])) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Delete Course', ['class' => 'btn btn-default']) }}
					{{ Form::close() }}
				</td>
</div>