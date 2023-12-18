@extends('layouts.app')

    @section('text')
    <div class="book-img">
        <p class="text-xl md:text-4xl">
            アニメレビューサイトにようこそ！<br>
            こちらは<span class="text-red-500">トップページ</span>です。<br>
        </p>
    </div>
    @endsection


@section('content')
    <div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div>
            <form action="" class="flex justify-center">
                <x-searchform />
            </form>
        </div>
        <div>

        </div>
    </div>
@endsection
