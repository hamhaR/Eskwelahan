@extends("layout")
@section("content")
<div class="container">
{{ Form::model($section, array('route' => array('sections.update', $section->section_id), 'method' => 'PUT')) }}

    <div class="form-group">
    	{{ Form::label('section_name', 'Section') }}
		{{ Form::text('section_name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}