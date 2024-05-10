
<?php
?>
<!DOCTYPE html>
<html lang="ja">
  @include('layouts.head')
  <body>
    @include('layouts.header')
    <div class='main-contents'>
        <div class='list-view'>
          <ul>
            @foreach($stocks as $stock)
              <li>
                <div class='list-left'>
                  <p>{{$stock->name}}</p>
                </div>
                <div class='list-center'>
                  <p>残り{{$stock->piece}}{{$stock->unit}}</p>
                  <p>期限 : {{$stock->limit}}</p>
                </div>
                <div class='list-right'>
                  <button>
                    <img src="/img/pencil_icon.svg" alt="edit-button">
                  </button>
                  <button>
                    <img src="/img/delete_icon.svg" alt="delete-icon">
                  </button>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
        <div class='add-button'>
          <a href="#">
            <span>+</span>
          </a>
        </div>
    </div>
    @include('layouts.footer')
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>