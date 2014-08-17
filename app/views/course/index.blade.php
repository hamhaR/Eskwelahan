@extends("layout")
@section("content")

	<div class="col-md-6 col-md-offset-3">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Courses</th>
				</tr>
			</thead>
			<tbody>
				<?php $length = count($rows); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td><a href="http://localhost:8000/course/{{ $rows[$i]['id'] }}">{{ $rows[$i]['course_code'] }}</a></td>
				</tr>
				@endfor
			</tbody>
		</table>

		{{ Form::open(array('url' => 'course/create')) }}
					{{ Form::hidden('_method', 'GET') }}
					{{ Form::submit('Create Course') }}
		{{ Form::close() }}

	</div>