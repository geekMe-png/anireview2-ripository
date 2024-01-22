<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <ul class="text-3xl bg-stone-500 justify-center md:flex md:space-x-32">
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4 flex-1 text-center"><Link :href="route('login')">ログイン</Link></li>
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4 flex-1 text-center"><Link :href="route('register')">新規会員登録</Link></li>
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4 flex-1 text-center"><Link :href="route('logout')" method="post">ログアウト</Link></li>
    </ul>
</template>