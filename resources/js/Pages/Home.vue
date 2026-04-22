<script setup>

import { Head, Link, usePage } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import DefaultProductsCarousel from '@/Components/DefaultProductsCarousel.vue';

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
            <!-- Carrossel de Produtos Sem Status -->
            <div class="max-w-7xl mx-auto px-4 py-10">
                <DefaultProductsCarousel :products="products" />
            </div>
        </div>
        <footer class="py-8 text-center text-sm text-black/60">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
</template>
