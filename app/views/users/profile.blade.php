@extends("layout")
@section("content")

<div class="content">
    <div class="container">
        <div class="row">

          <div class="col-md-1">
              <img src="bootflat/img/default_user.jpg" width= "75px" height="auto"class="img-circle">
          </div>

          <div class="col-md-6">
            <span style="font-weight: bold; font-size: 24px;">Welcome {{ Auth::user()->lname }}, {{ Auth::user()->fname }} {{ Auth::user()->mname }} </span>
            <br>
            <i class="glyphicon glyphicon-user"></i>       
            <span style="text-transform:uppercase;">{{ Auth::user()->role }} </span>
            <br>
            <i class="glyphicon glyphicon-envelope"></i>       
            <span style="text-transform:uppercase;">{{ Auth::user()->email }} </span>
            <br>
            <i class="glyphicon glyphicon-home"></i>       
            <span style="text-transform:uppercase;">{{ Auth::user()->address }} </span>
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
