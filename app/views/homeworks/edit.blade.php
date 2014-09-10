@extends("layout")
@section("content")
   	
<h1>Editing Homework: {{ $homework->homework_title }}</h1>

<!--{{ HTML::ul($errors->all()) }} -->

<div class="col-md-4" >
{{ Form::open([
        "url"        => "homeworks",
        "autocomplete" => "off",
        "class" => "form-horizontal"
    ]) }}
    <div class="form-group">
    {{ Form::label('course_id', 'Course') }}
    <select name="course_id">
        @foreach($courses as $value)
            @if($value->id == $homework->course_id)
                <option selected="selected" value="{{ $value->id }}">{{ $value->course_code }} ({{ $value->course_title }})</option>
            @else
                <option value="{{ $value->id }}">{{ $value->course_code }} ({{ $value->course_title }})</option>
            @endif
        @endforeach
    </select>
    </div>
    <div class="form-group">
    {{ Form::label('homework_title', 'Homework Title') }}
    {{ Form::text('homework_title', $homework->homework_title) }}
    </div>

    <div class="form-group">
    {{ Form::label('homework_instruction', 'Homework Guidelines') }}
    {{ Form::textarea('homework_instruction', $homework->homework_instruction ,array('class' => 'ckeditor')) }}
    </div>
    {{ Form::submit('Update Homework', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../../ckeditor/ckeditor.js"></script>
        <script src="../../bootflat/js/bootstrap.min.js"></script>