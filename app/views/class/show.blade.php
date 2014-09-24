@extends("layout")
@section("content")
<div class="container">



<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Student
</button><br><br>

Course:	{{Course::where('id','=', $course_id)->first()->course_title}}<br>
Section: {{$section->section_name}}<br>
Teacher: {{$section->teacher->fname}}<br><br>


<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		
			@foreach($section->students as $student)
			<tr>
				<td>{{$student->fname}}</td>
				<td>{{$student->lname}}</td>
				<td>{{$student->gender}}</td>
				<td>{{$student->address}}</td>
				<td>{{$student->email}}</td>
			</tr>
			@endforeach
		
	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a student</h4>
      </div>
      <div class="modal-body">
        {{Form::open(array('url' => 'students'))}}
          <div class="form-group">
           {{ Form::label('student', 'Name') }}
            <select class="form-control" id="student_id" name="student_id">
              @foreach(User::where('role','=','student')->get() as $stud)
                
                <option value="{{$stud->id}}">
                  {{$stud->fname}} {{$stud->lname}} 
                </option>

              @endforeach
            </select>
            {{Form::hidden('student',User::where(array('fname' => $stud->fname,'lname' => $stud->lname))->get())}}
            {{Form::hidden('course_id',$course_id)}}
            {{Form::hidden('section_id',$section->section_id)}}
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
