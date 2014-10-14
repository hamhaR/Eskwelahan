@extends("layout")
@section("content")

	<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Course</th>
					<th>Homework Title</th>
					<th>Posted</th>
					@if(Auth::user()->role == 'admin')
						<th>Teacher</th>
					@else
						<th>Status</th>
						<th>Options</th>
					@endif
					
					
				</tr>
			</thead>
			<tbody>
				<?php $length = count($homeworks); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td>{{ $homeworks[$i]['course_code'] }}</td>
					<td>{{ $homeworks[$i]['homework_title'] }}</td>
					<td>{{ date('j F Y, h:i A',strtotime($homeworks[$i]['created_at'])) }}</td>
					@if(Auth::user()->role == 'admin')
						<td>{{{ $homeworks[$i]['fname'] . ' ' . $homeworks[$i]['lname'] }}}</td>
					@else
						<td>Needs attention</td>
						<td><a class="btn btn-primary" href="homeworks/{{ $homeworks[$i]['id'] }}"><span class="glyphicon glyphicon-search"></span> View Homework</a></td>
					@endif
				</tr>
				@endfor
			</tbody>
		</table>


@stop<!--end of content-->
@section("rightsidebar")
	@if(Auth::check() && Auth::user()->role == 'teacher')
		<a class="btn btn-primary" href="{{ URL::route('homeworks.create') }}"><span class="glyphicon glyphicon-plus"></span> Add New Homework</a>
	@endif
@stop<!--end of rightsidebar-->
