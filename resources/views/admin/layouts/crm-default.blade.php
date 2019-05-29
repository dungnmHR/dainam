<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('admin.partials.head')
<link href="{{asset('backend/pages/assets/css/cms.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('backend/pages/assets/css/jquery-ui.css')}}">
@yield('css')
<body>
<main class="main" id="top">
  <div class="content">
  @include('admin.partials.crm-topbar')
  @yield('content')
  </div>
</main>
@include('admin.partials.scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".date-pk" ).datepicker();
  } );
</script>
@yield('js')
</body>

</html>