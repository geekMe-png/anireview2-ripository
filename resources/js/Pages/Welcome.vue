<script setup>
import { Head, Link } from '@inertiajs/vue3';
import SiteLayout from "../Layouts/SiteLayout.vue";
import SearchForm from '@/Components/SearchForm.vue';
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
    name:String,
});
</script>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

const slides = [
  'ダンジョン飯.webp',
  'メタリックルージュ.jpg',
  'ゆびさきと恋々.avif',
  '異修羅.avif',
  '道産子ギャル.avif',
  '魔法少女になりたくて.jpg',
  'バーンザウィッチ.jpg',
  '異世界モフモフ.avif',
  '戦国妖狐.avif',
  '姫様拷問の時間です.avif',
]

export default {
  name: 'App',
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
};
</script>

<template>
    <Head title="Welcome" />

    <v-container class="relative">
        <SiteLayout>
          <div class="py-20 bg-black">
            <HeaderLayout class="">
                    <p class="text-white">こちらは<span class="text-red-600">トップページ</span>です</p>
                </HeaderLayout>

                <form action="#" class="md:absolute md:right-96">
                    <SearchForm class=""/>
                </form>
          </div>
          <section class="py-11 bg-stone-500">
            <h1 class="text-4xl text-center mb-10">今期のアニメ</h1>
            <carousel :items-to-show="5" items-to-scroll="5" autoplay="9000" wrap-around="false">
              <slide v-for="slide in slides" :key="slide">
                <a href="#">
                  <img :src="'assets/images/'+ slide " alt="映せません" class="w-44">
                </a>
              </slide>

              <template #addons="{ slidesCount }">
                <navigation />
                <pagination />
              </template>
            </carousel>
          </section>

          <div>
            <h1 class="text-4xl text-center my-10">レビュー一覧</h1>
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
