<!------------CREATE.BLADE.PHP FOR SUBMIT HOMEWORK------------------>

@extends("layout")
@section("content")


{{ Form::open([
		"url"			=> "submithomeworks",
		"autocomplete"	=> "off",
        "class"			=> "form-horizontal"
		
]) }}
	
	
	
	
	<div class="form-group">
	
		{{ Form::label('homework_body', 'Answers here') }}
		<!--{{ Form::textarea('homework_body', Input::old('homework_body'), array('class' => 'form-control')) }}-->
		{{ Form::textarea('homework_body', Input::old('homework_body'), array('id' => 'body_homework')) }}
	</div>
<!--------------FOR FILE UPLOAD---------------->	
<!--	{{ Form::open(array('url'=>'form-submit','files'=>true)) }}
		
		{{ Form::label('file','Upload File',array('id'=>'','class'=>'')) }}
		{{ Form::file('file','',array('id'=>'file','class'=>'getRealPath()')) }} 
		
		{{ Form::reset('Reset') }}
		{{ Form::close() }}
<!--------------------------------------------->
		
    {{ Form::submit('Submit Homework', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop
@section("rightsidebar")


        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../ckeditor/ckeditor.js"></script>
        <script src="../bootflat/js/bootstrap.min.js"></script>
        <script>
            $(function () {
                CKEDITOR.replace( 'body_homework', {
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