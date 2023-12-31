@extends('layouts.app')

@section('header-text')
<p class="text-3xl md:text-4xl">こちらは<span class="text-red-600">作品ページ</span>です</p>
@endsection

@section('content')
<div class="container">
    <!-- -->
    <div id="movie-header" class="flex items-center space-x-3">
        <h1 class="text-5xl">$title</h1>
        <a href="#" class="text-xl text-white p-4 bg-stone-500">レビューを書く</a>
        <a href="#" class="text-xl text-white p-4 bg-stone-500">作品を編集</a>
    </div>

    <!-- -->
    <x-rathing>
        <span>3.5</span>
    </x-rathing>

    <!-- -->
    <div class="my-10 space-y-4">
        <div class="">
            <p class="block text-center text-4xl text-white p-3 bg-stone-500">概要</p>

        </div>
        <div class="">
            <p class="block text-center text-4xl text-white p-3 bg-stone-500">スタッフ</p>
        </div>
        <div class="">
            <p class="block text-center text-4xl text-white p-3 bg-stone-500">年代</p>
        </div>
    </div>

    <!-- -->
    <div class="p-10 bg-emerald-900">
        <h1 class="block text-center text-4xl text-white p-3">レビュー一覧</h1>
        <x-review-area>
        </x-review-area>
    </div>
</div>
@endsection