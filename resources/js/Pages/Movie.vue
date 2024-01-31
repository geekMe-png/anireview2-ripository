<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { createApp, ref } from 'vue';
import SiteLayout from "../Layouts/SiteLayout.vue";
import SearchForm from '@/Components/SearchForm.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import StarRating from 'vue-star-rating';

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
    movies: {
        type: Array,
    },
    reviews: {
        type: Array,
    },
    auth: {
        type: Number,
    },
    movie_id: {
        type: Number,
    },
    review_average: {
        type: Number,
    },
    review_count: {
        type: Number,
    }
});

const rating = ref(props.review_average);

function submit () {
    const remove = confirm("削除しますか？");

    if(remove === true) {
        router.delete(route('movie.destroy', props.movie_id));
    }else{
        router.get(route('movie', props.movie_id));
    }
}
</script>

<template>
    <Head title="Movie" />

    <v-container id="app" class="" v-for="movie in movies">
        <SiteLayout>
            <HeaderLayout>
                <p>こちらは<span class="text-red-600">『{{ movie.movie_title }}』</span>のページです</p>
            </HeaderLayout>
            <div class="mx-3 md:mx-10">
                <div class="relative flex px-3 py-5 md:px-28 bg-gray-300 rounded-md">
                    <img :src="'../' + movie.movie_img_path" alt="映せません" class="static w-44 flex">
                    <div class="relative left-6 md:left-16">
                        <p class="static text-5xl text-gray-600 font-bold">{{ movie.movie_title }}</p>
                        <div class="relative flex items-center">
                            <star-rating :rating="rating" increment="0.1" read-only :show-rating="false" :star-size="38" inactive-color="#778899" class="text-3xl" />
                            <p class="relative top-2 text-4xl pl-1">{{ rating }}</p>
                            <p class="relative top-2 left-2 text-3xl">({{ review_count }})</p>
                        </div>
                        <div>
                            <Link :href="route('review.create', { movie_id:movie.id })" class="relative top-7 left-1 text-2xl text-white font-semibold bg-orange-500 border-2 border-orange-600 rounded-md px-28 py-1 md:px-64 hover:border-orange-200">レビューを書く</Link>
                        </div>
                        <div class="relative top-12 right-1 flex space-x-4">
                            <Link :href="route('movie.create', { movie_id:movie.id })" v-if="auth === 1" class="relative left-2 text-white font-semibold bg-orange-500 border-2 border-orange-600 rounded-l-md px-12 py-6 md:px-28 hover:border-orange-200">作品を編集</Link>
                            <form @submit.prevent="submit" v-if="auth === 1" class="relative right-2 text-white font-semibold bg-orange-500 border-2 border-orange-600 rounded-r-md px-12 py-6 md:px-28 hover:border-orange-200">
                                <input type="submit" value="作品を削除">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="relative my-8 space-y-10">
                    <div class="static">
                        <p class="text-4xl text-white font-mono">あらすじ</p>
                        <p class=" relative p-3 text-lg font-mono rounded-md whitespace-pre-wrap">{{ movie.about }}</p>
                    </div>
                    <div class="relative">
                        <p class="text-4xl text-white font-mono">スタッフ</p>
                        <div class="relative top-4 text-lg font-mono">
                            <p>原作者：{{ movie.auther }}</p>
                            <p>監督：{{ movie.directer }}</p>
                            <p>シリーズ構成・脚本：{{ movie.screenwriter }}</p>
                            <p>キャラクターデザイン：{{ movie.caracterdesign }}</p>
                            <p>音楽：{{ movie.music }}</p>
                            <p>制作会社：{{ movie.company }}</p>
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-4xl text-white font-mono">キャスト</p>
                        <p class="relative top-4 text-lg font-mono whitespace-pre-wrap">{{ movie.cast }}</p>
                    </div>
                    <div class="relative">
                        <p class="text-4xl text-white font-mono">年代</p>
                        <p class="relative top-4 text-xl font-mono">{{ movie.year.year }}</p>
                    </div>
                </div>
            </div>
            <div class="relative top-8 mx-3">
                <p class="text-4xl text-center text-white font-mono">レビュー一覧</p>
                <div class="p-3 my-4 bg-gray-300 overflow-y-scroll h-64 rounded-lg">
                    <div v-for="review in reviews" class="py-5 font-mono border-b border-dashed border-gray-500">
                        <p>ユーザー：<Link :href="route('mypage', { user_id:review.user_id })">{{ review.user.name }}</Link></p>
                        <div class="flex items-center space-x-2">
                            <star-rating :rating="review.score" increment="0.1" read-only :show-rating="false" :star-size="21" inactive-color="#778899" class="text-3xl" />
                            <p class="relative top-1">{{ review.score }}:{{ review.original.origin }}</p>
                        </div>
                        <Link :href="route('review', { movie_id:review.movie_id, user_id:review.user_id, review:review.id })">
                            <p class="underline">{{ review.review_title }}</p>
                        </Link>
                        <p class="line-clamp-2 overflow-hidden">{{ review.review_content }}</p>
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