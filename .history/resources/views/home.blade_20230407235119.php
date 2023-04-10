@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <div class="form-contents">
        <form action="result" method="post">
            @csrf
            <input class="book-name" type="text" name="book" size="20">
            <input  type="submit" value="本を検索" >
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
