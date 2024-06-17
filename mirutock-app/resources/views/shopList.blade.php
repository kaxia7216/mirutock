
<?php
?>
<!DOCTYPE html>
<html lang="ja">
  @include('layouts.head')
  <body>
    @include('layouts.header', ['pageType' => 'shopList'])
    <div class='main-contents'>
        <div class='list-view'>
          <ul>
            @foreach($shopLists as $shopList)
              <li>
                <div class='list-left'>
                  <p>{{$shopList->name}}</p>
                </div>
                <div class='list-right'>
                  <form id="shop-delete" action="/delete/shopList/{{$shopList->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <button class='edit-button' onclick='renewShopListData({{$shopList}})'>
                    <img src="/img/pencil_icon.svg" alt="edit-button">
                  </button>
                  <button onclick="return confirm('{{$shopList->name}}を買い物リストから削除しますか？')" form='shop-delete'>
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
    @include('layouts.footer', ['pageType' => 'shopList'])
    @include('layouts.modal')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @if(app()->environment('local'))
      <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @else
      <script src="{{ secure_asset('js/app.js') }}" type="text/javascript"></script>
    @endif
  </body>
</html>