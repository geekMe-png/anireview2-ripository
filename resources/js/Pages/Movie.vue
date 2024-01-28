<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { createApp, ref } from 'vue';
import SiteLayout from "../Layouts/SiteLayout.vue";
import SearchForm from '@/Components/SearchForm.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import StarRating from 'vue-star-rating';

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
    reviews: {
        type: Array,
    },
    auth: {
        type: Number,
    },
});

const rating = ref(3);
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
                        <Link :href="route('review.create', { movie_id:movie.id })">レビューを書く</Link>
                        <Link :href="route('movie.create', { movie_id:movie.id })" v-if="auth === 1">作品を編集</Link>
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
                    <p>{{ movie.year.year }}</p>
                </div>
                <div>
                    <p class="text-3xl text-center">レビュー一覧</p>
                    <div v-for="review in reviews">
                        <Link :href="route('review', { movie_id:review.movie_id, user_id:review.user_id, review_id:review.id })" id="review_items">
                            <p>{{ review.review_title }}</p>
                            <p>{{ review.original.origin }}</p>
                            <p>{{ review.score }}</p>
                            <p class="whitespace-pre-wrap">{{ review.review_content }}</p>
                            <p>{{ review.user.name }}</p>
                          </Link>
                    </div>
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