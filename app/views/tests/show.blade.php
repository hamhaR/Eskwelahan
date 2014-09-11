@extends("layout")
@section("content")


<div class="container">

<h3><strong>Tests</strong></h3>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="col-md-6 col-md-offset-3">
<table class="table table-hover">
    <tbody
        <tr> 
            <td> Course: </td>
            <td> {{ $test['course']['course_code'] }} </td>
        </tr>
        <tr> 
            <td> Name: </td>
            <td> {{ $test['test_name'] }} </td>
        </tr>
        <tr> 
        <tr>
            <td>Create question</td>
            <td> <a class="btn btn-small btn-primary" href="{{ URL::route('questions.create') }} ">CreateQuestion</a>  </td>
        </tr>
    </tbody>
</table>

</div>


