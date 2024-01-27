<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ssrContextKey } from 'vue';
import { ref } from 'vue'

const props = defineProps(['modelValue']);

const emits = defineEmits(['update:modelValue']);

//emitを親コンポーネントのSiteLayout.vueに送信
</script>

<template>
    <input type="search" placeholder="キーワードを入力" class="py-1 rounded-l-md border-none focus:ring-0" :value="props.modelValue" @input="$emit('update:modelValue', $event.target.value)">
    <input type="submit" value="検索" class="px-5 py-1 text-black bg-stone-500 rounded-r-md focus:outline-0">
    <p>{{ props.modelValue }}</p>
</template>