@extends("layout")
@section("content")

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Section Name </td>
			<td>Teacher</td>
			<td>Students</td>
		</tr>		
	</thead>
	<tbody>
		<tr>
			<td>{{$section->section_name}}</td>
			<td>{{$section->teacher->fname}}</td>
			<td>
				@foreach($section->students as $student)
					{{$student->fname}} <br>
				@endforeach				
			</td>
		</tr>
	</tbody>
</table>