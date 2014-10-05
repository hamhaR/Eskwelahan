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
				{{ Form::text('fname',Auth::user()->fname) }}
			</div>
			<div class="form-group">
				{{ Form::label('mname', 'Middle Name') }}
				{{ Form::text('mname',Auth::user()->mname) }}
			</div>
			<div class="form-group">
				{{ Form::label('lname', 'Last Name') }}
				{{ Form::text('lname', Auth::user()->lname) }}
			</div>
			<div class="form-group">
				{{ Form::label('gender', 'Gender') }}
				{{ Form::text('gender', Auth::user()->gender) }}
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Address') }}
				{{ Form::text('address', Auth::user()->address) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', Auth::user()->email) }}
			</div>
			{{ Form::submit('Update Profile', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>