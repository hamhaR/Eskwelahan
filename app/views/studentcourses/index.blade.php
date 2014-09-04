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
			<td>Student ID</td>
			<td>Course</td>
			<td>Name</td>
		</tr>
	</thead>
	<tbody>
	@foreach($students as $key => $value)
		<tr>
			<td>{{ $value->student_id }}</td>
			<td>{{ $value->course_id }}</td>
			<td>{{ $value->fname }}</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>