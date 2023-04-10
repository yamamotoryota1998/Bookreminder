@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <form class="find-form" action="result" method="post" >
        @csrf
        <input class="text" type="text" name="book" size="20">
        <a href="/result" class="btn_04">登録</a>
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
