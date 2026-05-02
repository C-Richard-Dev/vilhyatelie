<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

const search = ref('');
const open = ref(false);

function submitSearch(e) {
    e.preventDefault();
    if (search.value.trim() !== '') {
        router.get(`/search`, { query: search.value });
    }
}
</script>

<template>
    <header class="w-full bg-[#FF1C4A] shadow-sm sticky top-0 z-30">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
            <!-- Logo -->
            <Link href="/" class="flex items-center gap-2">
                <img src="/images/logo.png" alt="Logo" class="h-8 w-8 object-contain" />
                <span class="font-bold text-white text-lg">Vilhy Ateliê</span>
            </Link>

            <!-- Mobile menu button -->
            <button @click="open = !open" class="md:hidden ml-2 p-2 rounded focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop nav -->
            <nav class="hidden md:flex gap-4 items-center">
                <Link href="/" class="text-white hover:text-gray-100 font-medium transition">Produtos</Link>
                <Link href="/categorias" class="text-white hover:text-gray-100 font-medium transition">Categorias</Link>
                <form @submit="submitSearch" class="ml-4 flex items-center">
                    <input v-model="search" type="text" placeholder="Buscar..." class="rounded-l px-3 py-1 border border-pink-200 focus:ring-white focus:border-white text-sm outline-none bg-[#FF3570] text-white placeholder-white" />
                    <button type="submit" class="bg-white text-[#FF1C4A] px-3 py-1 rounded-r hover:bg-gray-100 transition font-semibold">Buscar</button>
                </form>
            </nav>
        </div>
        <!-- Mobile nav -->
        <nav v-if="open" class="md:hidden px-4 pb-4 flex flex-col gap-2 bg-[#FF1C4A] border-t border-pink-100">
            <Link href="/" class="text-white py-2 px-2 rounded hover:bg-[#FF3570]">Produtos</Link>
            <Link href="/categorias" class="text-white py-2 px-2 rounded hover:bg-[#FF3570]">Categorias</Link>
            <form @submit="submitSearch" class="flex items-center mt-2">
                <input v-model="search" type="text" placeholder="Buscar..." class="rounded-l px-3 py-1 border border-pink-200 focus:ring-white focus:border-white text-sm outline-none w-full bg-[#FF3570] text-white placeholder-white" />
                <button type="submit" class="bg-white text-[#FF1C4A] px-3 py-1 rounded-r hover:bg-gray-100 transition font-semibold">Buscar</button>
            </form>
        </nav>
    </header>
</template>



<style scoped>
/* Adicione estilos extras se necessário */
</style>
