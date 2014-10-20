@extends("layout")
@section("content")
   	


<!--{{ HTML::ul($errors->all()) }} -->

<div class="container">
<div class="row">
    <div class="col-md-12">

    <h3>Create Educational Material</h3>
{{ Form::open([
        "url"       	 => "materials",
        "autocomplete"	 => "off",
        "class"			 => "form-horizontal"
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
    {{ Form::label('material_title', 'Title Here') }}
    {{ Form::text('material_title', "") }}
    </div>

    <div class="form-group">
    {{ Form::label('material_instruction', 'Description') }}
	</div>
	<div class="form-group">
    {{ Form::textarea('material_instruction', "" ,array('id' => 'instructions_create')) }}
    </div>
	
	<!-----------------FILE UPLOAD--------------------->
	{{ Form::open(array('url'=>'form-submit','files'=>true)) }}
  
	{{ Form::label('file','Upload File',array('id'=>'','class'=>'')) }}
	{{ Form::file('file','',array('id'=>'','class'=>'')) }} 
	
	{{ Form::reset('Reset') }}
    {{ Form::submit('Post Material', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
    </div>
</div>
</div>


@stop
@section("rightsidebar")

        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../ckeditor/ckeditor.js"></script>
        <script src="../bootflat/js/bootstrap.min.js"></script>
        <script>
            $(function () {
                CKEDITOR.replace( 'instructions_create', {
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