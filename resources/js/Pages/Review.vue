<script setup>
import { createApp, ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import SiteLayout from '@/Layouts/SiteLayout.vue';
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
    reviews: {
        type: Array,
    },
    review_id: {
        type: Number,
    },
    review_average: {
        type: Number,
    },
    review_count: {
        type: Number,
    },
    create_time: {
        type: String,
    },
    user_id: {
        type: Number,
    },
    user_name: {
        type: String,
    },
    home_route: {
      type: String,
    },
    user_route: {
      type: String,
    },
});

const rating = ref(props.review_average);

function submit () {
    const remove = confirm("レビューを削除しますか？");

    if(remove === true) {
        router.delete(route('review.destroy', props.review_id));
    }else{
        router.get(route('review', props.review_id));
    }
}
</script>

<template>
    <SiteLayout v-for="review in reviews" :user_name="user_name" :home_route="home_route" :user_route="user_route">
        <HeaderLayout>
            <p>こちらは<span class="text-red-600"><Link :href="route('mypage', { user_id:user_id })">{{review.user.name}}</Link></span>さんのレビューです</p>
        </HeaderLayout>

        <div class="relative mx-3">
            <div class="space-y-10">
                <div class="relative flex flex-wrap md:justify-center -mx-3 px-3 py-2 bg-gray-300">
                    <Link :href="route('movie', review.movie.id)">
                        <img :src="'../' + review.movie.movie_img_path" alt="映せません" class="static w-28">
                    </Link>
                    <div class="relative left-4">
                        <p class="relative py-3 text-3xl font-bold text-gray-600 hover:text-gray-700"><Link :href="route('movie', review.movie.id)">{{ review.movie.movie_title }}</Link></p>
                        <div class="relative bottom-2 flex items-center">
                            <star-rating :rating="rating" increment="0.1" read-only :show-rating="false" :star-size="38" inactive-color="#778899" class="text-3xl" />
                            <p class="relative top-2 text-4xl pl-1">{{ rating }}</p>
                            <p class="relative top-2 left-2 text-3xl">({{ review_count }})</p>
                        </div>
                    </div>
                </div>
                <div class="p-3 md:mx-20 bg-gray-300 rounded-md space-y-5">
                    <div class="space-y-1">
                        <p class="text-2xl font-bold">{{ review.review_title }}</p>
                        <div class="relative bottom-3 flex">
                            <star-rating :rating="review.score" increment="0.1" read-only :show-rating="false" :star-size="23" inactive-color="#778899" class="text-3xl" />
                            <p class="relative top-[10px] text-xl">{{ review.score }}</p>
                        </div>
                        <p class="">原作：{{ review.original.origin }}</p>
                    </div>
                    <p class="pb-5 font-mono border-b border-black whitespace-pre-wrap">{{ review.review_content }}</p>
                    <p class="text-lg font-bold">ユーザー：<Link :href="route('mypage', review.user_id)"  class="hover:text-gray-700">{{ review.user.name }}</Link></p>
                    <div class="relative bottom-5">
                        <p> {{ create_time }} </p>
                    </div>
                    <div v-if="user_id === review.user_id" class="flex space-x-3">
                        <Link :href="route('review.edit', { movie_id:review.movie_id, review:review.id })" class="px-6 py-2 text-white bg-green-500 hover:bg-green-400 rounded-md">編集</Link>
                        <form @submit.prevent="submit" class="px-6 py-2 text-white bg-slate-600 hover:bg-slate-500 rounded-md">
                            <input type="submit" value="削除">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>