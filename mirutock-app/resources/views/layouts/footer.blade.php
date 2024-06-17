
<?php
?>
<footer>
  <div class='link-icons'>
    <a href="/shoplist">
      @switch($pageType)
        @case('shopList')
          <img src="/img/shoplist_now.svg" alt="shoplist">
          @break
        @case('cold')
        @case('ice')
        @default
          <img src="/img/shoplist.svg" alt="shoplist">
          @break
      @endswitch
    </a>
    <a href="/stocks">
      @switch($pageType)
        @case('cold')
        @case('ice')
        @case('shopList')
          <img src="/img/fridge_all.svg" alt="fridge_all">
          @break
        @default
          <img src="/img/fridge_all_now.svg" alt="fridge_all">
          @break
      @endswitch
    </a>
    <a href="/cold">
      @switch($pageType)
        @case('cold')
          <img src="/img/fridge_cold_now.svg" alt="fridge_cold">
          @break
        @case('ice')
        @case('shopList')
        @default
          <img src="/img/fridge_cold.svg" alt="fridge_cold">
          @break
      @endswitch
    </a>
    <a href="/ice">
      @switch($pageType)
        @case('ice')
          <img src="/img/fridge_ice_now.svg" alt="fridge_ice">
          @break
        @case('cold')
        @case('shopList')
        @default
        <img src="/img/fridge_ice.svg" alt="fridge_ice">
          @break
      @endswitch
    </a>
  </div>
</footer>