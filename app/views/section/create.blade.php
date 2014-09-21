@extends("layout")
@section("content")
<div class="container">
{{ Form::open(array('url' => 'sections')) }}

    <div class="form-group">
        <label for="section_name">Section Name</label>
        <input class="form-control" id="section_name" name="section_name" placeholder="Section Name">
    </div>

    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
    </div>

{{ Form::close() }}