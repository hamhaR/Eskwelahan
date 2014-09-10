@extends("layout")
@section("content")
<div class="container">
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
			<td>{{$section->section_name}}</td>
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