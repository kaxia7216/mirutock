const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const hamburgerMenu = document.querySelector('.hamburger-menu');
const dropdownMenu = document.querySelector('.dropdown-menu');
const modalButton = document.querySelector('.modal-button');
const editModalButton = document.querySelector('.edit-button');
const layer = document.querySelector('.layer');
const modal = document.querySelector('.modal');

let dropdownMenuVisible = false;

if(modalButton){
  //モーダルを開く
  modalButton.addEventListener('click', function() {
    layer.classList.add('active');
    modal.style.transform = 'translateX(-50%) translateY(0)';

    //フォームの内容を追加する処理
    const newCreateModal = document.getElementById('modal__content');
    newCreateModal.innerHTML = `
      <form action="/stock/new" method='POST' class='add-form'>
        <fieldset>
          <input type="hidden" name="_token" value="${csrfToken}">
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
              <option value="cold">冷蔵</option>
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
}

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
  const editModal = document.getElementById('modal__content');
  const limitDate = stock.limit.split('-');
  let htmlString = `
  <form action="/stock/edit/${stock.id}" method='POST' class='add-form'>
    <fieldset>
      <input type="hidden" name="_token" value="${csrfToken}">
      <legend>登録内容の変更</legend>
      <fieldset>
        <label>名前</label>
        <input type="text" name='name' value='${stock.name}'>
      </fieldset>
      <fieldset class='pieces'>
        <label>個数</label>
        <button type='button' class='decrement-button' onclick='decrementPieces()'>
          <img src="/img/left_arrow.svg" alt="left_arrow">
        </button>
        <input type="text" name='piece' value='${stock.piece}' id='piece-number'>
        <button type='button' class='increment-button' onclick='incrementPieces()'>
          <img src="/img/right_arrow.svg" alt="right_arro">
        </button>
      </fieldset>
      <fieldset class='set-unit'>
        <label>単位</label>
        <input type="text" name='unit' value='${stock.unit}'>
      </fieldset>
  `;

  if(stock.type === 'cold'){
    htmlString += `
    <fieldset>
      <label>保存先</label>
      <select class='keep-select' name='select-type'>
        <option value="" hidden>選択</option>
        <option value="cold" selected>冷蔵</option>
        <option value="ice">冷凍</option>
      </select>
    </fieldset>
    `;
  } else {
    htmlString += `
    <fieldset>
      <label>保存先</label>
      <select class='keep-select' name='select-type'>
        <option value="" hidden>選択</option>
        <option value="cold">冷蔵</option>
        <option value="ice" selected>冷凍</option>
      </select>
    </fieldset>
    `;
  }

  htmlString += `
            <label>消費(賞味)期限</label>
            <div class='limit-form'>
              <input type="text" name='limit-year' value='${limitDate[0]}'>
              <span>年</span>
              <input type="text" name='limit-month' value='${limitDate[1]}'>
              <span>月</span>
              <input type="text" name='limit-day' value='${limitDate[2]}'>
              <span>日まで</span>
            </div>
          </fieldset>
        <button class='add-submit' type='submit'>変更</button>
      </fieldset>
    </form>
  `;

  editModal.innerHTML = htmlString;
}

function renewShopListData(shopList){
  layer.classList.add('active');
  modal.style.transform = 'translateX(-50%) translateY(0)';

  const editModal = document.getElementById('modal__content');
  const limitDate = shopList.limit.split('-');
  let htmlString = `
  <form action="/shoplist/renew/${shopList.id}" method='POST' class='add-form'>
    <fieldset>
      <input type="hidden" name="_token" value="${csrfToken}">
      <legend>食材の再追加</legend>
  `;

  if(shopList.type === 'cold'){
    htmlString += `<legend>${shopList.name} : 冷蔵</legend>`;
  } else {
    htmlString += `<legend>${shopList.name} : 冷凍</legend>`;
  }

  htmlString += `
            <fieldset class='pieces'>
              <label>個数</label>
              <button type='button' class='decrement-button' onclick='decrementPieces()'>
                <img src="/img/left_arrow.svg" alt="left_arrow">
              </button>
              <input type="text" name='piece' value='${shopList.piece}' id='piece-number'>
              <button type='button' class='increment-button' onclick='incrementPieces()'>
                <img src="/img/right_arrow.svg" alt="right_arro">
              </button>
            </fieldset>
            <label>消費(賞味)期限</label>
            <div class='limit-form'>
              <input type="text" name='limit-year' value='${limitDate[0]}'>
              <span>年</span>
              <input type="text" name='limit-month' value='${limitDate[1]}'>
              <span>月</span>
              <input type="text" name='limit-day' value='${limitDate[2]}'>
              <span>日まで</span>
            </div>
          </fieldset>
        <button class='add-submit' type='submit'>変更</button>
      </fieldset>
    </form>
  `;

  editModal.innerHTML = htmlString;
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

document.addEventListener('click', function(event) {
  // クリックされた要素がドロップダウンメニュー自体、またはその内部要素である場合は何もしない
  if (event.target.closest('.dropdown-menu')) return;

  // ドロップダウンメニューが表示されている場合は非表示にする
  if (dropdownMenuVisible) {
      dropdownMenu.classList.remove('show');
      dropdownMenuVisible = false;
  }
});

// ハンバーガーメニューをクリックした際の処理
if (hamburgerMenu) {
  hamburgerMenu.addEventListener('click', function(event) {
    // メニューを表示・非表示の切り替え
    dropdownMenu.classList.toggle('show');
    dropdownMenuVisible = !dropdownMenuVisible;

    // クリックイベントの伝播を止める（ドロップダウンメニュー以外のクリックで閉じないようにする）
    event.stopPropagation();
});
}