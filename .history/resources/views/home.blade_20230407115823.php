@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <div class=wrapper-contents>
        @foreach($contents as $content)
        <div class="contents">
            <img src="sample.img" class="book-img">
            <h3 class="book-name">本の名前</h5>
            <h5 class="book-artist">著者</h5>
            <p class="book-comment">本のコメント</p>
        </div>
        @endforeach
    </div>
</div>
@endsection