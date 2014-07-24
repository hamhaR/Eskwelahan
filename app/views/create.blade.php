<!-- app/views/users/create.blade.php-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>Welcome to Eskwelahan v0.0.1</title>
	<link href="../bootflat/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootflat/css/site.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="row">
   	<div class="col-md-6" >
<h1>Create an Account</h1>

{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'users')) }}

	<div class="form-group">
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('fname', 'Firstname') }}
		{{ Form::text('fname', Input::old('fname'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('mname', 'Middlename') }}
		{{ Form::text('mname', Input::old('mname'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('lname', 'Lastname') }}
		{{ Form::text('lname', Input::old('lname'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('gender', 'Gender') }}
		{{ Form::text('gender', Input::old('gender'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>
		
	{{ Form::submit('Register!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

</div>
</div>
</div>

<script src="../bootflat/js/bootstrap.min.js"></script>
    <script src="../bootflat/js/jquery-1.10.1.min.js"></script>

</body>
</html>