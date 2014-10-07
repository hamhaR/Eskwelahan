@extends("layout")
@section("content")

{{ Form::open([
        'route' => ['tests.update', $id],
        'method' => 'PUT',
        "autocomplete" => "off",
        "class"        => "form-horizontal"
]) }}

<div class="col-md-6 col-md-offset-3">
<div style="background: rgba(255,255,255, 0.3); padding: 5px 20px 10px 20px">
<fieldset>

    <!-- Form Name -->
    <legend><span style="font-family:sans-serif:  font-size:10px; text-transform:uppercase;">Edit Test</span></legend>
    
    <div class="form-group">
                {{ Form::label('course_id', 'Course') }}
                <select name="course_id">
                    @foreach(Course::all() as $course)
                    <option value="{{ $course->id }}">{{ $course->course_code }} ({{ $course->course_title }})</option>
                    @endforeach
                </select>
            </div>

    <!-- Text input-->  
    <div class="form-group">
        <label class="col-md-4 control-label" for="test_name"><span style="font-family:sans-serif; font-size:13px ">Item Name</span></label>  
        <div class="col-md-8">
            <input id="test_name" name="test_name" type="text" placeholder="" value="{{ $test_name }}" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="testDate"><span style="font-family:sans-serif; font-size:13px ">Test Date></label>  
        <div class="col-md-8">
            <input id="testDate" name="testDate" type="text" placeholder="" value="{{ $testDate }} "class="form-control input-md" required="">

        </div>
    </div>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-9 control-label" for="update"></label>
        <div class="col-md-6">
            <button id="edit" name="update" onclick="submitEdit( {{ $id }} )" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>   UPDATE</button>
             <a  class="btn btn-small btn-danger" href="{{ URL::route('tests.index') }}" id="cancel"><i class="glyphicon glyphicon-remove"></i>    CANCEL</a>
        </div>
    </div>
</div>
    
    
    
</fieldset>

{{ Form::close() }}
</div>
</div>
@stop
