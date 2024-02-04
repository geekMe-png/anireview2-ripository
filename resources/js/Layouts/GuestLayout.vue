<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 mx-5 bg-stone-700">
        <div class="relative">
            <Link href="/">
                <ApplicationLogo class="w-[150px] h-[150px] fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-md"
        >
            <slot />
        </div>
    </div>
</template>
