<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  <meta name="author" content="themefisher.com">
  <title>RT-KU</title>
    <link href="{{asset('/sbwarga/images/rt.jpeg')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  @include('template.frontend.header_script.header')
  @yield('css')
</head>
<body>
  @include('template.frontend.navbar.navbar')
  <div class="main-wrapper ">
    @yield('content')
    @include('template.frontend.footer.footer')
  </div>
  @include('template.frontend.footer_script.footer')
  @yield('script')
</body>
</html>