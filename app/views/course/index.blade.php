<html>
	<body>
		<table>
			<thead>
				<tr>
					<th>Course code</th>
					<!--th>Course title</th>
					<th>Course definition</th>
					<th>Action</th>
				-->
				</tr>
			</thead>
			<tbody>
				<?php $length = count($rows); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td><a href="http://localhost:8000/course/{{ $rows[$i]['id'] }}">{{ $rows[$i]['course_code'] }}</a></td>
					<!--td><?php print $rows[$i]['course_title']; ?></td>
					<td><?php print $rows[$i]['course_description']; ?></td>
					<td><a href="http://localhost:8000/course/{{ $rows[$i]['course_id'] }}/edit">Edit Course</a></td>
					<td><a href="http://localhost:8000/course/{{ $rows[$i]['course_id'] }}">Delete Course</a></td>
				-->
				</tr>
				@endfor
			</tbody>
		</table>
		{{ Form::open(array('url' => 'course/create')) }}
					{{ Form::hidden('_method', 'GET') }}
					{{ Form::submit('Create Course') }}
				{{ Form::close() }}
		<!--a href='http://localhost:8000/course/create'>Create Course</a>-->
	</body>
</html>