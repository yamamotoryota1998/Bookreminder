@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <div class="wrapper-contents">
        <form action="result" method="post" class="find-form">
        @csrf
        <input type="text" name="book" size="20"/>
        <input type="submit" value="Submit"/>
        </form>
        <div class="contents">
            <img src="/public/img/本棚.jpg" class="book-img">
            <h3 class="book-name">本の名前</h3>
            <h5 class="book-artist">著者</h5>
            <p class="book-comment">本のコメント</p>
        </div>
    </div>
    <a href="#" class="regist-button">登録</a>
</div>
@endsection
