<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Sitelayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

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
            rating: 3,
        }
    },
    methods: {
        setRating (value) {
            this.rating = value;
        },
        getRating (value) {
            this.rating = value;
        },
        inputRating (value) {
            this.rating = value.data;
            console.log(this.rating);
        }
    }
}
</script>

<template>
    <Head title="review/edit" />

    <Sitelayout>
        <HeaderLayout>
            <p>こちらは<span class="text-red-600">レビューページ</span>です</p>
        </HeaderLayout>
        <div id="app">
            <star-rating 
            :rating="rating" 
            :increment="0.1" 
            @update:rating="getRating" 
            @hover:rating="setRating" 
            class="text-3xl" />
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
                    <input type="number" v-model="rating" max="5" min="0" step="0.1">
                </div>

                <div>
                    <PrimaryButton>
                        <input type="submit" value="確定">
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Sitelayout>
</template>