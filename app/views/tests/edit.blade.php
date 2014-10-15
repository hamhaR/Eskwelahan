@extends("layout")
@section("content")

{{ Form::open([
        'route' => ['tests.update', $id],
        'method' => 'PUT',
        "autocomplete" => "off",
        "class"        => "form-horizontal"
]) }}


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
        <label class="control-label" for="test_name"><span style="font-family:sans-serif; font-size:13px ">Item Name</span></label>  
        <input id="test_name" name="test_name" type="text" placeholder="" value="{{ $test_name }}" class="form-control input-md" required="">
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="control-label" for="testDate"><span style="font-family:sans-serif; font-size:13px ">Test Date</label>  
        <input id="testDate" name="testDate" type="text" placeholder="" value="{{ $testDate }} "class="form-control input-md" required="">
    </div>
    <!-- Button -->
    <div class="form-group">
        <label class="control-label" for="update"></label>
       
            <button id="edit" name="update" onclick="submitEdit( {{ $id }} )" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>   UPDATE</button>
             <button class="btn btn-small btn-danger" href="{{ URL::route('tests.index') }}" id="cancel"><i class="glyphicon glyphicon-remove"></i>    CANCEL</button>
       
    </div>
</div>
    

{{ Form::close() }}

@stop
