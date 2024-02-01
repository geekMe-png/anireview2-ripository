<script setup>
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import NavigationLayout from './NavigationLayout.vue';
import FormNavigation from '@/Components/FormNavigation.vue';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    user_name: {
        type: String,
    },
    home_route: {
        type: String,
    },
    user_route: {
        type: Number,
    },
})

const search = ref('');

const searchValue = () => {
    Inertia.get(route("search", { search: search.value }));
}

</script>

<template>
    <nav>
        <NavigationLayout :home_route="home_route" :user_name="user_name">
            <div class="relative">
                <form @submit.prevent="searchValue" class="relative right-3 top-2">
                    <input type="search" placeholder="キーワードを入力" class="px-0 py-1 md:px-4 md:py-1 rounded-l-md border-none focus:ring-0" v-model="search">
                    <input type="submit" value="検索" class="px-2 py-1 md:px-5 text-black bg-stone-500 rounded-r-md focus:outline-0">
                </form>
                <p class="relative text-right right-2 top-3">ユーザー：<Link :href="user_route" class="hover:text-white">{{ user_name }}</Link></p>
            </div>
        </NavigationLayout>
    </nav>


    <main>
        <slot />
    </main>

    <div class="my-11 bg-stone-500"></div>
</template>