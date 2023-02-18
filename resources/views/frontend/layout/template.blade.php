<!DOCTYPE html>
<html lang="en">
  <head>
    @include('frontend.includes.header')
    @include('frontend.includes.css')
  </head>
  <body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
      @include('frontend.includes.topbar')
      @include('frontend.includes.menu')
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">
        <div class="row single-product">
          @include('frontend.includes.sidebar')
          
          @yield('body')
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </div>
    @include('frontend.includes.footer')
    @include('frontend.includes.scripts')
  </body>
</html>