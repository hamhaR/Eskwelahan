@extends("layout")
@section("content")
   	
<h1>Add a Homework</h1>

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
        <option value="{{ $value->id }}">{{ $value->course_code }} ({{ $value->course_title }})</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
    {{ Form::label('homework_title', 'Homework Title') }}
    {{ Form::text('homework_title', "") }}
    </div>

    <div class="form-group">
    {{ Form::label('homework_instruction', 'Homework Guidelines') }}
    {{ Form::textarea('homework_instruction', "" ,array('class' => 'ckeditor')) }}
    </div>
    {{ Form::submit('Post Homework', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../ckeditor/ckeditor.js"></script>
        <script src="../bootflat/js/bootstrap.min.js"></script>