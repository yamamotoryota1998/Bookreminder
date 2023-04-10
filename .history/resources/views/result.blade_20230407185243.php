@extends('layouts.app')

@section('content')
<div class="wrapper-all">
    <h1>検索結果</h1>
    <div class="contents-result">
        <div class="content-result">
            {{$json_decode->id}}
        </div>
    </div>
</div>
@endsection