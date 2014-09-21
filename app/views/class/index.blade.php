@extends("layout")
@section("content")
<div class="container">
 <div class="row"> 
  <div class="col-md-3">
<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  + Add Class
</button>
</div>
</div>
<br>
<div class="row">
@foreach($sections as $section)
  @foreach($section->courses as $course)
    <div class="col-md-3">

            <div class="panel panel-primary">
              <div class="panel-heading">
                <a class="panel-title" href="{{ URL::route('classes.show',array('id' => $section->section_id,'course_id' => $course->id))}}"><strong>{{$course->course_title}}</strong></a> 
                <h2 class="panel-title">{{$section->section_name}}</h2>     


              </div>
              <div class="panel-body">
               Prof. {{$section->teacher->fname}}
                {{$section->teacher->lname}}
                <br>
                
                <br><br><br><br>
                <div class="dropdown">
                  <button class="btn btn-normal dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
            </div>
    </div>

  @endforeach
@endforeach

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Create a class</h4>
      </div>
      <div class="modal-body">
      
      {{Form::open(array('url' => 'classes'))}}
          <div class="form-group">
           {{ Form::label('course_title', 'Course') }}
            <select class="form-control" id="course_title" name="course_title">
              @foreach(Course::all() as $course)
                
                <option>
                  {{$course->course_title}}
                </option>
              
              @endforeach
            </select>
          </div>

          <div class="form-group">
            {{ Form::label('section_name', 'Section') }}
            {{ Form::text('section_name', Input::old('section_name'), array('class' => 'form-control')) }}
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



<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Student</h4>
      </div>
      <div class="modal-body">
      
      {{Form::open(array('url' => 'classes'))}}
          <div class="form-group">
           {{ Form::label('student_name', 'Name') }}
            <select class="form-control" id="student_name" name="student_name">
              @foreach(User::where('role','=','student')->get() as $student)
                
                <option>
                  {{$student->fname}} {{$student->lname}}
                </option>
              
              @endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>

</div>