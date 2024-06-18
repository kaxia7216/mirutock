
<?php
?>
<!DOCTYPE html>
<html lang="ja">
  @include('layouts.head')
  <body>
    @include('layouts.header-login')
    <div class='top-contents'>
      <div class="head-message">
        <div class="head-img"></div>
        <div class="overlay-text">
          <p>「あ、あれ買っとくの忘れてた…」</p>
          <p>そんなあなたのために、ストレスフリーな食材管理を実現します。</p>
        </div>
      </div>
      <div class="product-discription">
        <h2>「ミルトック」とは？</h2>
        <p>「ミルトック」は食材管理をシンプルにするアプリです。</p>
        <p>買い物リストも自動で作成してくれるので、余計な買い物を減らす事ができます。忙しい方にも日常に便利な食材管理アプリです。</p>
      </div>
      <div class="features">
        <div class="section">
          {{-- <img src="/img/fridge_img.png" alt="fridge_img"> --}}
          <p>何も難しいことはありません。</p>
          <p>今ある食材は食材リストに登録するだけ。</p>
        </div>
        <div class="section">
          {{-- <img src="/img/fridge_img.png" alt="fridge_img"> --}}
          <p>期限が近い、残り数が少ない食材は自動的に買い物リストに登録されます。</p>
        </div>
        <div class="section">
          {{-- <img src="/img/fridge_img.png" alt="fridge_img"> --}}
          <p>買い物リストにある食材を購入したら、食材リストを更新しましょう。</p>
        </div>
      </div>
      <div class="start-link">
        <p>さあ、今すぐ始めてみましょう！</p>
        <a href="/stocks">ミルトックを使ってみる</a>
      </div>
    </div>
    {{-- @include('layouts.footer-login') --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @if(app()->environment('local'))
      <script src="{{ asset('js/top-page.js') }}" type="text/javascript"></script>
    @else
      <script src="{{ secure_asset('js/top-page.js') }}" type="text/javascript"></script>
    @endif
  </body>
</html>