<script setup>
import { Head, Link } from '@inertiajs/vue3';
import SiteLayout from "../Layouts/SiteLayout.vue";
import SearchForm from '@/Components/SearchForm.vue';
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import { Inertia } from '@inertiajs/inertia';
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
    img_path: {
      type: String,
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

const slides = props.img_path;

</script>

<template>
    <Head title="Welcome" />

    <v-container class="relative">
      <SiteLayout :user_name="user_name" :home_route="home_route" :user_route="user_route" >
        <div class="py-5 bg-[url('../../public/assets/images/ヘッダー.png')] bg-center bg-cover ">
          <HeaderLayout class="">
            <p class="text-[28px] font-bold md:text-5xl text-white text-center">アニメレビューサイトにようこそ！</p>
          </HeaderLayout>
        </div>
        <section class="py-8 bg-stone-500">
          <h1 class="py-2 mx-5 md:mx-80 text-2xl md:text-4xl text-black font-bold text-center border-y-4 border-stone-700">おすすめのアニメ</h1>
          <carousel :items-to-show="5" :items-to-scroll="5" :autoplay="9000" :wrap-around="true" :pauseAutoplayOnHover="true" :transition="300" class="my-8">
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

        <div class="mx-8 md:mx-32">
          <p class="md:mx-80 my-16 text-2xl md:text-4xl text-white font-bold font-sans text-center">レビュー一覧</p>
          <Link :href="route('review', { movie_id:review.movie_id, user_id:review.user_id, review:review.id })" v-for="review in reviews" class="flex items-center px-3 py-3 my-6 h-50 bg-gray-300 rounded-md space-x-4">
            <div class="relative text-gray-700 space-y-1">
                <img :src="'../' + review.movie.movie_img_path" alt="映せません" class="h-28 md:h-32">
                <p class="w-20 text-sm font-bold text-center truncate">{{ review.movie.movie_title }}</p>
            </div>
            <div id="review_items" class="">
                <p class="relative top-1 text-gray-700 font-mono underline">{{ review.review_title }}</p>
                <p class="relative my-1 text-gray-700 font-mono">原作：{{ review.original.origin }}</p>
                <p class="relative top-2 my-2 text-[15px] text-gray-600 font-mono max-w-[300px] md:max-w-[850px] max-h-[70px] line-clamp-2">{{review.review_content}}</p>
                <div class="flex space-x-1">
                  <star-rating :rating="review.score" increment="0.1" read-only :show-rating="false" :star-size="18" inactive-color="#778899" class="text-3xl" />
                  <p class="relative top-[13px] text-sm text-gray-600 font-bold">{{ review.score }}</p>
                </div>
                <p class="relative bottom-1 text-gray-600 text-md">{{ review.user.name }}</p>
            </div>
          </Link>
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
