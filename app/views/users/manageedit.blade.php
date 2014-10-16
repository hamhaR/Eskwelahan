@extends("layout")
@section("content")
		

  			{{ Form::open(array('url' => '/editinfoadminhelper/' . $user->id,
			'autocomplete' => 'off',
			'class' => 'form-horizontal'
			)) }}
			<div class="form-group">
				{{ Form::label('fname', 'First Name') }}
				{{ Form::text('fname',$user->fname,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mname', 'Middle Name') }}
				{{ Form::text('mname',$user->mname,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('lname', 'Last Name') }}
				{{ Form::text('lname', $user->lname,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('gender', 'Gender') }}
				<select class="form-control" name="gender">
					<option
					@if($user->gender == 'female')
					 selected="selected"
					@endif 
					 value="female">Female</option>
					<option
					@if($user->gender == 'male')
					 selected="selected"
					@endif  
					 value="male">Male</option>
				</select>
			</div>
			<div class="form-group">
				{{ Form::label('role', 'Role') }}
				<select class="form-control" name="role">
					<option
					@if($user->role == 'student')
					 selected="selected"
					@endif 
					 value="student">Student</option>
					<option
					@if($user->role == 'teacher')
					 selected="selected"
					@endif  
					 value="teacher">Teacher</option>
					<option
					@if($user->role == 'admin')
					 selected="selected"
					@endif  
					 value="admin">Admin</option>
				</select>
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address', $user->address,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', $user->email,array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Update Profile', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
 
@stop