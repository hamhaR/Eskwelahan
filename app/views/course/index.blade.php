<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../bootflat/css/bootstrap.min.css">
</head>
<body>
<div class="container">


<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Course Code </td>
			<td>Course Title</td>
			<td>Course Description</td>
		</tr>
	</thead>
	<tbody>
	@foreach($courses as $course)		
		<tr>
			<td>{{$course->course_code}}</td>
			<td>{{ $course->course_title }}</td>
			<td>{{ $course->course_description }}</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>