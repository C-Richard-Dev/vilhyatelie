<script setup>

import { Head, Link, usePage } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    products: {
        type: Array,
        required: true,
    },
});

const { products } = props;

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Home" />
    <Header />
    <div class="bg-white min-h-screen text-black flex flex-col">
        <div class="flex-1">
            <div class="max-w-7xl mx-auto px-4 py-10">
                <h1 class="text-3xl font-bold mb-8 text-center text-pink-600">Produtos em Destaque</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <template v-if="products.length">
                        <div v-for="product in products" :key="product.id" class="bg-white rounded-xl shadow-md overflow-hidden border border-pink-100 flex flex-col">
                            <img v-if="product.image" :src="product.image.startsWith('http') ? product.image : '/storage/' + product.image" alt="Imagem do produto" class="w-full h-48 object-cover bg-pink-50">
                            <div class="p-4 flex-1 flex flex-col">
                                <h2 class="text-lg font-semibold text-pink-600 mb-2">{{ product.name }}</h2>
                                <p class="text-gray-700 text-sm mb-4 flex-1">{{ product.description }}</p>
                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-xl font-bold text-pink-500">R$ {{ product.price }}</span>
                                    <span v-if="product.category" class="text-xs bg-pink-100 text-pink-600 px-2 py-1 rounded">{{ product.category?.name }}</span>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div v-else class="col-span-full text-center text-gray-400 py-16">
                        Nenhum produto cadastrado ainda.
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-8 text-center text-sm text-black/60">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
</template>
