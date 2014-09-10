<!-- wala pa.. usbon pa ang db design-->

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--  <script type="text/javascript">var siteloc = "{{ url('/') }}"</script> -->
    <title>Eskwelahan</title>
    
        <!-- Bootstrap core CSS -->
        {{ HTML::style('bootflat/css/bootstrap.min.css')}}

        <!-- Custom styles for this template -->
        {{ HTML::style('bootflat/css/layout.css')}}
    </head>

    <body>

<!-- navigation na part-->
<nav>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="localhost:8000" style="padding-top:10px;"><h4><strong >Project Eskwelahan</strong></h4></a>
                
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                    @if(Request::is('editProf')) <li class="active">
                        @else <li>
                        @endif<a href="#">Edit Profile</a></li>

                    @if(Auth::user()->role == 'admin')

                    @if(Request::is('users*')) <li class="active">
                        @else <li>
                        @endif <a href="#">Users</a></li> 
                    @endif

                    @if(Request::is('sendMessage*')) 
                    <li class="active">
                        @else <li>

                        @endif <a href="#">Send Message</a></li>     

                    @if(Auth::check() && Auth::user()->role == 'teacher') 
                            <li><a href="#">Post Educational Materials</a></li>
                            <li><a href="tests">Manage Tests</a></li>
                            <li><a href="course">Manage Courses</a></li>
                    @endif

                    @endif
                </ul>   
                <ul class="nav navbar-nav navbar-right" style="padding-top:15px;">

                    @if(Auth::check())
                   
                        {{ HTML::linkRoute('logout', 'Logout') }}
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</nav>
<!--end of navigation-->

        <div class="content">
          <!--
          <div id="header" style="text-align:center; padding-left:0px; padding-top:10px;">
             <h2><strong>Project Eskwelahan</strong></h2>
             <br>
          </div>
        -->
<div class="container">

{{ Form::open([
        "url"        => "tests",
        "autocomplete" => "off",
        "class"        => "form-horizontal"
]) }}

<div class="col-md-6 col-md-offset-3">
<div style="background: rgba(255,255,255,0.2); padding: 5px 20px 10px 20px">
<fieldset>

<!-- Form Name -->
<legend><span style="font-family:sans-serif:  font-size:10px; text-transform:uppercase;">Add New Test</span></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name"><span style="font-family:sans-serif; font-size:13px ">Test Name</span></label>  
  <div class="col-md-8">
  <input id="test_name" name="name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-10 control-label" for="add"></label>
  <div class="col-md-2">
    <button id="add" name="add" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i>     ADD</button>
					 <a  class="btn btn-small btn-danger" href="{{ URL::route('tests.index') }}" id="cancel"><i class="glyphicon glyphicon-remove"></i>    CANCEL</a>

 </div>
</div>

</fieldset>

{{ Form::close() }}
</div>
</div>

</div>
        </div>
    
         <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootflat/js/bootstrap.min.js"></script>
        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>

     
    </body>
</html>

