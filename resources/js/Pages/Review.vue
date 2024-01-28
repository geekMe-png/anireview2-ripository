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
});

function submit () {
    router.delete(route('review.destroy', props.review_id));
}
</script>

<template>
    <SiteLayout v-for="review in reviews">
        <HeaderLayout>
            <p>こちらは<span class="text-red-600"> {{review.user.name}}</span>さんのレビューです</p>
        </HeaderLayout>

        <v-container>
            <div>
                <Link :href="route('movie', { movie_id:review.movie_id })">
                    <img :src="'../../../' + review.movie.movie_img_path" alt="映せません" class="w-44 flex">
                    <p>{{review.movie.movie_title}}</p>
                </Link>
                <star-rating :rating="review.score" increment="0.1" read-only class="text-3xl" />
                <p>{{ review.review_title }}</p>
                <p>{{ review.original.origin }}</p>
                <p class="whitespace-pre-wrap">{{ review.review_content }}</p>
                <p>{{ review.user.name }}</p>
                <p>{{ review.created_at }}</p>
                <p>{{ review.updated_at }}</p>
            </div>

            <div>
                <form @submit.prevent="submit">
                    <input type="submit" value="削除">
                </form>
            </div>
        </v-container>
    </SiteLayout>
</template>