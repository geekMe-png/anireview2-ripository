<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Character from '@/Components/Character.vue';
</script>

<template>
    <div id="header">
        <div class="h-36 flex justify-center items-center my-16 text-2xl md:text-4xl font-bold">
            <Character />
            <slot />
        </div>
    </div>
</template>