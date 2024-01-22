<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
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
    users: {
      type: Array,
    },
    reviews: {
      type: Array,
    },
    reviews_count: {
        type: Number,
    },
});
</script>

<template>
    <SiteLayout v-for="user in users">
        <HeaderLayout>
            <p>こちらは<span class="text-red-600">{{ user.name }}さんのマイページ</span>です</p>
        </HeaderLayout>
        <div>
            <p> ユーザー名：{{ user.name }} </p>
            <p> 性別：{{ user.gender.gender }} </p>
            <p> {{ reviews_count }} </p>
        </div>
        <div id="review_items" v-for="review in reviews" class="my-10">
            <p>{{ review.review_title }}</p>
            <p>{{ review.movie.movie_title }} </p>
            <p>{{ review.original.origin }}</p>
            <p>{{ review.score }}</p>
            <p class="whitespace-pre-wrap">{{ review.review_content }}</p>
            <p>{{ review.user.name }}</p>
            <p>{{ review.created_at }}</p>
            <p>{{ review.updated_at }}</p>
        </div>
    </SiteLayout>
</template>