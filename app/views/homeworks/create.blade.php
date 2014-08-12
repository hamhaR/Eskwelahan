<!-- app/views/users/create.blade.php-->
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">var siteloc = "{{ url('/') }}"</script>
    <title>Eskwelahan</title>
    
        <!-- Bootstrap core CSS -->
        {{ HTML::style('bootflat/css/bootstrap.min.css')}}

        <!-- Custom styles for this template -->
        {{ HTML::style('bootflat/css/layout.css')}}
    </head>
<body>

<div class="container">

  <div class="row">
   	
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
    {{ Form::label('homework_description', 'Homework Guidelines') }}
    {{ Form::textarea('homework_description', "") }}
    </div>
    {{ Form::submit('Post Homework', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
<div class="col-md-4" >
	
</div>
</div>
<div class="row">
	
</div>




</div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>
        <script src="../ckeditor/ckeditor.js"></script>
        <script src="../bootflat/js/bootstrap.min.js"></script>
</body>
</html>