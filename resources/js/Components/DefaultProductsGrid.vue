
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
  products: {
    type: Array,
    required: true,
  },
});
</script>

<template>
	<div class="relative w-full">
		<div class="mb-4 flex items-center justify-center">
			<span class="font-bold text-pink-600">Produtos</span>
		</div>
		<div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4">
			<Link
				v-for="product in products"
				:key="product.id"
				:href="route('product.details', { product: product.id })"
				class="group bg-white rounded-xl shadow-md overflow-hidden border border-pink-100 flex flex-col transition-all duration-300 transform hover:scale-105 hover:bg-primary hover:text-white relative"
			>
				<!-- Selo de status -->
				<span v-if="product.status === 'promotion'" class="absolute top-2 left-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full shadow z-10">Promoção</span>
				<span v-else-if="product.status === 'new'" class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow z-10">Novo</span>
				<span v-else-if="product.status === 'latest'" class="absolute top-2 left-2 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow z-10">Últimos</span>
				<img :src="product.image ? `/storage/${product.image}` : '/images/default.png'" alt="Imagem do produto" class="w-full h-48 object-cover bg-pink-50">
				<div class="p-4 flex-1 flex flex-col">
					<h2 class="text-lg font-semibold text-pink-600 mb-2 group-hover:text-white">{{ product.name }}</h2>
					<p class="text-gray-700 text-sm mb-4 flex-1 hidden md:block group-hover:text-white">{{ product.description }}</p>
					<div class="mt-auto flex items-center justify-between">
						<span class="text-xl font-bold text-pink-500 group-hover:text-white">R$ {{ product.price }}</span>
						<span v-if="product.category" class="text-xs bg-pink-100 text-pink-600 px-2 py-1 rounded hidden md:block group-hover:bg-pink-700 group-hover:text-white">{{ product.category?.name }}</span>
					</div>
				</div>
			</Link>
		</div>
		<div v-if="!products.length" class="text-center text-gray-400 py-16">
			Nenhum produto cadastrado ainda.
		</div>
	</div>
</template>
