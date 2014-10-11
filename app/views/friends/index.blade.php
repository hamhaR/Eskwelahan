@extends("layout")
@section("content")
  <h5>Friends</h5>
    <div class="list">
		@foreach($friends as $key => $friend)
                <a href="/users/{{$friend->id}}" class="list-group-item">{{$friend->fname . " " . $friend->lname }}</a>
      
		@endforeach
  </div>
@stop

@section("rightsidebar")
<form class="navbar-form" role="search">
                        <div class="form-search search-only">
                          <i class="search-icon glyphicon glyphicon-search"></i>
                          <input type="text" class="form-control search-query">
                        </div>
                      </form>
@stop