<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Character from '@/Components/Character.vue';
</script>

<template>
    <div id="header">
        <div class="flex justify-center items-center">
            <Character />

            <p class="text-4xl">
                <slot />
            </p>
        </div>

        <form action="" class="flex justify-center mt-12">
            <x-searchForm />
        </form>
    </div>
</template>