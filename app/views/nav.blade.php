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
                            <li><a href="{{ URL::to('test') }}">Manage Tests</a></li>
                            <li><a href="{{ URL::to('course') }}">Manage Courses</a></li>
                            <li><a href="{{ URL::to('homeworks') }}">Manage Homeworks</a></li>
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