<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  @include('partials.link')

  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    @include('partials.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('partials.siderbar')

  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->
    @yield('content')

  <!-- Main Footer -->

  @include('partials.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('partials.script')

@include('partials.slug')

@yield('js')
</body>
</html>
