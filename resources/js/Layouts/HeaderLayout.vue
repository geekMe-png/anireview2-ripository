<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Character from '@/Components/Character.vue';
</script>

<template>
    <div id="header">
        <div class="h-36 flex justify-center items-center my-16">
            <Character />
            <p class="text-2xl md:text-4xl">
                <slot />
            </p>
        </div>
    </div>
</template>