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
        
        @include("header")
        <div class="content">
            <div class="container">
                @yield("content")
            </div>
        </div>
    
        @include("footer")
     
    </body>
</html>
