
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
                <p>残り1パック</p>
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
        <div class='add-button'>
          <a href="#">
            <span>+</span>
          </a>
        </div>
    </div>
    @include('layouts.footer')
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  </body>
</html>