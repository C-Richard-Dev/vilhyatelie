<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';

const { props } = usePage();
const product = props.product;

// Gerar link do produto
const productUrl = typeof window !== 'undefined' ? window.location.href : '';
const whatsappNumber = '559187465809';
const whatsappMessage = `Olá! Tenho interesse no produto: ${product.name} - ${productUrl}`;
const whatsappLink = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;
</script>

<template>
	<Head :title="product.name" />
		<Header />
		<div class="min-h-screen flex flex-col bg-white text-black">
			<div class="max-w-5xl mx-auto w-full px-4 md:px-10 pt-4">
				<Link :href="route('home')" class="inline-flex items-center gap-2 text-pink-600 hover:text-pink-800 font-semibold text-base md:text-lg mb-4">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
					Voltar
				</Link>
			</div>
			<div class="flex flex-col md:flex-row max-w-5xl mx-auto w-full p-4 md:p-10 gap-8 flex-1">
			<!-- Imagem -->
			<div class="flex-shrink-0 flex justify-center items-start md:items-start w-full md:w-1/2">
				<img
					:src="product.image ? `/storage/${product.image}` : '/images/default.png'"
					:alt="product.name"
					class="w-full max-w-xs md:max-w-md rounded-xl shadow-md object-cover bg-pink-50"
				/>
			</div>
			<!-- Detalhes -->
			<div class="flex flex-col w-full md:w-1/2 gap-4">
				<h1 class="text-2xl md:text-3xl font-bold text-pink-600">{{ product.name }}</h1>
				<p class="text-gray-700 text-base md:text-lg">{{ product.description }}</p>
				<div class="flex flex-wrap gap-2 items-center mt-2">
					<span v-if="product.category" class="text-xs bg-pink-100 text-pink-600 px-2 py-1 rounded">{{ product.category?.name }}</span>
				</div>
				<div class="text-2xl font-bold text-pink-500 mt-2">R$ {{ product.price }}</div>
				<div class="text-sm text-gray-600">Quantidade disponível: <span class="font-semibold">{{ product.quantity }}</span></div>
				<div v-if="product.fabrics && product.fabrics.length" class="mt-4">
					<h2 class="font-semibold text-pink-600 mb-2">Tecidos disponíveis:</h2>
					<ul class="flex flex-wrap gap-2">
						<li v-for="fabric in product.fabrics" :key="fabric.id" class="flex items-center gap-2 bg-pink-50 text-pink-700 px-3 py-1 rounded-full text-xs border border-pink-200">
							<img v-if="fabric.image" :src="`/storage/${fabric.image}`" :alt="fabric.name" class="w-10 h-10 rounded-full object-cover border border-pink-200 bg-white" />
							{{ fabric.name }}
						</li>
					</ul>
				</div>
				   <a
					   :href="whatsappLink"
					   target="_blank"
					   class="mt-6 w-full md:w-auto inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg text-center text-lg shadow transition-all duration-200"
				   >
					   Pedir pelo WhatsApp
				   </a>
			</div>
		</div>
	</div>
</template>
