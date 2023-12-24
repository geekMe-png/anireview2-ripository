@extends('layouts.app')

@section('header-text')
<p class="text-3xl md:text-4xl">こちらは<span class="text-red-600">トップページ</span>です</p>
@endsection

@section('content')
<div class="container">
    <!-- 作品コンテナ -->
    <h1 class="text-4xl text-center">今期のアニメ</h1>
    <div class="container relative">
        <div class="swiper mySwiperClass w-3/5">
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><a href="#"><img src="{{ asset('assets/images/アンデッドガールマーダーファルス.png') }}" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('assets/images/ゆびさきと恋々.png') }}" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="{{ asset('assets/images/今期のアニメ.png') }}" alt=""></a></div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-button-prev md:left-20"></div>
        <div class="swiper-button-next md:right-20"></div>
        <div class="swiper-pagination !-bottom-11"></div>
    </div>

    <!-- レビューコンテナ -->
    <h1 class="text-4xl text-center">おすすめレビュー</h1>
</div>
@endsection
