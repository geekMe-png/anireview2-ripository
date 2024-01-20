<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { createApp } from 'vue'
import SiteLayout from "../Layouts/SiteLayout.vue";
import SearchForm from '@/Components/SearchForm.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    movies: {
        type: Array,
    },
});
</script>

<script>
import StarRating from 'vue-star-rating'

export default {
    name: 'star-rating',
    components: {
        StarRating
    },
    data() {
        return {
            rating: 3,
        }
    },
}
</script>

<template>
    <Head title="Movie" />

    <v-container id="app" class="relative" v-for="movie in movies">
        <SiteLayout>
            <HeaderLayout>
                <p>こちらは<span class="text-red-600">{{ movie.movie_title }}</span>のページです</p>
            </HeaderLayout>
            <div class="">
                <div class="flex left-11">
                    <img :src="'../' + movie.movie_img_path" alt="映せません" class="w-44 flex">
                    <div>
                        <p class="text-5xl flex">{{ movie.movie_title }}</p>
                        <star-rating :rating="rating" increment="0.1" read-only class="text-3xl" />
                        <a href="#">レビューを書く</a>
                        <a href="#">作品を編集</a>
                    </div>
                </div>
                <div class="mt-8">
                    <p>概要</p>
                    <p class="whitespace-pre-wrap">{{ movie.about }}</p>
                </div>
                <div class="mt-8">
                    <p>スタッフ</p>
                    <p>原作者：{{ movie.auther }}</p>
                    <p>監督：{{ movie.directer }}</p>
                    <p>シリーズ構成・脚本：{{ movie.screenwriter }}</p>
                    <p>キャラクターデザイン：{{ movie.caracterdesign }}</p>
                    <p>音楽：{{ movie.music }}</p>
                    <p>制作会社：{{ movie.company }}</p>
                </div>
                <div class="mt-8">
                    <p>キャスト</p>
                    <p class="whitespace-pre-wrap">{{ movie.cast }}</p>
                </div>
                <div class="mt-8">
                    <p>年代</p>
                    <p>{{ movie.year_id }}</p>
                </div>
                <div>
                    <p class="text-3xl text-center">レビュー一覧</p>
                </div>
            </div>
        </SiteLayout>
    </v-container>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>