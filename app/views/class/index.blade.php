@extends("layout")
@section("content")

    <div class='row'>
@foreach($sections as $key => $section)
  @foreach($section->courses as $course)
    <!-- panel -->
    <div class="col-md-6">

            <div class="panel panel-primary">
              <div class="panel-heading">
                <a class="panel-title" href="{{ URL::route('classes.show',array('id' => $section->section_id,'course_id' => $course->id))}}"><strong>{{$course->course_title}}</strong></a> 
                <h2 class="panel-title">{{$section->section_name}}</h2>     


              </div>
              <div class="panel-body">
               Prof. {{$section->teacher->fname}}
                {{$section->teacher->lname}}
                <br>
                {{$key}}
                <br>
                {{$sections[$key]->section_id}}
                
                <br><br><br><br>
                @if(Auth::user()->role == 'teacher')
               <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$key}}">
                 <span class="glyphicon glyphicon-trash"></span>
               </button>
               <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$key}}">
                 <span class="glyphicon glyphicon-pencil"></span>
               </button>
                @endif
                
              </div>
            </div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete</p>
               

      </div>
      <div class="modal-footer">

         {{ Form::open(array('method' => 'DELETE', 'route' => array('classes.destroy',$section->section_id))) }}
         {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         {{ Form::close() }}
         
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- edit modal-->
<div class="modal fade" id="editModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Section</h4>
      </div>
      <div class="modal-body">
        {{Form::model($section,array('route' => array('classes.update', $section->section_id), 'method' => 'PUT'))}}

          <div class="form-group">
            {{ Form::label('section_name', 'Section') }}
            {{ Form::text('section_name', Input::old('section_name'), array('class' => 'form-control', 'placeholder' => $section->section_name)) }}
          </div>

      </div>
      <div class="modal-footer">
        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>

  </div>  <!-- end of panel -->

  @endforeach
@endforeach
</div>
  <div class='row'>
    <?php echo $sections->links(); ?>
  </div>
@stop

@section("rightsidebar")
  <div class='col-md-2'>
    @if(Auth::user()->role == 'teacher')
     <div class="row"> 
      <div class="col-md-12">
    <!-- Button trigger modal -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      + Add Class
    </button>
    </div>
    </div>
    @endif
  </div>
  @stop
</div> <!--end of row-->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Create a class</h4>
      </div>
      <div class="modal-body">
      
      {{Form::open(array('url' => 'classes'))}}
          <div class="form-group">
           {{ Form::label('course_title', 'Course') }}
            <select class="form-control" id="course_title" name="course_title">
              @foreach(Course::all() as $course)
                
                <option>
                  {{$course->course_title}}
                </option>
              
              @endforeach
            </select>
          </div>

          <div class="form-group">
            {{ Form::label('section_name', 'Section') }}
            {{ Form::text('section_name', Input::old('section_name'), array('class' => 'form-control')) }}
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

@include("footer")