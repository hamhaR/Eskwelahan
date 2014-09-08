<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../bootflat/css/bootstrap.min.css">
</head>
<body>
<div class="container">


<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>fname</td>
			<td>lname</td>
		</tr>
	</thead>
	<tbody>

	@foreach($s as $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->fname }}</td>
			<td>{{ $value->lname }}</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>