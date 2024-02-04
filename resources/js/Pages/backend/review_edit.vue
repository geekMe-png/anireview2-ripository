<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';
import { Inertia } from "@inertiajs/inertia";
import SiteLayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import StarRating from 'vue-star-rating'

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
    origins: {
        type: Array,
    },
    movies: {
        type: Array,
    },
    user_id: {
        type: Number,
    },
    user_name: {
        type: String,
    },
    movie_id: {
        type: Number,
    },
    home_route: {
      type: String,
    },
    user_route: {
      type: String,
    },
});

const rating = ref(3);

function setRating(value) {
    rating.value = value;
};

function getRating(value) {
    rating.value = value;
};

const form = reactive({
    original_id: null,
    score: rating,
    review_title: null,
    review_content: null,
    movie_id: props.movie_id,
})

function submit () {
    router.post('review.store', form)
}
</script>

<template>
    <Head title="review/edit" />

    <SiteLayout v-for="movie in movies" :user_name="user_name" :home_route="home_route" :user_route="user_route">
        <HeaderLayout>
            <p>こちらは<br><span class="text-red-600">『{{ movie.movie_title }}』</span><br>のレビューページです！</p>
        </HeaderLayout>
        <div class="mx-3 space-y-10">
            <div class="relative flex flex-wrap -mx-3 px-3 py-2 bg-gray-300">
                <Link :href="route('movie', movie.id)">
                    <img :src="'../' + movie.movie_img_path" alt="映せません" class="static w-28">
                </Link>
                <div class="relative left-4">
                    <p class="relative py-3 text-3xl font-bold text-gray-600">{{ movie.movie_title }}</p>
                    <div class="ralative wt-3 font-mono text-gray-500">
                        <p class="">原作：{{ movie.auther }}</p>
                        <p>監督：{{ movie.directer }}</p>
                        <p>シリーズ構成・脚本：{{ movie.screenwriter }}</p>
                        <p>制作会社：{{ movie.company }}</p>
                    </div>
                </div>
                <p class="relative md:top-[104px] md:left-6 my-1 font-mono text-gray-500">キャスト：<br>{{ movie.cast }}</p>
            </div>
            <form @submit.prevent="submit" class="relative p-3 space-y-16">
                <div class="relative p-3 -mx-6 text-center bg-gray-300 border-2">
                    <label for="score" class="relative text-2xl md:text-3xl font-bold text-gray-600">点数</label>
                    <div class="flex justify-center my-4 space-x-2">
                        <star-rating 
                        :rating="rating" 
                        :increment="0.1" 
                        @update:rating="getRating" 
                        @hover:rating="setRating"  
                        :show-rating="false" 
                        inactive-color="#778899"
                        class="" />
                        <input type="number" id="score" name="score" v-model="rating" max="5" min="0" step="0.1" class="relative top-2 h-11 text-xl text-gray-800 bg-gray-400 border-none rounded-md focus:ring-0">
                    </div>
                </div>

                <div class="p-2 md:mx-24 text-center border-2 border-gray-400 rounded-md divide-y-2 divide-gray-400 divide-dashed space-y-8 md:space-y-12">
                    <div class="space-y-5">
                        <label for="review_title" class="relative top-3 text-2xl md:text-3xl font-bold">タイトル</label><br>
                        <input type="text" id="review_title" name="review_title" v-model="form.review_title" class="w-4/5 text-2xl rounded-md border-none focus:ring-0">
                    </div>
        
                    <div class="space-y-5">
                        <label for="review_content" class="relative top-3 text-2xl md:text-3xl font-bold">レビュー内容</label><br>
                        <textarea id="review_content" name="review_content" cols="30" rows="10" v-model="form.review_content" class="w-4/5 h-96 text-xl rounded-md border-none focus:ring-0"></textarea>
                    </div>
    
                    <div class="space-y-5">
                        <label for="original_id" class="relative top-3 text-2xl md:text-3xl font-bold">原作</label><br>
                        <select id="original_id" name="original_id" v-model="form.original_id" class="relative bottom-1 rounded-md border-none focus:ring-0">
                            <option v-for="origin in origins" :value="origin.id">{{ origin.origin }}</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <PrimaryButton>
                        <input type="submit" value="レビュー投稿" class="w-56 md:h-7 md:text-xl">
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </SiteLayout>
</template>