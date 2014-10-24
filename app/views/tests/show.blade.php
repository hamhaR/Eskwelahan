@extends("layout")
@section("content")

@foreach($questions as $key => $question)

 
    <div class="col-md-12">

            <div class="panel panel-primary">
              <div class="panel-heading">
                <a class="panel-title" ><strong>Question No. {{$key+1}}</strong></a> 

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
                @if(Auth::user()->role == 'teacher' )
                <!--ayha ra idisplay ang correct_answer if role== ''teacher-->
                correct_answer: {{ $question->correct_answer }}
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

                              <!--a-->
                              <div class="form-group">
                                {{ Form::label('a', 'a:') }}
                                {{ Form::text('a', Input::old('a'), array('class' => 'form-control', 'placeholder' => $question->a)) }}
                              </div>

                              <!--b-->
                              <div class="form-group">
                                {{ Form::label('b', 'b:') }}
                                {{ Form::text('b', Input::old('b'), array('class' => 'form-control', 'placeholder' => $question->b)) }}
                              </div>

                              <!--c-->
                              <div class="form-group">
                                {{ Form::label('c', 'c:') }}
                                {{ Form::text('c', Input::old('c'), array('class' => 'form-control', 'placeholder' => $question->c)) }}
                              </div>

                              <!--d-->
                              <div class="form-group">
                                {{ Form::label('d', 'd:') }}
                                {{ Form::text('d', Input::old('d'), array('class' => 'form-control', 'placeholder' => $question->d)) }}
                              </div>

                              <!--correct_answer-->
                              <div class="form-group">
                                {{ Form::label('correct_answer', 'correct_answer:') }}
                                {{ Form::text('correct_answer', Input::old('correct_answer'), array('class' => 'form-control', 'placeholder' => $question->correct_answer)) }}
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
                      <!--end for edit question-->



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
        <div class="form-group">
              {{ Form::label('content', 'Question:' ) }}
              {{ Form::text('content', null, array('class' => 'form-control', 'placeholder' => 'Put your question here.')) }}
        </div>
        
        <br>
        Choices:

        <!--a-->
        <div class="form-group">
              {{ Form::label('a', 'a.) ' ) }}
              {{ Form::text('a', null, array('class' => 'form-control', 'placeholder' => 'option a')) }}
        </div>

        <!--b-->
        <div class="form-group">
              {{ Form::label('b', 'b.) ' ) }}
              {{ Form::text('b', null, array('class' => 'form-control', 'placeholder' => 'option b')) }}
        </div>

        <!--c-->
        <div class="form-group">
              {{ Form::label('c', 'c.) ' ) }}
              {{ Form::text('c', null, array('class' => 'form-control', 'placeholder' => 'option c')) }}
        </div>

        <!--d-->
        <div class="form-group">
              {{ Form::label('d', 'd.) ' ) }}
              {{ Form::text('d', null, array('class' => 'form-control', 'placeholder' => 'option d')) }}
        </div>

        <!--correct answer-->
        <div class="form-group">
              {{ Form::label('correct_answer', 'Correct Answer ' ) }}
              {{ Form::text('correct_answer', null, array('class' => 'form-control', 'placeholder' => 'Put the correct answer here.')) }}
        </div>
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
