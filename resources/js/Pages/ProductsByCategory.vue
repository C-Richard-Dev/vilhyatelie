<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import DefaultProductsGrid from '@/Components/DefaultProductsGrid.vue';
import Header from '@/Components/Header.vue';

const page = usePage();
const products = computed(() => page.props.products || []);
</script>

<template>
    <Head title="Produtos" />
    <Header />
    
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="mb-6">
            <Link href="/categorias" class="text-[#FF1C4A] hover:underline">← Voltar para categorias</Link>
        </div>
        <h1 class="text-2xl font-bold mb-4 mt-4">Produtos da Categoria</h1>
        <div v-if="products.length === 0" class="text-gray-500">Nenhum produto encontrado nesta categoria.</div>
        <div v-else class="py-4">
        <DefaultProductsGrid :products="products" />
        </div>
        
    </div>
</template>

<style scoped>
</style>
