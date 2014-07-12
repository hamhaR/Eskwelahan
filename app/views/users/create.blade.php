<!-- app/views/users/create.blade.php-->

<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Eskwelahan v0.0.1</title>
</head>
<body>
<div class="container">
	<a href="{{URL::to('users')}}">GO BACK TO LOGIN PAGE!!</a> <br /><br />
</div>

<h1>Create an Account</h1>

<!-- if there are creation errors, they will show here--->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'nerds')) }}

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
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>
	
	<!------                         PLEASE NOTE!!                            ---->
	<!---       wala pa ang id, gender og role kay di ko kama.o unsaon          -->
	<!----               so mag error pa sya -- will fix it later            ----->
	
	
	{{ Form::submit('Register!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

</body>
</html>