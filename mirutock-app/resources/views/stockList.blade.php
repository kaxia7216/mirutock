
<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/resetCss.css" type="text/css">
  <link rel="stylesheet" href="/css/stylesheet.css" type="text/css">
  <title>Mirutock</title>
</head>
<body>
  <div class='main'>
    <header>
      <div class='header-left'>
        <a href="/">Mirutock</a>
      </div>
      <div class='header-right'>
        <a href="#">logout</a>
      </div>
    </header>
    <div class='main-contents'>
      <div class='list-view'>
        <ul>
          <li>
            <div class='list-left'>
              <p>いちご</p>
            </div>
            <div class='list-center'>
              <p>残り1パック</p>
              <p>あと2日</p>
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
          <li>
            <div class='list-left'>
              <p>きゅうり</p>
            </div>
            <div class='list-center'>
              <p>残り2本</p>
              <p>あと1日</p>
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
          <li>
            <div class='list-left'>
              <p>牛乳</p>
            </div>
            <div class='list-center'>
              <p>1パック</p>
              <p>あと3日</p>
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
          <li>w</li>
          <li>r</li>
        </ul>
      </div>
    </div>
    <footer></footer>
  </div>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>