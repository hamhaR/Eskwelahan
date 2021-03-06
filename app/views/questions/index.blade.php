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
@foreach($questions as $key => $question)
 
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
                a.) {{ $question->a }}
                <br>
                b.) {{ $question->b }}
                <br>
                c.) {{ $question->c }}
                <br>
                d.) {{ $question->d }}
                <br>
                Answer: {{ $question->correct_answer }}
                <br>
                
                <br><br>
                @if(Auth::user()->role == 'teacher')
               <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$key}}">
                 <span class="glyphicon glyphicon-trash"></span>
               </button>
               <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$key}}">
                 <span class="glyphicon glyphicon-pencil"></span>
               </button>
                @endif
                
              </div>
            </div>

            <div class="modal fade" id="delete{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

        {{ Form::open(array('route' => 'questions.destroy', $question->id)) }}
        
         {{ Form::submit('Delete', array('class' => 'btn btn-success')) }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </div>




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
            {{ Form::label('a', 'A: ') }}
            {{ Form::text('a', Input::old('a'), array('class' => 'form-control')) }}
          </diva
          <div class="form-group">
            {{ Form::label('b', 'B: ') }}
            {{ Form::text('b', Input::old('b'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('c', 'C: ') }}
            {{ Form::text('c', Input::old('c'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('d', 'D: ') }}
            {{ Form::text('d', Input::old('d'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('corect_answer', 'Answer') }}
            {{ Form::text('correct_answer', Input::old('correct_answer'), array('class' => 'form-control')) }}
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