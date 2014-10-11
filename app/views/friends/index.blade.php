@extends("layout")
@section("content")

		@foreach($friends as $key => $friend)
		<div class='col-md-6'>
		<div class="panel panel-primary">
              <div class="panel-heading">
                <a href="/users/{{$friend->id}}"><h3 class="panel-title">{{$friend->fname . " " . $friend->lname }}</h3></a>
              </div>
              <div class="panel-body">
              	
                
              	
              </div>
    </div>
		</div>
		@endforeach
@stop