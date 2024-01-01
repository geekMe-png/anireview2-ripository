@extends('layouts.app')

@section('header-text')
<p class="text-4xl">こちらは<span class="text-red-600">レビュー登録ページ</span>です</p>
@endsection

@section('content')
<div>
    <form action="">
        <div>
            <label for="input_rate">点数</label>
            <div class="star"></div>
        </div>

        <div>
            <label for="input_review_title">タイトル</label>
            <input type="text" id="input_review_title">
        </div>

        <div>
            <label for="input_review_content">レビュー内容</label>
            <textarea name="" id="input_review_content" cols="30" rows="10"></textarea>
        </div>
    </form>
</div>
@endsection