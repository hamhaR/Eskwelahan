@extends("layout")
@section("content")

{{ Form::open(array('url' => 'course')) }}

    <div class="form-group">
        <label for="course_code">Course code</label>
        <input class="form-control" id="course_code" name="course_code" placeholder="Course code">
    </div>
    <div class="form-group">
        <label for="course_section">Course section</label>
        <input class="form-control" id="course_section" name="course_section" placeholder="Course section">
    </div>
    <div class="form-group">
        <label for="course_title">Course title</label>
        <input class="form-control" id="course_title" name="course_title" placeholder="Course title">
    </div>
    <div class="form-group">
        <label for="course_description">Course description</label>
        <input class="form-control" id="course_description" name="course_description" placeholder="Course description">
    </div>
    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
    </div>

{{ Form::close() }}