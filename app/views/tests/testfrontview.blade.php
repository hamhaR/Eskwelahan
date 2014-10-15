@extends("layout")
@section("content")

Good day ! If you want to take this test, click on strart test button on the rightside.



@stop
@section("rightsidebar")
	@if(Auth::check() && Auth::user()->role == 'student')
		 <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#startTestConfirm">
     			 <span class="glyphicon glyphicon-pencil"> Start Test</span>
   		 </button>
                
                      <!--start test confirmation-->
                      <div class="modal fade" id="startTestConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Start Test Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to take the test?</p>
                                     

                            </div>
                            <div class="modal-footer">
                            
                              <a class="btn btn-small btn-primary" href="/taketest/{{ $test['id']	 }}">Ok</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              {{ Form::close() }}
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
	@endif
@stop