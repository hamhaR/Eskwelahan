@extends("layout")
@section("content")

@foreach($questions as $question)

 
    <div class="col-md-12">

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
                @if(Auth::user()->role == 'teacher' )
                <!--ayha ra idisplay ang answer if role== ''teacher-->
                Answer: {{ $question->answer }}
                <br>
                @endif
                
                <br><br>
                @if(Auth::user()->role == 'teacher')
               <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$key}}">
                 <span class="glyphicon glyphicon-trash"></span>
               </button>
               <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$key}}">
                 <span class="glyphicon glyphicon-pencil"></span>
               </button>
                @endif
                
              </div>
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

        <!-- 
         {{ Form::open(array('url' => 'questions', 'class' => 'pull-right')) }} -->
         {{ Form::open(array('method' => 'DELETE', 'route' => array('questions.destroy', $question->id))) }}
       
         {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


                      <!-- Edit Question-->
                      <div class="modal fade" id="edit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Edit Question</h4>
                            </div>
                            <div class="modal-body">
                             {{Form::model($question,array('route' => array('questions.update', $question->id), 'method' => 'PUT'))}}

                            
                              <!--content-->
                              <div class="form-group">
                                {{ Form::label('content', 'Question:') }}
                                {{ Form::text('content', Input::old('content'), array('class' => 'form-control', 'placeholder' => $question->content)) }}
                              </div>

                              <!--choice1-->
                              <div class="form-group">
                                {{ Form::label('choice1', 'a:') }}
                                {{ Form::text('choice1', Input::old('choice1'), array('class' => 'form-control', 'placeholder' => $question->choice1)) }}
                              </div>

                              <!--choice2-->
                              <div class="form-group">
                                {{ Form::label('choice2', 'b:') }}
                                {{ Form::text('choice2', Input::old('choice2'), array('class' => 'form-control', 'placeholder' => $question->choice2)) }}
                              </div>

                              <!--choice3-->
                              <div class="form-group">
                                {{ Form::label('choice3', 'c:') }}
                                {{ Form::text('choice3', Input::old('choice3'), array('class' => 'form-control', 'placeholder' => $question->choice3)) }}
                              </div>

                              <!--choice4-->
                              <div class="form-group">
                                {{ Form::label('choice4', 'd:') }}
                                {{ Form::text('choice4', Input::old('choice4'), array('class' => 'form-control', 'placeholder' => $question->choice4)) }}
                              </div>

                              <!--answer-->
                              <div class="form-group">
                                {{ Form::label('answer', 'Answer:') }}
                                {{ Form::text('answer', Input::old('answer'), array('class' => 'form-control', 'placeholder' => $question->answer)) }}
                              </div>
                             
                            </div>
                            <div class="modal-footer">
                              {{ Form::hidden('_method', 'PUT') }}
                              {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}

                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              {{ Form::close() }}
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end for edit test-->



@endforeach

@stop

@section("rightsidebar")
  @if(Auth::check() && Auth::user()->role == 'teacher')
  <!-- Button trigger modal -->
  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    + Add Question
  </button><br><br>
  @endif
@stop

<!-- add question -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Question</h4>
      </div>
      <div class="modal-body">
      
             {{Form::open(['route' => 'questions.store'])}}
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
        {{Form::hidden('test_id', $test_id)}}
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        {{Form::close()}}
        </div>
      </div>
    </div>
  </div>
