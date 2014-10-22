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
	
	
	<!-----------------FILE UPLOAD--------------------->
		{{ Form::open(array('url'=>'form-submit','files'=>true)) }}
  
		{{ Form::label('file','Upload File',array('id'=>'','class'=>'')) }}
		{{ Form::file('file','',array('id'=>'','class'=>'')) }} 
	
		{{ Form::reset('Reset') }}<br/><br/>
		
    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
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