@extends("layout")
@section("content")
<!-- MATERIALS INDEX!! -->
<div class="container">
<div class="row">
	<div class="col-md-12">

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(Auth::check() && Auth::user()->role == 'teacher')
	<h2>Materials</h2>
@endif
@if(Auth::check() && Auth::user()->role == 'student')
	<h1>Materials for Grabs</h1>
@endif
	<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Course</th>
					<th>Material Name</th>
					<th>Posted</th>
					<th>Status</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php $length = count($materials); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td>{{ $materials[$i]['course_code'] }}</td>
					<td>{{ $materials[$i]['material_title'] }}</td>
					<td>{{ date('j F Y, h:i A',strtotime($materials[$i]['created_at'])) }}</td>
					<td>New Material</td>
					<td><a class="btn btn-primary" href="materials/{{ $materials[$i]['id'] }}"><span class="glyphicon glyphicon-search"></span> View Material</a></td>
				</tr>
				@endfor
			</tbody>
		</table>

	@if(Auth::check() && Auth::user()->role == 'teacher')
		<a class="btn btn-primary" href="{{ URL::route('materials.create') }}"><span class="glyphicon glyphicon-plus"></span> Create new Material</a>
	@endif

	</div>
</div>
</div>