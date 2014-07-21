<!--
| -------------------------------------------
| NOTE:
| -------------------------------------------
| naa sa app.views.users ang para sa create
| -> index.blade.php para sa login page
| -> create.blade.php para sa create page
--->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<title>Welcome to Eskwelahan v0.0.1</title>
</head>
<body>
<div class="container">
	<a href="hello.php">GO BACK TO LOGIN PAGE!!</a> <br /><br />
</div>

<h1>Create an Account</h1>

<!-- if there are creation errors, they will show here -->
<!-- Diari hangtod didto sa pikas na comment kay para sa blade-->
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
<!-- PADULONG DIRI PARA SA BLADE.PHP -->

</body>
</html>
