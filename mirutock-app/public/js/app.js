const modalButton = document.querySelector('.modal-button');
const editModalButton = document.querySelector('.edit-button');
const layer = document.querySelector('.layer');
const modal = document.querySelector('.modal');

//モーダルを開く
modalButton.addEventListener('click', function() {
  layer.classList.add('active');
  modal.style.transform = 'translateX(-50%) translateY(0)';

  //フォームの内容を追加する処理
  const newCreateModal = document.getElementById('modal__content');
  newCreateModal.innerHTML = `
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
  `;
});

//モーダルを閉じる
layer.addEventListener('click', function(event) {
  if (event.target === layer || event.target === modal) {
    layer.classList.remove('active');
    modal.style.transform = 'translateX(-50%) translateY(100%)';
  }
});

//編集時のモーダル表示
function editStockData(stock){
  layer.classList.add('active');
  modal.style.transform = 'translateX(-50%) translateY(0)';

  //フォームの内容を追加する処理
}

//個数入力の矢印ボタン
function incrementPieces() {
  const piecesInput = document.getElementById('piece-number');
  const valueNow = parseInt(piecesInput.value);
  piecesInput.value = valueNow + 1;
}

function decrementPieces() {
  const piecesInput = document.getElementById('piece-number');
  const valueNow = parseInt(piecesInput.value);
  piecesInput.value = valueNow - 1;
}