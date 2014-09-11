@extends("layout")
@section("content")

<div class="container">
  <table border="3">
  <div id="form" >

{{ Form::open([
        "url"        => "tests",
        "autocomplete" => "off",
        "class"        => "form-horizontal"
]) }}

<div class="col-md-4" >

    <div class="form-group">
      {{ Form::label('course_id', 'Course') }}
      <select name="course_id">
          @foreach($courses as $value)
          <option value="{{ $value->id }}">{{ $value->course_code }} </option>
          @endforeach
      </select>
    </div>

    <div class="form-group">
    {{ Form::label('test_name', 'Test Name') }}
    {{ Form::text('test_name', "") }}
    </div>

    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
     <a  class="btn btn-small btn-danger" href="{{ URL::route('tests.index') }}" id="cancel"><i class="glyphicon glyphicon-remove"></i>    CANCEL</a>

   {{ Form::close() }}
</div>
</table>
</div>

</div>


