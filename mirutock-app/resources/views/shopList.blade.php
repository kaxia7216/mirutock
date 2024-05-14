
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
            @foreach($shopLists as $keys => $shopList)
              <li>
                <div class='list-left'>
                  <p>{{$shopList->name}}</p>
                </div>
                <div class='list-right'>
                  <form id="stock-delete" action="/delete/stock/{{$shopList->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <button class='edit-button' onclick='editStockData({{$shopList}})'>
                    <img src="/img/pencil_icon.svg" alt="edit-button">
                  </button>
                  <button onclick="return confirm('{{$shopList->name}}を削除しますか？')" form='stock-delete'>
                    <img src="/img/delete_icon.svg" alt="delete-icon">
                  </button>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
        <div class='reload-button'>
          <form id='reload-button' method='POST' action="/reload">
            @csrf
          </form>
          <button class='reload-button-img' form='reload-button'>
            <img src="/img/reload_icon.svg" alt="">
          </button>
        </div>
    </div>
    @include('layouts.footer-shoplist')
    @include('layouts.modal')
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>