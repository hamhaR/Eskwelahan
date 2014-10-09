@extends("layout")
@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(array('url' => '/profileSaveChanges/' . Auth::user()->id,
			'autocomplete' => 'off',
			'class' => 'form-horizontal'
			)) }}
			<div class="form-group">
				{{ Form::label('fname', 'First Name') }}
				{{ Form::text('fname',Auth::user()->fname,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mname', 'Middle Name') }}
				{{ Form::text('mname',Auth::user()->mname,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('lname', 'Last Name') }}
				{{ Form::text('lname', Auth::user()->lname,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('gender', 'Gender') }}
			<!--	{{ Form::text('gender', Auth::user()->gender) }} -->
				<select class="form-control" name="gender">
					<option
					@if(Auth::user()->gender == 'female')
					 selected="selected"
					@endif 
					 value="female">Female</option>
					<option
					@if(Auth::user()->gender == 'male')
					 selected="selected"
					@endif  
					 value="male">Male</option>
				</select>
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address', Auth::user()->address,array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', Auth::user()->email,array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('confirm', 'Confirm Password') }}
				{{ Form::password('confirm', array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Update Profile', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>