@extends("layout")
@section("content")

{{ HTML::style('bootflat/css/datepicker.css')}}
    

<!--{{ HTML::ul($errors->all()) }} -->

<div class="col-md-4" >
    
    <h3><strong>Create Test</strong></h3>
    <div class="panel panel-primary" >  
        <div class="panel-body" >

            {{ Form::open([
                "url"        => "tests",
                "autocomplete" => "off",
                "class" => "form-horizontal"
            ]) }}

            <div class="input-group">
                {{ Form::label('course_id', 'Course') }}
                <select name="course_id">
                    @foreach($courses as $value)
                    <option value="{{ $value->id }}">{{ $value->course_code }} ({{ $value->course_title }})</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                 <span class="input-group-addon"> Test Date: </span>
                    {{ Form::text('testDate', null,  ['class'=>'form-control', 'placeholder'=>'MM-DD-YY, Time']) }}
            </div>

            <div class="input-group">
                 <span class="input-group-addon"> Test Name</span>
                    {{ Form::text('test_name', null, ['class'=>'form-control', 'placeholder'=>'Test Name']) }}
            </div>

            <!-- Button -->
            <div class="row">
                <div class="col-md-4 controls">
                    {{ Form::submit(' + Create', ['class'=>'btn btn-primary'])}}
                     <br>
                </div>
                     <a class="btn btn-small btn-danger" href="{{ URL::route('tests.index') }}">x Cancel</a>
            </div>
{{ Form::close() }}
        </div>
    </div>
</div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../bootflat/js/bootstrap.min.js"></script>
        <script src="../bootflat/js/bootstrap-datepicker.js"></script>
