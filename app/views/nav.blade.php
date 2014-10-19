<nav>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
               <a href="localhost:8000" style="padding-top:10px;"><h5>Eskwelahan</h5></a>
            </div>
            <p class="navbar-text" > {{Auth::user()->fname . " " . Auth::user()->lname}}</p>
            <div class="navbar-collapse collapse">
 
                <ul class="nav navbar-nav navbar-right" style="padding-top:15px;">

                    @if(Auth::check())
                   
                        {{ HTML::linkRoute('logout', 'Logout') }}
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</nav>