<script setup>
import { Head, Link } from '@inertiajs/vue3';
import SiteLayout from "../Layouts/SiteLayout.vue";
import SearchForm from '@/Components/SearchForm.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import { Inertia } from '@inertiajs/inertia';

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
    img_path: {
      type: String,
    },
    user_name: {
      type: String,
    },
    home_route: {
      type: String,
    },
    user_route: {
      type: String,
    },
});

const slides = props.img_path;

</script>

<template>
    <Head title="Welcome" />

    <v-container class="relative">
        <SiteLayout :user_name=user_name :home_route="home_route" :user_route="user_route" >
          <div class="py-20 bg-[url('../../public/assets/images/ヘッダー.png')] bg-center bg-cover ">
            <HeaderLayout class="">
                    <p class="text-5xl text-white text-center">アニメレビューサイト</p>
                </HeaderLayout>
          </div>
          <section class="py-8 bg-stone-500">
            <h1 class="text-4xl text-center mb-10">今期のアニメ</h1>
            <carousel :items-to-show="5" :items-to-scroll="5" :autoplay="9000" :wrap-around="true" :pauseAutoplayOnHover="true" :transition="300">
              <slide v-for="slide in slides" :key="slide">
                <Link :href="route('movie', { movie:slide.id })">
                  <img :src="'../' + slide.movie_img_path" alt="映せません" class="w-44">
                </Link>
              </slide>

              <template #addons="{ slidesCount }">
                <navigation />
                <pagination />
              </template>
            </carousel>
          </section>

          <div>
            <h1 class="text-4xl text-center my-10">レビュー一覧</h1>
            <div v-for="review in reviews">
              <Link :href="route('review', { movie_id:review.movie_id, user_id:review.user_id, review:review.id })" id="review_items">
                <p>{{ review.review_title }}</p>
                <p>{{ review.movie.movie_title }} </p>
                <p>{{ review.original.origin }}</p>
                <p>{{ review.score }}</p>
                <p class="whitespace-pre-wrap">{{ review.review_content }}</p>
                <p>{{ review.user.name }}</p>
                <p>{{ review.created_at }}</p>
                <p>{{ review.updated_at }}</p>
              </Link>
            </div>
          </div>
        </SiteLayout>
    </v-container>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
