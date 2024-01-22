<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import ApplicationMenuButton from '@/Components/ApplicationMenuButton.vue'
import ApplicationMenuList from '@/Components/ApplicationMenuList.vue'
import { ref } from 'vue';

defineProps({
    user_name3: {
        type: String,
    },
})

const isOpen = ref(false);

function Open() {
    isOpen.value = !isOpen.value;
};
</script>

<template>
    <div class="flex justify-between items-center">
        <ApplicationLogo class="w-40 fill-current text-gray-500" />
        <p class="hidden md:mr-11 md:block">{{ user_name3 }}</p>
        <ApplicationMenuButton @click="Open" :isOpen="isOpen" />
    </div>
    <div>
        <ApplicationMenuList :class="isOpen ? 'block' : 'hidden'" />
    </div>
</template>