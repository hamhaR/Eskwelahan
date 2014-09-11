@extends("layout")
@section("content")

<div class="col-md-6">
@if(Auth::check())

		
			<h2>{{ $homeworks->homework_title }}</h2>
			<p>Posted on {{ date('j F Y, h:i A',strtotime($homeworks->created_at)) }}</p>
			@if($homeworks->created_at != $homeworks->updated_at)
				<p>Last edit: {{ date('j F Y, h:i A',strtotime($homeworks->updated_at)) }}</p>
			@endif

			{{ $homeworks->homework_instruction }}
		



	@if(Auth::user()->role == 'teacher' && $homeworks->teacher_id == Auth::user()->id)
		<a class="btn btn-success" href="{{ URL::route('homeworks.edit', $homeworks->id) }}"><span class="glyphicon glyphicon-pencil"></span> Edit This Homework</a>
		<a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-remove"></span> Delete This Homework</a>

	@endif
@endif
</div>