<table>
	<tbody>
		<tr>
			<td> Course Code: </td>
			<td> {{ $rows['course_code'] }} </td>
		</tr>
		<tr>
			<td> Course Title: </td>
			<td> {{ $rows['course_title'] }} </td>
		</tr>
		<tr>
			<td> Course Description: </td>
			<td> {{ $rows['course_description'] }} </td>
		</tr>
			<td>
				{{ Form::open(array('url' => 'course/' . $rows['id'] . '/edit')) }}
					{{ Form::hidden('_method', 'GET') }}
					{{ Form::submit('Edit Course') }}
				{{ Form::close() }}
			</td>
			<td>
				{{ Form::open(array('url' => 'course/' . $rows['id'])) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Course') }}
				{{ Form::close() }}
			</td>
	</tbody>
</table>