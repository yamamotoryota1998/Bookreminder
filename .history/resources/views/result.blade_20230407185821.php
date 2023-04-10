@extends('layouts.app')

@section('content')
<div class="wrapper-all">
    <h1>検索結果</h1>
    <div class="contents-result">
        <div class="content-result">
            @foreach ($json_decode['items'] as $item)
            {{ $item['volumeInfo']['title']}}
            @endforeach
        </div>
    </div>
</div>
@endsection