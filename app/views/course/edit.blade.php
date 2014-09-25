@extends("layout")
@section("content")


	{{ Form::open(array('url' => 'courses/' . $course['id'] ,
			'autocomplete' => 'off',
			'class' => 'form-horizontal'
			)) }}
<form class="form-horizontal" role="form">
		<div class="form-group">
        	<label class="col-md-4 control-label" for="course_code"><span style="font-family:sans-serif; font-size:13px ">Course Code</span></label>
            	{{ $course['course_code'] }}
    	</div>
    	<div class="form-group">
        	<label class="col-md-4 control-label" for="course_title"><span style="font-family:sans-serif; font-size:13px ">Course Title</span></label>
            	{{ $course['course_title'] }}
    	</div>

		<!-- Text input-->
	    <div class="form-group">
	        <label class="col-md-4 control-label" for="course_description"><span style="font-family:sans-serif; font-size:13px ">Course Description</span></label>  
	        <div class="col-md-8">
	            <input id="course_description" name="course_description" type="textarea" placeholder="" value="{{ $course['course_description'] }}" class="form-control input-md" required="">
	        </div>
	    </div>
		<tr>
			<td>
					{{ Form::hidden('_method', 'PUT') }}
					{{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
				{{ Form::close() }}
			</td>
		</tr>
</form>