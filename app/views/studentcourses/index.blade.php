@extends("layout")
@section("content")
<div class="container">


<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Course </td>
			<td>Student ID</td>
			<td>Name</td>
		</tr>
	</thead>
	<tbody>
	@foreach($courses as $course)
		@foreach($course->students as $student)
			<tr>
				<td>{{$course->id}}</td>
				<td>{{ $student->id }}</td>
				<td>{{ $student->fname ." " . $student->lname  }}</td>
			</tr>
		@endforeach
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>