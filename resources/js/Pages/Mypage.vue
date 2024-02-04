<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import SiteLayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import StarRating from 'vue-star-rating';
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
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
    users: {
      type: Array,
    },
    reviews: {
      type: Array,
    },
    reviews_count: {
        type: Number,
    },
    user_id: {
        type: Number,
    },
    user_name: {
        type: String,
    },
    auth: {
        type: Number,
    },
    home_route: {
      type: String,
    },
    user_route: {
      type: String,
    },
});
</script>

<template>
    <SiteLayout v-for="user in users" :user_name="user_name" :home_route="home_route" :user_route="user_route">
        <HeaderLayout>
            <p>こちらは<span class="text-red-600">{{ user.name }}さんのマイページ</span>です</p>
        </HeaderLayout>
        <div class="mx-4 md:mx-20">
            <div class="p-3 md:py-8 text-gray-600 bg-gray-300 rounded-md">
                <p class=""> ユーザー名：{{ user.name }} </p>
                <p class=""> 性別：{{ user.gender.gender }} </p>
                <p class=""> 投稿数：{{ reviews_count }} </p>
                <Link :href="route('profile.edit')" class="relative bottom-6 md:top-1 hover:text-gray-800 float-right">プロフィール設定>></Link>
                <Link :href="route('movie.create', { movie_id:0 })" v-if="auth === 1" class="relative bottom-7 right-3 md:top-0 text-white font-semibold bg-orange-500 border-2 border-orange-600 px-3 py-0 md:px-28 rounded-md hover:border-orange-200 float-right">作品を追加</Link>
            </div>
            <p class="relative py-3 my-8 text-3xl text-white font-bold text-center border-b border-black">レビュー一覧</p>
            <div v-for="review in reviews" class="flex px-3 py-6 border-b border-dashed border-gray-300">
                <Link :href="route('movie', review.movie.id)" class="relative">
                    <img :src="'../' + review.movie.movie_img_path" alt="映せません" class="h-28 md:h-32">
                </Link>
                <div class="relative left-8">
                    <Link :href="route('movie', review.movie.id)" class="">
                        <p class="text-lg font-mono">{{ review.movie.movie_title }}</p>
                    </Link>
                    <Link :href="route('review', { movie_id:review.movie_id, user_id:review.user_id, review:review.id })" id="review_items">
                        <p class="relative top-1 text-md font-mono">{{ review.review_title }}</p>
                    </Link>
                    <div class="flex">
                        <star-rating :rating="review.score" increment="0.1" read-only :show-rating="false" :star-size="20" inactive-color="#778899" class="text-3xl" />
                        <p class="relative top-3">{{ review.score }}</p>
                    </div>
                    <div v-if="user_id === review.user_id" class="relative top-2 float-left">
                        <Link :href="route('review.create', { movie_id:review.movie_id })" class="px-3 py-1 text-white bg-green-500 hover:bg-green-400 rounded-md">編集</Link>
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>