<!-------INDEX BLADE PHP FOR SUBMIT HOMEWORK-------->

@extends("layout")
@section("content")

	<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Homework</th>
					<th>Student ID</th>
					<th>Posted</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php $length = count($submithomeworks); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td>{{ $submithomeworks[$i]['homework_id'] }}</td>
					<td>{{ $submithomeworks[$i]['student_id'] }}</td>
					<td>{{ date('j F Y, h:i A',strtotime($submithomeworks[$i]['created_at'])) }}</td>
					<td><a class="btn btn-primary" href="submithomeworks/{{ $submithomeworks[$i]['id'] }}"><span class="glyphicon glyphicon-search"></span> View Submission</a></td>
				</tr>
				@endfor
			</tbody>
		</table>
		
  <a class="btn btn-primary" href="{{ URL::route('profile') }}"><span class="glyphicon glyphicon-chevron-left"></span> Return to Profile</a>

@stop
@section("rightsidebar")