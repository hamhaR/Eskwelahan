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
		<p>Buttons here.</p>

	@endif
@endif
</div>