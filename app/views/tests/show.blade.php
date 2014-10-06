@extends("layout")
@section("content")
<div class="container">


@if(Auth::check() && Auth::user()->role == 'teacher')
<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  + Add Question
</button><br><br>
@endif



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



@endforeach

</div>

<!-- add question -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Question</h4>
      </div>
      <div class="modal-body">
      
             {{Form::open(array('url' => 'questions'))}}
        <div class="input-group">
                 <span class="input-group-addon"> Question: </span>
                    {{ Form::text('content', null, ['class'=>'form-control', 'placeholder'=>'Put your question']) }}
            </div>
        </div>

        <br>
        <h3>Choices: </h3>
        <br>

        <div class="input-group">
          <span class="input-group-addon"> a).  </span>
            {{ Form::text('choice1', null, ['class'=>'form-control', 'placeholder'=>'option a']) }}
        </div>

         <div class="input-group">
          <span class="input-group-addon"> b).  </span>
            {{ Form::text('choice2', null, ['class'=>'form-control', 'placeholder'=>'option b']) }}
        </div>

         <div class="input-group">
          <span class="input-group-addon"> c).  </span>
            {{ Form::text('choice3', null, ['class'=>'form-control', 'placeholder'=>'option c']) }}
        </div>

         <div class="input-group">
          <span class="input-group-addon"> d).  </span>
            {{ Form::text('choice4', null, ['class'=>'form-control', 'placeholder'=>'option d']) }}
        </div>

         <div class="input-group">
          <span class="input-group-addon"> Answer:  </span>
            {{ Form::text('answer', null, ['class'=>'form-control', 'placeholder'=>'correct answer']) }}
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