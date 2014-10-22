<!-----SHOW BLADE PHP FOR SUBMIT HOMEWORK------>

@extends("layout")
@section("content")

@if(Auth::check())
			<h3>Homework Number{{ $submithomework->homework_id }}</h3>
			<p> Submitted by: Student {{ $submithomework->student_id }}</p>
			<p>Posted on {{ date('j F Y, h:i A',strtotime($submithomework->created_at)) }}</p>

			{{ $submithomework->homework_body }}
			
@endif			
  <a class="btn btn-primary" href="{{ URL::route('submithomeworks.index') }}"><span class="glyphicon glyphicon-chevron-left"></span> Return</a>
@stop
@section("rightsidebar")