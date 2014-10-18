@extends("layout")
@section("content")

 <div class="form-group">
	@foreach($questions as $key => $question)

	{{Form::open(['url' => 'taketests'])}}

	

		<div class="form-group">
			{{ $question->id }} .) {{ $question->content }}<br>
	 		<div class="checkbox">
				  <label>
				    <input type="checkbox" value="a" name='answers[]'>
				    {{ $question->a}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="b" name='answers[]'>
				    {{ $question->b}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="c" name='answers[]'>
				    {{ $question->c}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="d" name='answers[]'>
				    {{ $question->d}}
				  </label>
			</div>
		</div>
    @endforeach


	</div>
{{Form::hidden('test_id',$test_id)}}	
{{Form::submit('Submit')}}
                  


{{Form::close()}}

@stop

@section("rightsidebar")

@stop