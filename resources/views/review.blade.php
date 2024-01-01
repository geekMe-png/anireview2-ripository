@extends('layouts.app')

@section('header-text')
<p class="text-4xl">こちらは<span class="text-red-600">ユーザー名の作品名</span>のレビューです</p>
@endsection

@section('content')
<x-review-area />
@endsection