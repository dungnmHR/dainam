<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('admin.partials.head')
@yield('css')
<body>
  <main class="main" id="top">
    <div class="container-fluid">
      @include('admin.partials.navbar')
      <div class="content">
        @include('admin.partials.topbar')
        @yield('content') 
        
      </div>
    </div>
  </main>
  @include('admin.partials.scripts')
  @include('admin.partials.modal-import')
  @yield('js')
</body>
</html>