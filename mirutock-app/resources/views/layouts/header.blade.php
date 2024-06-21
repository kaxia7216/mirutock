
<?php
?>
<header>
        <div class='header-left'>
          <a href="/stocks">Mirutock</a>
        </div>
        <div class='header-center'>
          @switch($pageType)
              @case('cold')
                <h1>COLD</h1>
                @break
              @case('ice')
                <h1>ICE</h1>
                @break
              @case('shopList')
                <h1>SHOP LIST</h1>
                @break
              @default
                <h1>ALL</h1>
                @break
          @endswitch
        </div>
        <div class='header-right'>
          <a href="/" class="logout-link">topへ戻る</a>
          <div class="hamburger-menu">
            <img src="/img/menu_icon.svg" alt="">
          </div>
          <div class="dropdown-menu">
              <a href="/">topへ戻る</a>
          </div>
        </div>
</header>