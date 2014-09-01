@extends("layout")
@section("content")

@if(Auth::user() != null)
	@if(Auth::user()->role == 'teacher')
        <a class="btn btn-small btn-danger" href="{{ URL::route('tests.create') }}"><i class="glyphicon glyphicon-plus"></i>ADD ITEM</a>
	@endif
<br>


<div id="list">
</div>
	
@endif


<script type="text/javascript">var role = "{{ Auth::user()->role }}"</script>

@stop
