@extends("layout")
@section("content")
{{ Form::open(array('url' => '/addnewacct',
			'autocomplete' => 'off',
			'class' => 'form-horizontal'
			)) }}
			<div class="form-group">
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username', '', array('class' => 'form-control')) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('confirm', 'Confirm Password') }}
				{{ Form::password('confirm', array('class' => 'form-control')) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('fname', 'First Name') }}
				{{ Form::text('fname','',array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mname', 'Middle Name') }}
				{{ Form::text('mname','',array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('lname', 'Last Name') }}
				{{ Form::text('lname','', array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('gender', 'Gender') }}
				<select class="form-control" name="gender">
					<option value="female">Female</option>
					<option value="male">Male</option>
				</select>
			</div>
			<div class="form-group">
				{{ Form::label('role', 'Role') }}
				<select class="form-control" name="role">
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
					<option value="admin">Administrator</option>
				</select>
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address','', array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email','', array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Add New Account', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
@stop

@section("rightsidebar")
@stop