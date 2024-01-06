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
    }
}
</script>

<template>
    <Head title="review/edit" />

    <div>
        <form action="">
            <div>
                <label for="input_rate">点数</label>
                <div class="star"></div>
            </div>

            <div>
                <label for="input_review_title">タイトル</label>
                <input type="text" id="input_review_title">
            </div>

            <div>
                <label for="input_review_content">レビュー内容</label>
                <textarea name="" id="input_review_content" cols="30" rows="10"></textarea>
            </div>
        </form>
        <star-rating :increment="0.1" v-model="score"/>
    </div>
</template>