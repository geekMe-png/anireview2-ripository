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
            <p>こちらは<span class="text-red-600">作品登録ページ</span>です</p>
        </HeaderLayout>
        <div id="app">
            <form action="">
                <div>
                    <label for="input_movie_title">作品タイトル</label>
                    <input type="text" id="input_movie_title">
                </div>

                <div>
                    <label for="input_movie_about">概要</label>
                    <textarea id="input_movie_about" cols="30" rows="10"></textarea>
                </div>

                <div>
                    <label for="input_author">原作者</label>
                    <input type="text" id="input_author">
                </div>

                <div>
                    <label for="input_directer">監督</label>
                    <input type="text" id="input_directer">
                </div>

                <div>
                    <label for="input_screenwriter">シリーズ構成</label>
                    <input type="text" id="input_screenwriter">
                </div>

                <div>
                    <label for="input_caracterdesign">キャラクターデザイン</label>
                    <input type="text" id="input_caracterdesign">
                </div>

                <div>
                    <label for="input_music">音楽</label>
                    <input type="text" id="input_music">
                </div>

                <div>
                    <label for="input_company">制作会社</label>
                    <input type="text" id="input_company">
                </div>

                <div>
                    <label for="input_year_id">年代</label>
                    <select id="input_year_id">
                        <option value=""></option>
                    </select>
                </div>

                <div>
                    <label for="input_movie_img">イメージ画像</label>
                    <input type="file" id="input_movie_img">
                </div>

                <div>
                    <label for="input_author">原作者</label>
                    <input type="text" id="input_author">
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