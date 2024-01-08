<script setup>
import { Head, Link } from '@inertiajs/vue3';

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
    name:String,
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
            score1: 3,
        }
    },
}
</script>

<template>
    <Head title="review/edit" />

    <div id="app">
        <form action="">
            <div>
                <label for="input_review_title">タイトル</label>
                <input type="text" id="input_review_title">
            </div>

            <div>
                <label for="input_review_content">レビュー内容</label>
                <textarea name="" id="input_review_content" cols="30" rows="10"></textarea>
            </div>

            <div>
                <input type="number" v-model="score1" max="5" min="0" step="0.1">
            </div>
        </form>
        <star-rating :rating="score1" :increment="0.1" />
    </div>
</template>