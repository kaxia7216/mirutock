
<?php
?>
<header>
        <div class='header-left'>
          <a href="/">Mirutock</a>
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
          <a href="#">logout</a>
        </div>
</header>