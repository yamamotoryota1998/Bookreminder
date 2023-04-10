@extends('layouts.app')

@section('content')
<div class="wrapper-all" >
    <div class=wrapper-contents>
        @for ($counter = 0; $counter < 10; $counter++)
        <div class="contents">
            <img src="sample.img" class="book-img">
            <h3 class="book-name">本の名前</h5>
            <h5 class="book-artist">著者</h5>
            <p class="book-comment">本のコメント</p>
        </div>
        @endfor     
    </div>
    

</div>
@endsection
