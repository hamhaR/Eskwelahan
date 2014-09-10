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
                            <li><a href="test">Manage Tests</a></li>
                            <li><a href="courses">Manage Courses</a></li>
                            <li><a href="homeworks">Manage Homeworks</a></li>
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
              <!--<div id="greet">
                <h2><strong>Welcome to Eskwelahan!!</strong></h2>
                 <br>
                 <li><span style="display:block;margin: 10px 0px 3px 3px;width: 23px;"><img src='/image/meow.jpg' class="img-circle" width='30px' height='30px' padding-top='20px' /></span>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }}<b class="caret"></b>

                            <li>{{ HTML::linkRoute('profile', 'USERNAME HERE') }}</li>

                            <ul class="dropdown-menu">  -->
                              <!--  {{ HTML::linkRoute('logout', 'Logout') }} -->
                          <!--  </ul>
                    </li> 
                </div>-->

                <!--start-->
                <div class="row">

  <div class="col-md-1">
      <img src="bootflat/img/default_user.jpg" width= "75px" height="auto"class="img-circle">
  </div>

  <div class="col-md-6">
    <span style="font-weight: bold; font-size: 24px;">Welcome {{ Auth::user()->fname }}! </span>
    <br>
    <i class="glyphicon glyphicon-user"></i>       <span style="text-transform:uppercase;">{{ Auth::user()->role }}
  </div>

</div>

                <!--end-->
            </div>
        </div>
    
         <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootflat/js/bootstrap.min.js"></script>
        <script src="../bootflat/js/jquery-1.9.1.min.js"></script>

     
    </body>
</html>
