@include('layouts.flash')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Yuriza - Website Artikel</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets/frontend/img/core-img/iconnya.ico') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/style.css')}}">
    @yield('css')
</head>

<body>	
    <!-- #header -->
    @include('layouts.frontend.nav')
    {{-- #endheader --}}
    
    @yield('content')

    <!-- start footer Area -->		
    @include('layouts.frontend.footer')
    <!-- End footer Area -->	

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ ('assets/frontend/js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ ('assets/frontend/js/json.js') }}"></script>
<!-- Popper js -->
<script src="{{ ('assets/frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ ('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ ('assets/frontend/js/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ ('assets/frontend/js/active.js') }}"></script>

@yield('js')

</body>

</html>