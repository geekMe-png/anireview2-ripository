<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import ApplicationMenuButton from '@/Components/ApplicationMenuButton.vue';
import ApplicationMenuList from '@/Components/ApplicationMenuList.vue';
import FormNavigation from '@/Components/FormNavigation.vue';

defineProps({
    user_name3: {
        type: String,
    },
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
        <ApplicationLogo class="w-40 fill-current text-gray-500" />
        <main>
            <slot />
        </main>
        <p class="hidden md:mr-11 md:block">{{ user_name3 }}</p>
        <ApplicationMenuButton @click="Open" :isOpen="isOpen" />
    </div>
    <div>
        <ApplicationMenuList :class="isOpen ? 'block' : 'hidden'" />
    </div>
</template>