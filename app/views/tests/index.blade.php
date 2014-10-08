@extends("layout")
@section("content")
<div class="container">


<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(Auth::check() && Auth::user()->role == 'student')
  <strong><h2>Pending Tests</h2></strong>
@endif

    @if(Auth::check() && Auth::user()->role == 'teacher')

    <strong><h2>Tests</h2></strong>
  
<!-- Button trigger modal -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  + Create Test
</button>
    @endif

<!--Index page-->
    <div id="table" style="padding:20px; text-align:center;">
    <table class="table table-hover table-bordered" border="3" style="text-align:left;">
            <thead style="text-align:center;">
                <tr>
                    <th>Course</th>
                    <th>Test Name</th>
                    <th>Date Created</th>
                    <th>Schedule</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tests as $key=> $test)
                <tr>
                    <td>{{ $test->course->course_code }}</td>
                   <td> <a href="{{ URL::route('tests.show', $test->id)}}">{{ $test->test_name }}</a></td>
                    <td>{{ date('j F Y, h:i A',strtotime($test->created_at)) }}</td>
                    <td>{{ date('j F Y, h:i A',strtotime($test->testDate)) }}</td>
                    <td>
                      @if(Auth::check() && Auth::user()->role == 'teacher')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit{{$key}}"><span class="glyphicon glyphicon-pencil"></span> Edit Test</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{$key}}"><span class="glyphicon glyphicon-remove"></span> Delete Test</button>
                      @endif
                      @if(Auth::user()->role == 'student')
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#">
                         <span class="glyphicon glyphicon-pencil"> Take Test</span>
                        </button>
                      @endif

                      <!--delete test-->
                      <div class="modal fade" id="delete{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Delete</h4>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to delete</p>
                                     

                            </div>
                            <div class="modal-footer">

                               {{ Form::open(array('route' => array('tests.destroy',$test->id))) }}
                              {{ Form::hidden('_method', 'DELETE') }}
                               {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
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
                                {{ Form::label('course_id', 'Course:') }}
                                {{ $test['  course_id']  }}
                              </div>

                              <!--testDate-->
                              <div class="form-group">
                                {{ Form::label('testDate', 'Schedule:') }}
                                {{ Form::text('testDate', Input::old('testDate'), array('class' => 'form-control', 'placeholder' => $test->testDate)) }}
                              </div>

                              <!--test name-->
                              <div class="form-group">
                                {{ Form::label('test_name', 'Test Name:') }}
                                {{ Form::text('test_name', Input::old('test_name'), array('class' => 'form-control', 'placeholder' => $test->test_name)) }}
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
          <div class="input-group">
                {{ Form::label('course_id', 'Course') }}
                <select name="course_id">
                    @foreach(Course::all() as $course)
                    <option value="{{ $course->id }}">{{ $course->course_code }} ({{ $course->course_title }})</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                 <span class="input-group-addon"> Test Date: </span>
                    {{ Form::text('testDate', null,  ['class'=>'form-control', 'placeholder'=>'MM-DD-YY, Time']) }}
            </div>

            <div class="input-group">
                 <span class="input-group-addon"> Test Name</span>
                    {{ Form::text('test_name', null, ['class'=>'form-control', 'placeholder'=>'Test Name']) }}
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

</div>