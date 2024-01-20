<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { reactive, ref } from 'vue'
import { Inertia } from "@inertiajs/inertia";
import Sitelayout from '@/Layouts/SiteLayout.vue';
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

    <Sitelayout v-for="movie in movies">
        <HeaderLayout>
            <p>こちらは<span class="text-red-600">{{ movie.movie_title }}のレビューページ</span>です({{ user_name }})</p>
        </HeaderLayout>
        <div id="app">
            <div class="flex">
                <img :src="'../' + movie.movie_img_path" alt="映せません" class="w-56">
                <p>{{ movie.movie_title }}</p>
            </div>
            <form @submit.prevent="submit">
                <div>
                    <p>原作を読んでいるか：</p>
                    <select id="original_id" name="original_id" v-model="form.original_id">
                        <option v-for="origin in origins" :value="origin.id">{{ origin.origin }}</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <label for="score">点数：</label>
                    <star-rating 
                        :rating="rating" 
                        :increment="0.1" 
                        @update:rating="getRating" 
                        @hover:rating="setRating"  
                        :show-rating="false" 
                        class="" />
                    <input type="number" id="score" name="score" v-model="rating" max="5" min="0" step="0.1">
                </div>

                <div>
                    <label for="review_title">タイトル：</label>
                    <input type="text" id="review_title" name="review_title" v-model="form.review_title">
                </div>
    
                <div>
                    <label for="review_content">レビュー内容：</label>
                    <textarea id="review_content" name="review_content" cols="30" rows="10" v-model="form.review_content"></textarea>
                </div>

                <input type="hidden" name="movie_id" v-model="form.movie_id">

                <div>
                    <PrimaryButton>
                        <input type="submit" value="確定">
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Sitelayout>
</template>