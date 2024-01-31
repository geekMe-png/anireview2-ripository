<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import ApplicationMenuButton from '@/Components/ApplicationMenuButton.vue';
import ApplicationMenuList from '@/Components/ApplicationMenuList.vue';
import FormNavigation from '@/Components/FormNavigation.vue';

defineProps({
    home_route: {
        type: String,
    },
    user_name: {
        type: String,
    }
})

//ナビゲーション開閉の真偽値
const isOpen = ref(false);

//ハンバーガーメニューを押したときの処理
function Open() {
    isOpen.value = !isOpen.value;
};
</script>

<template>
    <div class="flex justify-between items-center">
        <Link :href="home_route">
            <ApplicationLogo class="w-40 fill-current text-gray-500" />
        </Link>
        <main>
            <slot />
        </main>
        <ApplicationMenuButton @click="Open" :isOpen="isOpen" />
    </div>

    <div>
        <ApplicationMenuList :class="isOpen ? 'block' : 'hidden'" :user_name="user_name" />
    </div>
</template>