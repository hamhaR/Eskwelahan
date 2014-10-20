@extends("layout")
@section("content")
<h1>Account Management</h1>
<table id="usertable" class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Name (Username)</th>
			<th>Account Type</th>
			<th>Date Registered</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $row)
		<tr>
			<td>{{{ $row->fname . ' ' . $row->lname . ' (' . $row->username . ')' }}}</td>
			<td>{{{ $row->role }}}</td>
			<td>{{{ date('j F Y, h:i A',strtotime($row->created_at)) }}}</td>
			<td></td>
		</tr>
		@endforeach
	</tbody>
</table>
	
@stop

@section("rightsidebar")
	<a class="btn btn-primary" href="/createaccountadmin"><span class="glyphicon glyphicon-plus"></span> Add New User</a>
@stop
