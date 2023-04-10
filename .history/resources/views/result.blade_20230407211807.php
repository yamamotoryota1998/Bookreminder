@extends('layouts.app')

@section('content')
<div class="wrapper-all">
    <div class="wrapper-contents">
        <h1>検索結果</h1>
        <div class="contents-result">
            @foreach ($json_decode['items'] as $item)
                <div class="content-result">
                    @if (isset($item['volumeInfo']['imageLinks']['thumbnail']))
                        <img class="book-img-result" src="{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" alt="{{ $item['volumeInfo']['title'] }}の画像">
                    @else
                        該当画像なし
                    @endif
                    {{ $item['volumeInfo']['title'] }}
                    @if (isset($item['volumeInfo']['authors']))
                        <p class="author-result">{{ $item['volumeInfo']['authors'][0] }}</p>
                    @else
                        該当著者なし
                    @endif
                    
                    <form action="regist" method="post">
                        @csrf
                        <input  type="submit" value="登録" >
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection