@extends("layout")
@section("content")
{{Form::open()}}

	<!--<div class="form-group">
	@foreach($questions as $key => $question )

		
		<div class="form-group">
			<div class="form-group">
			
				<strong> {{$question->id}} .) </strong> {{$question->content}}
			
			
			
			<div class="radio">
				<label class="radio-inline">
			  		<input type="radio" name="inlineRadioOptions" id="choice1" value="choice1"> {{ $question->choice1 }}
				</label> 
			</div>
			

			
			<div class="radio">
				<label class="radio-inline">
			  		<input type="radio" name="inlineRadioOptions" id="choice2" value="choice2"> {{ $question->choice2 }}
				</label> <br>
			</div>
			

			
			<div class="radio">
				<label class="radio-inline">
			  		<input type="radio" name="inlineRadioOptions" id="choice3" value="choice3"> {{ $question->choice3 }}
				</label> <br>
			</div>
			

			
			<div class="radio">
				<label class="radio-inline">
			  		<input type="radio" name="inlineRadioOptions" id="choice4" value="choice4"> {{ $question->choice4 }}
				</label> 
			</div><br>
			
		</div>
	

		</div>

	@endforeach

</div>	
--> <div class="form-group">
	@foreach($questions as $key => $question)
		<div class="form-group">
			{{ $question->id }} .) {{ $question->content }}<br>
	 		<div class="checkbox">
				  <label>
				    <input type="checkbox" value="choice1">
				    {{ $question->choice1}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="choice2">
				    {{ $question->choice2}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="choice3">
				    {{ $question->choice3}}
				  </label>
			</div>

			<div class="checkbox">
				  <label>
				    <input type="checkbox" value="choice4">
				    {{ $question->choice4}}
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