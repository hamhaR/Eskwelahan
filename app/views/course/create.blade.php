
{{ Form::open(array('url' => 'course')) }}

<form action="" method="post">
    <h1>Course Form </h1>
    <li>
        <span>Course code :</span>
        <input id="course_code" name="course_code" />
    </li>
    
    <li>
        <span>Course title :</span>
        <input id="course_title" name="course_title"  />
    </li>
    
    <li>
        <span>Course description :</span>
        <textarea id="course_description" name="course_description" ></textarea>
    </li> 
    {{ Form::submit('Submit') }}
</form>

{{ Form::close() }}