@extends("layout")
@section("content")

<div class="container">
<div class="row">
	<div class="col-md-12">



@if(Auth::check() && Auth::user()->role == 'teacher')
	<h1>Your Homeworks</h1>
@endif
@if(Auth::check() && Auth::user()->role == 'student')
	<h1>Latest Homeworks</h1>
@endif
	<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Course</th>
					<th>Homework Title</th>
					<th>Posted</th>
					<th>Status</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php $length = count($homeworks); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td>{{ $homeworks[$i]->course_code }}</td>
					<td>{{ $homeworks[$i]->homework_title }}</td>
					<td>{{ $homeworks[$i]->created_at }}</td>
					<td>Needs attention</td>
					<td><a class="btn btn-primary" href="homeworks/{{ $homeworks[$i]->id }}"><span class="glyphicon glyphicon-search"></span> View Homework</a></td>
				</tr>
				@endfor
			</tbody>
		</table>

	@if(Auth::check() && Auth::user()->role == 'teacher')
		<a class="btn btn-primary" href="{{ URL::route('homeworks.create') }}"><span class="glyphicon glyphicon-plus"></span> Add New Homework</a>
	@endif

	</div>
</div>
</div>