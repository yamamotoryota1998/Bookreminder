@extends('layouts.app')

@section('content')
<div class="wrapper-all">
    <div class="wrapper-contents">
        <h1>検索結果</h1>
        <div class="contents-result">
            @foreach ($json_decode['items'] as $item)
                <div class="content-result">
                    {{ $item['volumeInfo']['title'] }}
                    @if (isset($item['volumeInfo']['authors']))
                        {{ $item['volumeInfo']['authors'][0] }}
                    @else
                        該当著者なし
                    @endif
                    @if (isset($item['volumeInfo']['imageLinks']['thumbnail']))
                        <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" alt="{{ $item['volumeInfo']['title'] }}の画像">
                    @else
                        該当画像なし
                    @endif
                </div>
                <form action="regist" method="post">
                    @csrf
                    <input  type="submit" value="登録" >
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection