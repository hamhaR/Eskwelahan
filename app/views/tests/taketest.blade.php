@extends("layout")
@section("content")
{{Form::open()}}

	@foreach($questions as $key => $question )
		<strong> {{$question->id}} .) </strong> {{$question->content}} <br>
		<div class="radio">
	  		<label>
	   			 <input type="radio" name="optionsRadios" id="choice1" value="choice1">
				{{$question->choice1}}
	  		</label>
		</div>

		<div class="radio">
	  		<label>
	   			 <input type="radio" name="optionsRadios" id="choice2" value="choice2">
				{{$question->choice2}}
	  		</label>
		</div> 

		<div class="radio">
	  		<label>
	   			 <input type="radio" name="optionsRadios" id="choice3" value="choice3">
				{{$question->choice3}}
	  		</label>
		</div> 

		<div class="radio">
	  		<label>
	   			 <input type="radio" name="optionsRadios" id="choice4" value="choice4">
				{{$question->choice4}}
	  		</label>
		</div><br>
		
	@endforeach


<a href="#" class="btn btn-primary" role="button">Submit</a>
{{Form::close()}}

@stop

@section("rightsidebar")

@stop