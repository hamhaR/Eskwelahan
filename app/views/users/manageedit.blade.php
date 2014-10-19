@extends("layout")
@section("content")
		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
  			<li class="active"><a href="#editinfo" role="tab" data-toggle="tab">Edit Personal Information</a></li>
  			<li><a href="#changepass" role="tab" data-toggle="tab">Change Password</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
  			<div class="tab-pane active" id="editinfo">

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
  			</div>
  			<div class="tab-pane" id="changepass">
  			{{ Form::open(array('url' => '/profilechangepass/' . $user->id,
			'autocomplete' => 'off',
			'class' => 'form-horizontal'
			)) }}
			
			<div class="form-group">
				{{ Form::label('password', 'Current Password') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('newpassword', 'New Password') }}
				{{ Form::password('newpassword', array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('confirm', 'Confirm Password') }}
				{{ Form::password('confirm', array('class' => 'form-control')) }}
			</div>
			
			{{ Form::submit('Change Password', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
  			</div>
		</div>
@stop