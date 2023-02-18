<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.includes.header')

    @include('backend.includes.css')
  </head>

  <body>

    @include('backend.includes.menu')

    @include('backend.includes.topbar')
    
    @include('backend.includes.rightBar')
    
    <div class="br-mainpanel">
      
      @yield('body')

      @include('backend.includes.footer')
    </div>

    @include('backend.includes.script')
    
  </body>
</html>
