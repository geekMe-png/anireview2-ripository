@extends('layouts.app')

@section('header-text')
<p class="text-4xl">こちらは<span class="text-red-600">$ユーザー名さんのマイページ</span>です</p>
@endsection

@section('content')
<div class="container">
    <div>
        <div class="flex">
            <h1>$username</h1>
            <h1>性別:$男</h1>
            <h1>投稿数：$2</h1>
            <!-- ルートユーザーのみ -->
            <a href="#">作品を登録</a>
        </div>
        <p>$よろしくお願いします。</p>
    </div>
    <div class="w-3/5">
        <x-review-area />
    </div>
</div>
@endsection