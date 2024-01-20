<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import ApplicationMenuButton from '@/Components/ApplicationMenuButton.vue'
import ApplicationMenuList from '@/Components/ApplicationMenuList.vue'

defineProps({
    user_name3: {
        type: String,
    },
})
</script>

<template>
    <div class="flex justify-between items-center">
        <ApplicationLogo class="w-40 fill-current text-gray-500" />
        <p class="hidden md:mr-11 md:block">{{ user_name3 }}</p>
        <ApplicationMenuButton />
    </div>
    <div>
        <ApplicationMenuList class="text-3xl bg-stone-500" />
    </div>
</template>