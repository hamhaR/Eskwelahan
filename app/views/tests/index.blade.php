@extends("layout")
@section("content")

<!--Index page-->
    <div id="table" style="padding:20px; text-align:center;">
    <table class="table table-hover table-bordered" border="3" style="text-align:left;">
            <thead style="text-align:center;">
                <tr>
                    <th>Course</th>
                    <th>Test Name</th>
                    @if(Auth::check() && Auth::user()->role == 'teacher')
                    <th>Date Created</th>
                    @endif
                    
                    <th>Take From</th>
                    <th>To</th>
                    @if(Auth::check() && Auth::user()->role == 'teacher')
                    <th>Options</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($tests as $key=> $test)
              
                <tr>
                    <td>{{ $test->section_id}} </td>

                 
                      <td> <a href="{{ URL::route('tests.show', $test->id)}}">{{ $test->test_name }}</a></td>
       
                    @if(Auth::check() && Auth::user()->role == 'teacher')
                    <td>{{ date('j F Y, h:i A',strtotime($test->created_at)) }}</td>
                    @endif
                  
                    <td>{{ date('j F Y, h:i A',strtotime($test->time_start)) }}</td>
                    <td>{{ date('j F Y, h:i A',strtotime($test->time_end)) }}</td>
                    <td>
                      @if(Auth::check() && Auth::user()->role == 'teacher')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit{{$key}}"><span class="glyphicon glyphicon-small  glyphicon-pencil"></span> </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{$key}}"><span class="glyphicon glyphicon-small glyphicon-remove"></span></button>
                      @endif
                      @if(Auth::user()->role == 'student')
                        
                      @endif

                      <!-- Delete Modal -->
                      <div class="modal fade" id="delete{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Delete</h4>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to delete this test?</p>
                                     

                            </div>
                            <div class="modal-footer">

                               {{ Form::open(array('method' => 'DELETE', 'route' => array('tests.destroy',$test->id))) }}
                               {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                               {{ Form::close() }}
                               
                              
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->

                      <!-- Edit Test-->
                      <div class="modal fade" id="edit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Edit Test</h4>
                            </div>
                            <div class="modal-body">
                             {{Form::model($test,array('route' => array('tests.update', $test->id), 'method' => 'PUT'))}}

                                <!--uneditable course-->
                              <div class="form-group">
                                 {{ Form::label('course_title', 'Course') }}
                                  <select class="form-control" id="section_id" name="section_id" readonly>
                                    
                                    @foreach($sections as $section)
                                    @foreach($section->courses as $course)
                                    
                                      
                                      <option value="{{$section->section_id}}" >
                                        {{$course->course_title}} - {{$section->section_name}} 
                                      </option>
                                    
                                    @endforeach
                                    @endforeach
                                  </select>
                                </div>

                              <!--test name-->
                              <div class="form-group">
                                {{ Form::label('test_name', 'Test Name:') }}
                                {{ Form::text('test_name', Input::old('test_name'), array('class' => 'form-control', 'placeholder' => $test->test_name)) }}
                              </div>

                              <!--test instructions-->
                              <div class="form-group">
                                {{ Form::label('test_instructions', 'Test Instructions:') }}
                                {{ Form::text('test_instructions', Input::old('test_instructions'), array('class' => 'form-control', 'placeholder' => $test->test_instructions)) }}
                              </div>

                              <!--time start-->
                              Schedule:<br>
                              <div class="form-group">
                                {{ Form::label('time_start', 'From:') }}
                                {{ Form::text('time_start', Input::old('time_start'), array('class' => 'form-control', 'placeholder' => $test->time_start)) }}
                              </div>

                              <!--time_end-->
                              <div class="form-group">
                                {{ Form::label('time_end', 'To:') }}
                                {{ Form::text('time_end', Input::old('time_end'), array('class' => 'form-control', 'placeholder' => $test->time_end)) }}
                              </div>

                              
                             
                            </div>
                            <div class="modal-footer">
                              {{ Form::hidden('_method', 'PUT') }}
                              {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}

                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              {{ Form::close() }}
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end for edit test-->
                    </td>
                </tr>
                   @endforeach
                  

            </tbody>
        </table>
    </div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Test</h4>
      </div>
      <div class="modal-body">
      
             {{Form::open(array('url' => 'tests'))}}

          <div class="form-group">
           {{ Form::label('course_title', 'Course') }}
            <select class="form-control" id="section_id" name="section_id">
              
              @foreach($sections as $section)
              @foreach($section->courses as $course)
              
                
                <option value="{{$section->section_id}}" >
                  {{$course->course_title}} - {{$section->section_name}} - {{$section->section_id}}
                </option>
              
              @endforeach
              @endforeach
            </select>
          </div>

            <div class="form-group">
              {{ Form::label('test_name', 'Test Name' ) }}
              {{ Form::text('test_name', null, array('class' => 'form-control', 'placeholder' => 'Test Name ')) }}
            </div>

            <div class="form-group">
              {{ Form::label('test_instructions', 'Test Instructions' ) }}
              {{ Form::text('test_instructions', null, array('class' => 'form-control', 'placeholder' => 'Test Instructions ')) }}
            </div>

            Schedule of Test
            <div class="form-group">
              {{ Form::label('time_start', 'From:') }}
              {{ Form::text('time_start', null, array('class'=>'form-control', 'placeholder'=>'MM-DD-YY, Time')) }}
            </div>

            <div class="form-group">
              {{ Form::label('time_end', 'To: ' ) }}
              {{ Form::text('time_end', null, array('class'=>'form-control', 'placeholder'=>'MM-DD-YY, Time')) }}
            </div>
          

         
        </div>

   
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>
@stop

@section("rightsidebar")
  
  @if(Auth::check() && Auth::user()->role == 'teacher')
    <!-- Button trigger modal -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      + Create Test
    </button>
  @endif

@stop
