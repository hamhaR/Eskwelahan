@extends("layout")
@section("content")
<!-- edit blade php for materials -->
<h4>Editing: "{{ $material->material_title }}"</h4>

<!--{{ HTML::ul($errors->all()) }} -->

{{ Form::open(array('url' => '/update/' . $material->id,
            'autocomplete' => 'off',
            'class' => 'form-horizontal'
            )) }}
    <div class="form-group">
    {{ Form::label('course_id', 'Course') }}
    <select name="course_id">
        @foreach($courses as $value)
            @if($value->id == $material->course_id)
                <option selected="selected" value="{{ $value->id }}">{{ $value->course_code }} ({{ $value->course_title }})</option>
            @else
                <option value="{{ $value->id }}">{{ $value->course_code }} ({{ $value->course_title }})</option>
            @endif
        @endforeach
    </select>
    </div>
    <div class="form-group">
    {{ Form::label('material_title', 'Title') }}
    {{ Form::text('material_title', $material->material_title) }}
    </div>

    <div class="form-group">
    {{ Form::label('material_instruction', 'Description') }}
    {{ Form::textarea('material_instruction', $material->material_instruction ,array('id' => 'instructions_edit')) }}
    </div>
    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
