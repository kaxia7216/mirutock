const modalButton = document.querySelector('.modal-button');
const editModalButton = document.querySelector('.edit-button');
const layer = document.querySelector('.layer');
const modal = document.querySelector('.modal');

//モーダルを開く
modalButton.addEventListener('click', function() {
  layer.classList.add('active');
  modal.style.transform = 'translateX(-50%) translateY(0)';
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
  console.log(stock);
  layer.classList.add('active');
  modal.style.transform = 'translateX(-50%) translateY(0)';
}