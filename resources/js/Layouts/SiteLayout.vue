<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavigationLayout from './NavigationLayout.vue';
import HeaderLayout from './HeaderLayout.vue';

defineProps({
    user_name2: {
        type: String
    },
})
</script>

<template>
    <nav>
        <NavigationLayout :user_name3=user_name2 />
    </nav>


    <main>
        <slot />
    </main>
</template>