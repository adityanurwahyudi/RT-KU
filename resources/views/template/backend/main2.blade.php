<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard Kelurahan</title>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/rt1.jpeg')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    @include('template.backend.header_script.header')
    @yield('css')
</head>
<body class="sb-nav-fixed">
    @include('template.backend.navbar.navbar')
    <div id="layoutSidenav">
    @include('template.backend.sidebar.sidebar')
    
    <div id="layoutSidenav_content">
      <main>
        @yield('content')
      </main>
        @include('template.backend.footer.footer')
    </div>
        
  <!--End wrapper-->
  @include('template.backend.footer_script.footer')
  @yield('script')
</body>
</html>