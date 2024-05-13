
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
              <form action="/stock/new" method='POST' class='add-form'>
                <fieldset>
                  @csrf
                  <legend>食材の登録</legend>
                  <fieldset>
                    <label>名前</label>
                    <input type="text" name='name'>
                  </fieldset>
                  <fieldset class='pieces'>
                    <label>個数</label>
                    <button type='button' class='decrement-button' onclick='decrementPieces()'>
                      <img src="/img/left_arrow.svg" alt="left_arrow">
                    </button>
                    <input type="text" name='piece' value='0' id='piece-number'>
                    <button type='button' class='increment-button' onclick='incrementPieces()'>
                      <img src="/img/right_arrow.svg" alt="right_arro">
                    </button>
                  </fieldset>
                  <fieldset class='set-unit'>
                    <label>単位</label>
                    <input type="text" name='unit'>
                  </fieldset>
                  <fieldset>
                    <label>保存先</label>
                    <select class='keep-select' name='select-type'>
                      <option value="" hidden>選択</option>
                      <option value="cool">冷蔵</option>
                      <option value="ice">冷凍</option>
                    </select>
                  </fieldset>
                  <fieldset>
                    <label>消費(賞味)期限</label>
                    <div class='limit-form'>
                      <input type="text" name='limit-year'>
                      <span>年</span>
                      <input type="text" name='limit-month'>
                      <span>月</span>
                      <input type="text" name='limit-day'>
                      <span>日まで</span>
                    </div>
                  </fieldset>
                  <button class='add-submit' type='submit'>追加</button>
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