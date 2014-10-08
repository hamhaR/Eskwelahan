@extends("layout")
@section("content")
<div class="container">
@if(Auth::check() && Auth::user()->role == 'teacher')
 <div class="row"> 
  <div class="col-md-3">
<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  + Add Question
</button>
</div>
</div>
@endif
<br>
<div class="row">
@foreach($questions as $question)
 
    <div class="col-md-3">

            <div class="panel panel-primary">
              <div class="panel-heading">
                <a class="panel-title" ><strong>Question No. {{$question->id}}</strong></a> 

              </div>
              
              <div class="panel-body">
               Question: {{$question->content}}
                <br>
                Choices:
                <br>
                a.) {{ $question->choice1 }}
                <br>
                b.) {{ $question->choice2 }}
                <br>
                c.) {{ $question->choice3 }}
                <br>
                d.) {{ $question->choice4 }}
                <br>
                Answer: {{ $question->answer }}
                <br>
                
                <br><br>
                @if(Auth::user()->role == 'teacher')
               <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                 <span class="glyphicon glyphicon-trash"></span>
               </button>
               <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                 <span class="glyphicon glyphicon-pencil"></span>
               </button>
                @endif
                
              </div>
            </div>
    </div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this question? </p>
               

      </div>
      <div class="modal-footer">

         {{ Form::open(array('url' => 'questions', 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
         {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">
        {{Form::open(array('url' => 'questions/'.$test->test_id, 'class' => 'pull-right'))}}
        
      </div>
      <div class="modal-footer">
         {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><! /.modal-content -
  </div><!- /.modal-dialog -
</div><!-/.modal -
-->

@endforeach

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add question</h4>
      </div>
      <div class="modal-body">
      
      {{Form::open(array('url' => 'questions'))}}

          <div class="form-group">
            {{ Form::label('content', 'Content') }}
            {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
          </div>

          <br>
          <p>Choices:</p>
          </br>

          <div class="form-group">
            {{ Form::label('choice1', 'A: ') }}
            {{ Form::text('choice1', Input::old('choice1'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('choice2', 'B: ') }}
            {{ Form::text('choice2', Input::old('choice2'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('choice3', 'C: ') }}
            {{ Form::text('choice3', Input::old('choice3'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('choice4', 'D: ') }}
            {{ Form::text('choice4', Input::old('choice4'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('answer', 'Answer') }}
            {{ Form::text('answer', Input::old('answer'), array('class' => 'form-control')) }}
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>





</div>