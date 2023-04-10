@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <div class="form-contents">
        <form action="{{ route('result') }}" method="get">
            <input class="book-name" type="text" name="book" value="{{ app('request')->input('book') }}" size="20" required>
            <input type="submit" value="本を検索">
        </form>
    </div>
    <div class="wrapper-contents">
        <div class="contents">
            <img src="/public/img/本棚.jpg" class="book-img">
            <h3 class="book-title">本のタイトル</h3>
            <h5 class="book-author">著者</h5>
            <p class="book-comment">本のコメント</p>
        </div>
    </div>
</div>
@endsection
