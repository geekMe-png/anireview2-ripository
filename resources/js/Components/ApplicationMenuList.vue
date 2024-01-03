<template>
    <ul class="justify-center md:flex md:space-x-11">
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4"><a href="{{ route('login') }}">ログイン</a></li>
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4"><a href="{{ route('register') }}">新規会員登録</a></li>
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4"><a href="{{ route('logout') }}">ログアウト</a></li>
    </ul>
</template>