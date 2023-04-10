@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <form action="result" method="post" class="search-form-006">
        @csrf
        <label>
        <input type="text" name="book" placeholder="本の名前を入力">
        </label>
        <button type="submit" aria-label="検索"></button>
    </form>
    <div class="wrapper-contents">
        <div class="contents">
            <img src="/public/img/本棚.jpg" class="book-img">
            <h3 class="book-name">本の名前</h3>
            <h5 class="book-artist">著者</h5>
            <p class="book-comment">本のコメント</p>
        </div>
    </div>
</div>
@endsection
