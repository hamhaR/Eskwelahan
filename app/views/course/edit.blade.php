<html>
	<table>
		{{ Form::open(array('url' => '/update/' . $course['id'] )) }}
		<tr>
			<td> Course code: </td>
			<td> {{ $course['course_code'] }} </td>
		</tr>
		<tr>
			<td> Course title: </td>
			<td> {{ $course['course_title'] }} </td>
		</tr>
		<tr>
			<td> 
				{{ Form::label('course_description', 'Course Description') }}
				{{ Form::textarea('course_description')}} 
			</td>
		</tr>
		<tr>
			<td>
					{{ Form::hidden('_method', 'POST') }}
					{{ Form::submit('Submit') }}
				{{ Form::close() }}
			</td>
		</tr>
	</table>
</html>