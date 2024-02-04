<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="relative flex flex-col min-h-screen bg-stone-700">
        <!-- Primary Navigation Menu -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <Link :href="route('welcome')">
                <ApplicationLogo class="block h-[150px] w-[150px] fill-current text-gray-800" />
            </Link>
        </div>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
