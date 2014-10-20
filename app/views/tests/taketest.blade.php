@extends("layout")
@section("content")

 <div class="form-group">
	@foreach($questions as $key => $question)

	
	

		<div class="form-group">
			{{ $question->id }} .) {{ $question->content }}<br>
	 		<div class="checkbox">
				  <label>
				    <input type="radio" value="a" name='answers{{ $key }}'>
				    {{ $question->a}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="radio" value="b" name='answers{{ $key }}'>
				    {{ $question->b}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="radio" value="c" name='answers{{ $key }}'>
				    {{ $question->c}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="radio" value="d" name='answers{{ $key }}'>
				    {{ $question->d}}
				  </label>
			</div>
		</div>
    @endforeach


	</div>
{{Form::hidden('test_id',$test_id)}}
<!-- {{Form::submit('Submit')}} -->
<a class="btn btn-small btn-primary" href="/aftertest/{{ $test_id  }}">Submit</a>
                  


{{Form::close()}}

@stop

@section("rightsidebar")

@stop