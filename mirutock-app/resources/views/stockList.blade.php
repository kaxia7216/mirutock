<?php
?>
<!DOCTYPE html>
<html lang="ja">
@include('layouts.head')

<body>
    @include('layouts.header', ['pageType' => 'all'])
    <div class='main-contents'>
        <div class='list-view'>
            <ul>
                @foreach ($stocks as $keys => $stock)
                    <li>
                        <div class='list-left'>
                            <p>{{ $stock->name }}</p>
                        </div>
                        <div class='list-center'>
                            @if ($stock->piece < 1)
                                <p>在庫なし</p>
                            @else
                                <p>残り {{ $stock->piece }}</p>
                            @endif
                            @if ($diffDays[$keys] === '消費期限なし')
                                <p>{{ $diffDays[$keys] }}</p>
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
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
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
    @include('layouts.footer', ['pageType' => 'all'])
    @include('layouts.modal')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @if (app()->environment('local'))
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ secure_asset('js/app.js') }}" type="text/javascript"></script>
    @endif
    @if (count($errors) > 0)
        <script>
            let getErrors = @json($errors->all());
            @if (session('edit_mode') && session('edit_mode') == true)
                let oldStock = {
                    id: {{ session('model_id') }},
                    name: "{{ old('name') }}",
                    type: "{{ old('select-type') }}",
                    piece: {{ old('piece') }},
                    limit: "{{ old('limit') }}"
                };
                editStockData(oldStock, getErrors);
            @else
                addStockNewData(getErrors);
            @endif
        </script>
    @endif
</body>

</html>
