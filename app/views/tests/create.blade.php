@extends("layout")
@section("content")
    
<h1><strong>Create Test</strong></h1>

<!--{{ HTML::ul($errors->all()) }} -->

<div class="col-md-4" >
{{ Form::open([
        "url"        => "tests",
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
    {{ Form::label('test_name', 'Test Name') }}
    {{ Form::text('test_name', "") }}
    </div>

    {{ Form::submit('Create Test', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../bootflat/js/bootstrap.min.js"></script>