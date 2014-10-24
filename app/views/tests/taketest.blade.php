@extends("layout")
@section("content")

{{ Form::open(array('url' => 'aftertest' )) }}

 <div class="form-group">
	@foreach($questions as $key => $question)

		<div class="form-group">
			{{ $question->id }} .) {{ $question->content }}<br>
	 		<div class="radio">
				  <label>
				    <input type="radio" value="a" name='answers{{ $key }}'>
				    {{ $question->a}}
				  </label>
			</div>

			<div class="radio">
				  <label>
				    <input type="radio" value="b" name='answers{{ $key }}'>
				    {{ $question->b}}
				  </label>
			</div>

			<div class="radio">
				  <label>
				    <input type="radio" value="c" name='answers{{ $key }}'>
				    {{ $question->c}}
				  </label>
			</div>

			<div class="radio">
				  <label>
				    <input type="radio" value="d" name='answers{{ $key }}'>
				    {{ $question->d}}
				  </label>
			</div>
		</div>
    @endforeach


	
{{Form::hidden('test_id',$test_id)}}
</div>
{{Form::submit('Submit')}}
<!-- <a class="btn btn-small btn-primary" href="http://localhost:8000/aftertest">Submit</a> -->
                  


{{Form::close()}}

@stop

@section("rightsidebar")

@stop