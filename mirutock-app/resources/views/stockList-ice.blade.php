
<?php
?>
<!DOCTYPE html>
<html lang="ja">
  @include('layouts.head')
  <body>
    @include('layouts.header')
    <div class='main-contents'>
        <div class='list-view'>

        </div>
        <div class='add-button'>
          <button class='modal-button'>
            +
          </button>
        </div>
    </div>
    @include('layouts.footer-stock-ice')
    @include('layouts.modal')
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>