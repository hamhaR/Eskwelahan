@extends("layout")

@section("content")



@foreach($taketests as $key => $taketest)
<h4>Thank you for taking this test. Your score is {{ $taketest->score }} / <?php . count($questions) ?> .</h4><br>
@endforeach




@stop

@section("rightsidebar")

@stop

@stop