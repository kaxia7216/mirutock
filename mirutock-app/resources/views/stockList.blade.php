
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
                  <form id="stock-delete" action="/delete/stock/{{$stock->id}}" method="POST"></form>
                  <button class='edit-button' onclick='editStockData({{$stock}})'>
                    <img src="/img/pencil_icon.svg" alt="edit-button">
                  </button>
                  <button onclick="return confirm('{{$stock->name}}を削除しますか？')" form='stock-delete'>
                    <img src="/img/delete_icon.svg" alt="delete-icon">
                  </button>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
        <div class='add-button'>
          <button class='modal-button'>
            +
          </button>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.modal')
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>