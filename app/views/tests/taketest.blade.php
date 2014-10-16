@extends("layout")
@section("content")
{{Form::open()}}

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

	
	

<a href="#" class="btn btn-primary" role="button">Submit</a>
{{Form::close()}}

@stop

@section("rightsidebar")

@stop