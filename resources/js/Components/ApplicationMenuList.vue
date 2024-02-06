<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { useRoute, useRouter } from 'vue-router';

const props = defineProps({
    user_name: {
        type: String,
    },
})

const load = useRouter();

function submit() {
    const onLogout = confirm('ログアウトしますか？');

    if(onLogout === true) {
        router.delete(route('logout'));
    }else{
        load.push('/');
    }
}
</script>

<template>
    <ul class="text-2xl md:text-3xl text-white font-medium bg-stone-500 justify-center md:flex">
        <li v-if="user_name == ''" class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4 flex-1 text-center"><Link :href="route('login')">ログイン</Link></li>
        <li v-if="user_name != ''" class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4 flex-1 text-center"><Link @click="submit">ログアウト</Link></li>
        <li class="border-b-2 border-stone-500 hover:border-b-2 hover:border-white py-4 flex-1 text-center"><Link :href="route('register')">新規会員登録</Link></li>
    </ul>
</template>