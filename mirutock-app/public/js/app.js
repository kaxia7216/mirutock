const modalButton = document.querySelector('.modal-button');
const editModalButton = document.querySelector('.edit-button');
const layer = document.querySelector('.layer');
const modal = document.querySelector('.modal');

//モーダルを開く
modalButton.addEventListener('click', function() {
  layer.classList.add('active');
  modal.style.transform = 'translateX(-50%) translateY(0)';

  //フォームの内容を追加する処理
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