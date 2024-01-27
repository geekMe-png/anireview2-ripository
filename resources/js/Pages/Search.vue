<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';

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
    review_score: {
        type: Number,
    },
})

console.log(props.word.title);
</script>

<template>
    <SiteLayout>
        <HeaderLayout>
            <p>こちらは<span class="text-red-600">{{ word }}</span>の検索結果です</p>
        </HeaderLayout>
        <div v-for="search_result in search_results">
            <img :src="search_result.movie_img_path" alt="映せません">
            <p>{{ search_result.movie_title }}</p>
            <p>{{ search_result.about }}</p>
            <p>{{ search_result.year.year }}</p>
            <p>{{ search_result.score_average }}</p>
            <p>{{ review_score }}</p>
        </div>
    </SiteLayout>
</template>