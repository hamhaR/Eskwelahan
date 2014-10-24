<!-----SHOW BLADE PHP FOR SUBMIT HOMEWORK------>

@extends("layout")
@section("content")

@if(Auth::check())
			<h3>Homework Title:{{ Homework::find($submithomework->homework_id)->homework_title }}</h3>
			<p> Submitted by: {{ User::find($submithomework->student_id)->fname ." ". User::find($submithomework->student_id)->lname }}</p>
			<p>Posted on {{ date('j F Y, h:i A',strtotime($submithomework->created_at)) }}</p>

			{{ $submithomework->homework_body }}
			
@endif			
  <a class="btn btn-primary" href="{{ URL::route('submithomeworks.index') }}"><span class="glyphicon glyphicon-chevron-left"></span> Return</a>
@stop
@section("rightsidebar")