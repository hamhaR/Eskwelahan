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
   	
<h1>Create an Account</h1>
@if(Session::has('message'))
        <div id="login-alert" class="alert alert-danger col-sm-16" style="padding:0px; height:50px; width:300px">
            <p class="alert">{{ Session::get('message') }}</p>
        </div> 
    @endif

{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'users')) }}

<div class="col-md-4" >
	
	<div class="form-group">
		{{ Form::label('username', 'Username') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('fname', 'Firstname') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::text('fname', Input::old('fname'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('mname', 'Middlename') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::text('mname', Input::old('mname'), array('class' => 'form-control')) }}
	</div>
</div>
<div class="col-md-4" >
	<div class="form-group">
		{{ Form::label('lname', 'Lastname') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::text('lname', Input::old('lname'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('role', 'Role') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::select('role', array('student' => 'Student', 'teacher' => 'Teacher'), 'student') }}
	</div>
	
	<div class="form-group">
		{{ Form::label('gender', 'Gender ') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::select('gender', array('male' => 'Male', 'female' => 'Female'), 'male') }}
	</div>
	
	<div class="form-group">
		{{ Form::label('address', 'Address') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('email', 'Email') }} <h style="color:red;"><strong>*</strong></h>
		{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>
</div>
</div>
<div class="row">
	{{ Form::submit('Register!', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}



</div>

<script src="../bootflat/js/bootstrap.min.js"></script>
    <script src="../bootflat/js/jquery-1.10.1.min.js"></script>

</body>
</html>