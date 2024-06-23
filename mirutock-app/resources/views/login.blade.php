<?php
?>
<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    @include('layouts.header-login')
    <main class="login-link">
        <div class="links-container">
            <a class="google-link" href='#'>
                <img src="/img/google_icon.svg" alt="Google icon"> <span>Googleで続行</span>
            </a>
            <p class="return-link">
                <a href="#">
                    topページに戻る
                </a>
            </p>
        </div>
    </main>
    @include('layouts.footer-login')
</body>

</html>
