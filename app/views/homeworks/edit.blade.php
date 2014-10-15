@extends("layout")
@section("content")

<h4>Editing: "{{ $homework->homework_title }}"</h4>

<!--{{ HTML::ul($errors->all()) }} -->

{{ Form::open(array('url' => '/update/' . $homework->id,
            'autocomplete' => 'off',
            'class' => 'form-horizontal'
            )) }}
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
    {{ Form::textarea('homework_instruction', $homework->homework_instruction ,array('id' => 'instructions_edit')) }}
    </div>
    {{ Form::submit('Update Homework', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../../ckeditor/ckeditor.js"></script>
        <script src="../../bootflat/js/bootstrap.min.js"></script>
        <script>
            $(function () {
                CKEDITOR.replace( 'instructions_edit', {
                    allowedContent:
                        'h1 h2 h3 p blockquote strong em;' +
                        'a[!href];' +
                        'img(left,right)[!src,alt,width,height];' +
                        'table tr th td caption;' +
                        'span{!font-family};' +
                        'span{!color};' +
                        'span(!marker);' +
                        'del ins'
                    } );
            });
        </script>