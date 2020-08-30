 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <input type="hidden" name="_token" id="csrf_token" value="{{ Session::token() }}" >
                          
    <title>{{ $title ?? '' }} </title>
    
    @include('assets.css') 
    </head>
  <body>
   
        @yield('body') 
    <!---->
 
 
@include('assets.js') 
 

</body>
</html>