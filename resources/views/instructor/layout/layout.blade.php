<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('storage/images/instructor/navebar/favicon.png')}}"/>
    @yield('style')
</head>
<body>
    @isset($sidebare)
        @include('instructor.layout.inc.sidebare')
    @endisset
   
    
    <!-- Start Navebare  -->
    @if (!isset($navebare))
        @include('instructor.layout.inc.navebare') 
    @endif
    
    
    <!-- End Navebare  -->

    @yield('content')
    
    {{-- footer --}}
    @include('instructor.layout.inc.footer')
</body>
</html>