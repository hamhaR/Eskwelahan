@extends("layout")
@section("content")
<div class="container">

<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Section Name </td>
			<td>Teacher</td>
			<td>Courses</td>
		</tr>
	</thead>
	<tbody>
		@foreach($sections as $section)
		<tr>
			<td>
				<input type="checkbox">
				{{$section->section_name}}
			</td>
			<td>{{$section->teacher->fname}}</td>
			<td>
				@foreach($section->courses as $course)

					{{$course->course_title}} <br>

				@endforeach
			</td>
		</tr>	
		@endforeach
	
	
	</tbody>
</table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
