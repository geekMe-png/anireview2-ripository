<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import { Link } from '@inertiajs/vue3';

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
    word: {
        type: String,
    },
    search_results: {
        type: Array,
    },
    search_count: {
        type: Number,
    },
    review_score: {
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
})

console.log(props.word.title);
</script>

<template>
    <SiteLayout :user_name=user_name :home_route="home_route" :user_route="user_route" >
        <HeaderLayout>
            <p class=""><span class="text-red-600">「{{ word }}」</span>の検索結果は<span class="text-red-600">{{ search_count }}件</span>です</p>
        </HeaderLayout>
        <div v-for="search_result in search_results" class="py-5">
            <Link :href="route('movie', search_result.id)" class="relative flex bg-gray-300 rounded-md px-5 py-7 mx-3 overflow-hidden md:px-11 md:mx-32">
                <img :src="search_result.movie_img_path" alt="映せません" class="static w-28 h-32 md:w-48 md:h-72">
                <div class="relative left-5 md:left-11">
                    <p class="relative top-2 md:top-3 text-3xl md:text-4xl text-gray-600 font-bold">{{ search_result.movie_title }}</p>
                    <div class="relative top-4 mr-7">
                        <p class="text-gray-600 font-medium">あらすじ</p>
                        <p class="line-clamp-2 md:line-clamp-3 overflow-hidden text-gray-500">{{ search_result.about }}</p>
                    </div>
                    <div class="relative top-5 md:top-7">
                        <div class="flex space-x-2 md:space-x-16">
                            <div>
                                <p class="text-gray-600 font-medium">原作</p>
                                <p class="text-gray-500"> {{ search_result.auther }} </p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-medium">監督</p>
                                <p class="text-gray-500"> {{ search_result.directer }} </p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-medium">制作会社</p>
                                <p class="text-gray-500"> {{ search_result.company }} </p>
                            </div>
                        </div>
                        <div class="pt-1">
                            <p class=" text-gray-600font-medium">年代</p>
                            <p class="text-gray-500">{{ search_result.year.year }}</p>
                        </div>
                    </div>
                </div>
            </Link>
        </div>
    </SiteLayout>
</template>