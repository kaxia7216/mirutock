
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
    <div class="layer editor-modal">
      <div class="modal">
        <div class="modal__inner">
          <div class="modal__contents">
            <div class="modal__content">
              <form action="" method='POST' class='add-form'>
                <fieldset>
                  <legend>食材の登録</legend>
                  <fieldset>
                    <label for="">名前</label>
                    <input type="text" name='name'>
                  </fieldset>
                  <fieldset>
                    <label for="">個数</label>
                    <input type="text" name='piece'>
                  </fieldset>
                  <fieldset>
                    <label for="">保存先</label>
                    <input type="text" name='type'>
                  </fieldset>
                  <fieldset>
                    <label for="">消費(賞味)期限</label>
                    <div class='limit-form'>
                      <input type="text" name='limit-year'>
                      <span>年</span>
                      <input type="text" name='limit-month'>
                      <span>月</span>
                      <input type="text" name='limit-day'>
                      <span>日まで</span>
                    </div>
                  </fieldset>
                  <button type='submit'>追加</button>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>