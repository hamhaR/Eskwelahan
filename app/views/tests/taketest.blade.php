@extends("layout")
@section("content")

 <div class="form-group">
	@foreach($questions as $key => $question)

	

		<div class="form-group">
			{{ $question->id }} .) {{ $question->content }}<br>
	 		<div class="checkbox">
				  <label>
				    <input type="checkbox" value="a">
				    {{ $question->a}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="b">
				    {{ $question->b}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="c">
				    {{ $question->c}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="d">
				    {{ $question->d}}
				  </label>
			</div>
		</div>
    @endforeach
	
	</div>


{{Form::close()}}
	<a class="btn btn-small btn-primary" href="#">Submit</a>
@stop

@section("rightsidebar")

@stop