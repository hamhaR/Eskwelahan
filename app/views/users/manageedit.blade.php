@extends("layout")
@section("content")
		

  				{{ Form::open(array('url' => '/profileSaveChanges/' . $user->id,
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
			<!--	{{ Form::text('gender', $user->gender) }} -->
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