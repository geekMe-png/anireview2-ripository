<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavigationLayout from './NavigationLayout.vue';
import HeaderLayout from './HeaderLayout.vue';
</script>

<template>
    <nav>
        <NavigationLayout class=""/>
    </nav>


    <main>
        <slot />
    </main>
</template>