<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import DefaultProductsGrid from '@/Components/DefaultProductsGrid.vue';
import Header from '@/Components/Header.vue';

const page = usePage();
const products = computed(() => page.props.products || []);
const query = computed(() => page.props.query || '');
</script>

<template>
    <Head title="Pesquisa" />
    <Header />
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">Pesquisa: "{{ query }}"</h1>
        <div v-if="products.length === 0" class="text-gray-500">Nenhum produto encontrado.</div>
        <div v-else class="py-4">
        <DefaultProductsGrid :products="products" :title="'Resultados para: ' + query" />
        </div>
    </div>
</template>

<style scoped>
</style>
