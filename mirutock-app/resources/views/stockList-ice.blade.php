<?php
?>
<!DOCTYPE html>
<html lang="ja">
@include('layouts.head')

<body>
    @include('layouts.header', ['pageType' => 'ice'])
    <div class='main-contents'>
        <div class='list-view'>
            <ul>
                @foreach ($iceStocks as $keys => $stock)
                    <li>
                        <div class='list-left'>
                            <p>{{ $stock->name }}</p>
                        </div>
                        <div class='list-center'>
                            <p>残り {{ $stock->piece }}</p>
                            @if ($diffDays[$keys] === "消費期限なし")
                                <p>{{$diffDays[$keys]}}</p>
                            @elseif ($diffDays[$keys] > 0)
                                <p>あと {{ $diffDays[$keys] }}日</p>
                            @elseif ($diffDays[$keys] < 0)
                                <p>期限切れ</p>
                            @else
                                <p>本日まで</p>
                            @endif
                        </div>
                        <div class='list-right'>
                            <form id="stock-delete-{{ $stock->id }}" action="/delete/stock/{{ $stock->id }}"
                                method="POST"></form>
                            <button class='edit-button' onclick='editStockData({{ $stock }})'>
                                <img src="/img/pencil_icon.svg" alt="edit-button">
                            </button>
                            <button onclick="return confirm('{{ $stock->name }}を在庫リストから削除しますか？')"
                                form='stock-delete-{{ $stock->id }}'>
                                <img src="/img/delete_icon.svg" alt="delete-icon">
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class='add-button'>
            <button class='modal-button' onclick='addStockNewData()'>
                +
            </button>
        </div>
    </div>
    @include('layouts.footer', ['pageType' => 'ice'])
    @include('layouts.modal')
    <script script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @if (app()->environment('local'))
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ secure_asset('js/app.js') }}" type="text/javascript"></script>
    @endif
</body>

</html>
