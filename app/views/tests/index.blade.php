@extends("layout")
@section("content")
<div class="container">


<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="col-md-12" >




    <strong><h2>Tests</h2></strong>

    @if(Auth::check() && Auth::user()->role == 'teacher')
        <a style="height:30px; padding:5px; " class="btn btn-primary" href="{{ URL::route('tests.create') }}"><span class="glyphicon glyphicon-plus"></span> Create Test</a>
        <br>
    @endif

    <div id="table" style="padding:20px; text-align:center;">
    <table class="table table-hover table-bordered" border="3" style="text-align:center;">
            <thead style="text-align:center;">
                <tr>
                    <th>Course</th>
                    <th>Test Name</th>
                    <th>Date Created</th>
                    <th>Test Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tests as $test)
                <tr>
                    <td>{{ $test->course->course_code }}</td>
                   <td> <a href="{{ URL::route('questions.index',array('id' => $test->test_id))}}">{{ $test->test_name }}</a></td>
                    <td>{{ date('j F Y, h:i A',strtotime($test->created_at)) }}</td>
                    <td>{{ date('j F Y, h:i A',strtotime($test->testDate)) }}</td>
                    <td>  <a style="height:30px; padding-up:30px; " class="btn btn-primary" href="#"> Edit</a>

                          <a style="height:30px; padding-up:30px; " class="btn btn-danger" href="#"> Delete</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    </div>
</div>