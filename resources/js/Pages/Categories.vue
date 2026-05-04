<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';

const page = usePage();
const categories = computed(() => page.props.categories || []);
</script>

<template>
    <Head title="Categorias" />
    <Header />
    
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="mb-6">
            <Link href="/" class="text-[#FF1C4A] hover:underline">← Voltar para produtos</Link>
        </div>
        <h1 class="text-2xl font-bold mb-6">Categorias</h1>
        <div v-if="categories.length === 0" class="text-gray-500">Nenhuma categoria encontrada.</div>
        <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div v-for="category in categories" :key="category.id" class="bg-[#FF1C4A] rounded-xl shadow-lg p-6 flex flex-col items-center text-white transition-transform hover:scale-105 hover:shadow-2xl">
                <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white mb-4">
                    <svg class="w-8 h-8 text-[#FF1C4A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <h2 class="font-bold text-xl mb-2 text-white text-center">{{ category.name }}</h2>
                <div class="text-sm text-pink-100 mb-4">Produtos: {{ category.products_count }}</div>
                <Link :href="`/category/${category.id}/products`" class="mt-auto inline-block bg-white text-[#FF1C4A] px-4 py-2 rounded font-semibold hover:bg-pink-100 hover:text-[#FF3570] transition">Ver produtos</Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
