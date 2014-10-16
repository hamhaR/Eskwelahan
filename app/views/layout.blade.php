<!DOCTYPE html>
<html lang="en">
    @include("header")
        <body>
            @include("nav")
            <div class='container'>
                
                <div class='row'>
                    <!-- will be used to show any messages -->
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
                <div class="row">
                    <div class='col-md-2'>
                        @include("sidebar")
                    </div>
                    <div class='col-md-8'>
                        @yield("content")
                    </div>
                    <div class='col-md-2'>
                        @yield("rightsidebar")
                    </div><!--end of right sidebar-->
                </div><!--row-->
            </div><!--container-->
        </body>
    @include("footer")
</html>