@extends('layouts.app')

@section('content')
<div class="wrapper-all">
    <div class="form-contents">
        <form action="{{ route('result') }}" method="get">
            <input class="book-name" type="text" name="book" value="{{ app('request')->input('book') }}" size="20" required>
            <input type="submit" value="本を検索">
        </form>
    </div>
    <div class="pagination">
    @if($books->currentPage() > 1)
        <a href="{{ $books->previousPageUrl() }}">前へ</a>
    @endif
    <span>ページ {{ $books->currentPage() }}</span>
    @if($books->hasMorePages())
        <a href="{{ $books->nextPageUrl() }}">次へ</a>
    @endif
</div>
    <div class="wrapper-contents">
        @foreach ($books as $book)
            <div class="contents">
                @if (isset($book->thumbnail))
                    <img src="{{ $book->thumbnail }}" class="book-img" alt="{{ $book->title }}の画像">
                @else
                    <div class="noimg">
                        <h3 class="noimg-text">該当画像なし<h3>
                    </div>
                @endif
                <h3 class="book-title">{{ $book->title }}</h3>
                @if (isset($book->author))
                    <h5 class="book-author">{{ $book->author }}</h5>
                @else
                    <h5 class="noauthor">該当著者なし</h5>
                @endif
                <form action="{{ route('delete', ['book_id' => $book->book_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
                <!-- @if (isset($book->comment))
                    <p class="book-comment">{{ $book->comment }}</p>
                @else
                    <p class="nocomment">コメントなし</p>
                @endif -->
            </div>
        @endforeach
    </div>
</div>
@endsection
