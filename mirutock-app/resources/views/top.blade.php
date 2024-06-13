
<?php
?>
<!DOCTYPE html>
<html lang="ja">
  @include('layouts.head')
  <body>
    @include('layouts.header-login')
    <div class='top-contents'>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- @if(app()->environment('local'))
      <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @else
      <script src="{{ secure_asset('js/app.js') }}" type="text/javascript"></script>
    @endif --}}
  </body>
</html>