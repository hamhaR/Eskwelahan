<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">var siteloc = "{{ url('/') }}"</script>
    <title>Eskwelahan</title>
    
        <!-- Bootstrap core CSS -->
        {{ HTML::style('bootflat/css/bootstrap.min.css')}}

        <!-- Custom styles for this template -->
        {{ HTML::style('bootflat/css/layout.css')}}
    </head>

    <body>
        <div class="content">
          <div id="header" style="text-align:center; padding-left:0px; padding-top:10px;">
             <h2><strong>Project Eskwelahan</strong></h2>
             <br>
          </div>

            <div class="container">
                 <div id="mainlayout">
                  <div id="loginbox" class="col-md-4">
                  </div>
                  <div class="col-md-4">
                      <div class="panel panel-primary" >
                         
                          <div class="panel-body" >
                              @if ($error = $errors->first("password"))
                              <div id="login-alert" class="alert alert-danger col-sm-12"> 
                                  {{ $error }}
                              </div>
                              @endif

                              {{ Form::open(["url"        => "/login",
                                      "autocomplete" => "off", 'class'=>'form-horizontal']) }}

                              <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  {{ Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'Username']) }}
                              </div>

                              <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
                              </div>

                              <div class="row">
                         
                          
                              <div class="col-md-4 controls">
                                  {{ Form::submit('LOGIN', ['class'=>'btn btn-success'])}}
                                    <br>
                                    <br>
                                  <!--{{ Form::submit('CREATE ACCOUNT', ['class' => 'btn btn-primary']) }}
								-->							  
								<a href="create"> CREATE ACCOUNT!!</a>
							  </div>
                              </div>
                              {{ Form::close() }}
                          </div>
                      </div>
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
