@extends("layout")
@section("content")

<div class="col-md-6">
@if(Auth::check())

		
			<h2>{{ $homeworks[0]->homework_title }}</h2>
			<p>Posted on {{ date('j F Y, h:i A',strtotime($homeworks[0]->created_at)) }}</p>
			@if($homeworks[0]->created_at != $homeworks[0]->updated_at)
				<p>Last edit: {{ date('j F Y, h:i A',strtotime($homeworks[0]->updated_at)) }}</p>
			@endif

			{{ $homeworks[0]->homework_instruction }}
		



	@if(Auth::user()->role == 'teacher' && $homeworks[0]->teacher_id == Auth::user()->id)
		<p>Buttons here.</p>

	@endif
@endif
</div>