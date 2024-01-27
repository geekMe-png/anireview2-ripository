<script setup>
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import NavigationLayout from './NavigationLayout.vue';
import FormNavigation from '@/Components/FormNavigation.vue';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    user_name2: {
        type: String
    },
})

const search = ref('');

const searchValue = () => {
    Inertia.get(route("search", { search: search.value }));
}

</script>

<template>
    <nav>
        <NavigationLayout :user_name3=user_name2 >
            <form @submit.prevent="searchValue">
                <input type="search" placeholder="キーワードを入力" class="py-1 rounded-l-md border-none focus:ring-0" v-model="search">
                <input type="submit" value="検索" class="px-5 py-1 text-black bg-stone-500 rounded-r-md focus:outline-0">
            </form>
        </NavigationLayout>
    </nav>


    <main>
        <slot />
    </main>
</template>