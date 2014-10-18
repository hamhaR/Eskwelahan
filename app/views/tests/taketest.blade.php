@extends("layout")
@section("content")

 <div class="form-group">
	@foreach($questions as $key => $question)

	{{Form::open(['url' => 'taketests'])}}

	

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
{{Form::submit('Submit')}}
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>-->
	<!--
<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#submitTestConfirm">
     			 <span class="glyphicon glyphicon-pencil"> Start Test</span>
   		 </button>
                
                      <start test confirmation--
                      <div class="modal fade" id="submitTestConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Submit Test Confirmation</h4>
                            </div>
                            <div class="modal-body">
                           
                              <p>Are you sure you want to submit? You can no longer make any changes after submitting.</p>


                            </div>
                            <div class="modal-footer">
                            
                              <a class="btn btn-small btn-primary" href="#">Ok</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              
                              {{ Form::close() }}
                            </div>
                          </div> /.modal-content --
                        </div><!modal-dialog --
                      </div>-- /.modal -->
                      

{{Form::close()}}

@stop

@section("rightsidebar")

@stop