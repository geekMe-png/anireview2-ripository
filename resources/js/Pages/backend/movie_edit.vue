<script setup>
import { reactive } from "vue";
import { Head, Link, useForm, router} from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";
import Sitelayout from '@/Layouts/SiteLayout.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

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
    years: {
        type: Array,
    },
    movies: {
        type: Array,
    },
    movie_id: {
        type: Number,
    },
    user_name: {
      type: String,
    },
    user_id: {
      type: String,
    },
    home_route: {
      type: String,
    },
    user_route: {
      type: String,
    },
});

//console.log(props.movie_id);

//console.log(props.years[0].year);
//console.log(props.movies[0]);

const form = reactive({
    movie_title: props.movies[0].movie_title,
    movie_about: props.movies[0].about,
    auther: props.movies[0].auther,
    directer: props.movies[0].directer,
    screenwriter: props.movies[0].screenwriter,
    characterdesign: props.movies[0].caracterdesign,
    music: props.movies[0].music,
    movie_cast: props.movies[0].cast,
    company: props.movies[0].company,
    year_id: props.movies[0].year_id,
    movie_img: '',
})

console.log(form);

const submit = () => {
    if(props.movie_id == null) {
        Inertia.post(route('movie.store'), form);
        //confirm('0');
    }else{
        Inertia.post(route('movie.update', props.movie_id), form, {
            forceFormData: true,
        });
        //console.log(form);
        //console.log(form.movie_img);
    }
    //Inertia.post(route('movie.store'), form)
}
</script>

<template>
    <Head title="review/edit" />

    <Sitelayout :user_name="user_name" :home_route="home_route" :user_route="user_route">
        <HeaderLayout>
            <p>こちらは<span class="text-red-600">作品登録ページ</span>です</p>
        </HeaderLayout>
        <div class="mx-3">
            <form @submit.prevent="submit" enctype="multipart/form-data" method="post">
                <div class="p-3 text-center border-2 border-gray-300 rounded-md divide-y-2 divide-gray-400 divide-dashed space-y-11">
                    <div class="">
                        <label for="movie_title" class="relative text-2xl font-bold">作品タイトル</label><br>
                        <input type="text" id="movie_title" name="movie_title" v-model="form.movie_title" class="relative top-5 w-4/5 text-xl rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="movie_about" class="relative top-3 text-2xl font-bold">概要</label><br>
                        <textarea id="movie_about" name="movie_about" cols="30" rows="10" v-model="form.movie_about" class="relative w-4/5 h-96 top-5 rounded-md border-none focus:ring-0 whitespace-pre-wrap"></textarea>
                    </div>

                    <div>
                        <label for="auther" class="relative top-3 text-2xl font-bold">原作者</label><br>
                        <input type="text" id="auther" name="auther" v-model="form.auther" class="relative top-5 rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="directer" class="relative top-3 text-2xl font-bold">監督</label><br>
                        <input type="text" id="directer" name="directer" v-model="form.directer" class="relative top-5 rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="screenwriter" class="relative top-3 text-2xl font-bold">シリーズ構成</label><br>
                        <input type="text" id="screenwriter" name="screenwriter" v-model="form.screenwriter" class="relative top-5 rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="characterdesign" class="relative top-3 text-2xl font-bold">キャラクターデザイン</label><br>
                        <input type="text" id="characterdesign" name="characterdesign" v-model="form.characterdesign" class="relative top-5 rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="music" class="relative top-3 text-2xl font-bold">音楽</label><br>
                        <input type="text" id="music" name="music" v-model="form.music" class="relative top-5 rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="movie_cast" class="relative top-3 text-2xl font-bold">キャスト</label><br>
                        <textarea name="movie_cast" id="movie_cast" cols="30" rows="10" v-model="form.movie_cast" class="relative top-5 h-64 rounded-md border-none focus:ring-0 whitespace-pre-wrap"></textarea>
                    </div>

                    <div>
                        <label for="company" class="relative top-3 text-2xl font-bold">制作会社</label><br>
                        <input type="text" id="company" name="company" v-model="form.company" class="relative top-5 rounded-md border-none focus:ring-0">
                    </div>

                    <div>
                        <label for="year_id" class="relative top-3 text-2xl font-bold">年代</label><br>
                        <select id="year_id" name="year_id" v-model="form.year_id" class="relative top-5 text-lg font-bold rounded-md border-none focus:ring-0">
                            <option v-for="year in years" :value="year.id">{{ year.year }}</option>
                        </select>
                    </div>

                    <div class="">
                        <label for="movie_img" class="relative top-3 text-2xl font-bold">イメージ画像</label><br>
                        <input type="file" id="movie_img" name="movie_img" @input="form.movie_img = $event.target.files[0]" class="relative top-5 left-14 pb-8 text-md">
                    </div>
                </div>
                <div class="relative my-5 text-center">
                    <PrimaryButton>
                        <input type="submit" value="登録" class="w-44 h-5">
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Sitelayout>
</template>