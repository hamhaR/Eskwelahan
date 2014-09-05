@extends("layout")
@section("content")

<div class="container">
<div class="row">
	<div class="col-md-12">

@if(Auth::check() && Auth::user()->role == 'teacher')
	<h1>Your Homeworks</h1>
	<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Course</th>
					<th>Homework Title</th>
					<th>Posted</th>
				</tr>
			</thead>
			<tbody>
				<?php $length = count($homeworks); ?>
				@for ($i = 0; $i < $length; $i++)
				<tr>
					<td>{{ $homeworks[$i]->course_code }}</td>
					<td>{{ $homeworks[$i]->homework_title }}</td>
					<td>{{ $homeworks[$i]->created_at }}</td>
				</tr>
				@endfor
			</tbody>
		</table>

@endif

	</div>
</div>
</div>