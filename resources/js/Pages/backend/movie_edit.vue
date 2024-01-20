<script setup>
import { reactive } from "vue";
import { Head, Link, useForm, router} from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";
import Sitelayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = reactive({
    movie_title: null,
    movie_about: null,
    author: null,
    directer: null,
    screenwriter: null,
    characterdesign: null,
    music: null,
    movie_cast: null,
    company: null,
    year_id: null,
    movie_img: null,
})

const submit = () => {
    Inertia.post(route('movie.store'), form)
}

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
    years:Array,
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
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div>
                    <label for="movie_title">作品タイトル</label>
                    <input type="text" id="movie_title" name="movie_title" v-model="form.movie_title">
                </div>

                <div>
                    <label for="movie_about">概要</label>
                    <textarea id="movie_about" name="movie_about" class="whitespace-pre-wrap" cols="30" rows="10" v-model="form.movie_about"></textarea>
                </div>

                <div>
                    <label for="auther">原作者</label>
                    <input type="text" id="auther" name="auther" v-model="form.auther">
                </div>

                <div>
                    <label for="directer">監督</label>
                    <input type="text" id="directer" name="directer" v-model="form.directer">
                </div>

                <div>
                    <label for="screenwriter">シリーズ構成</label>
                    <input type="text" id="screenwriter" name="screenwriter" v-model="form.screenwriter">
                </div>

                <div>
                    <label for="characterdesign">キャラクターデザイン</label>
                    <input type="text" id="characterdesign" name="characterdesign" v-model="form.characterdesign">
                </div>

                <div>
                    <label for="music">音楽</label>
                    <input type="text" id="music" name="music" v-model="form.music">
                </div>

                <div>
                    <label for="movie_cast">キャスト</label>
                    <textarea name="movie_cast" id="movie_cast" class="whitespace-pre-wrap" cols="30" rows="10" v-model="form.movie_cast"></textarea>
                </div>

                <div>
                    <label for="company">制作会社</label>
                    <input type="text" id="company" name="company" v-model="form.company">
                </div>

                <div>
                    <label for="year_id">年代</label>
                    <select id="year_id" name="year_id" v-model="form.year_id">
                        <option v-for="year in years" :value="year.id">{{ year.year }}</option>
                    </select>
                </div>

                <div>
                    <label for="movie_img">イメージ画像</label>
                    <input type="file" id="movie_img" name="movie_img" @input="form.movie_img = $event.target.files[0]">
                </div>

                <div>
                    <PrimaryButton>
                        <input type="submit" value="登録">
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Sitelayout>
</template>