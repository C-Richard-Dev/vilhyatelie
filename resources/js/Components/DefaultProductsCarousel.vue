<script setup>
const props = defineProps({
	products: {
		type: Array,
		required: true,
	},
});

import { ref, computed } from 'vue';


</script>

<template>
	<div class="relative w-full">
		<div class="mb-4 flex items-center justify-center">
			<span class="font-bold text-pink-600">Produtos</span>
		</div>
		<div class="overflow-x-auto scrollbar-hide">
			<div class="flex gap-4 pl-4 pr-2 sm:px-2" style="scroll-snap-type: x mandatory;">
				<div v-for="(product, idx) in products" :key="product.id"
					:class="[
						'bg-white rounded-xl shadow-md overflow-hidden border border-pink-100 flex flex-col scroll-snap-align-start',
						'max-w-xs mx-auto',
						idx === 0 ? 'min-w-[75vw] sm:min-w-[350px]' : 'min-w-[70vw] sm:min-w-[350px]'
					]"
				>
					<!-- <pre>{{ product }}</pre> -->
					<img v-if="product.image" :src="`/storage/${product.image}`" alt="Imagem do produto" class="w-full h-48 object-cover bg-pink-50">
					<div class="p-4 flex-1 flex flex-col">
						<h2 class="text-lg font-semibold text-pink-600 mb-2">{{ product.name }}</h2>
						<p class="text-gray-700 text-sm mb-4 flex-1">{{ product.description }}</p>
						<div class="mt-auto flex items-center justify-between">
							<span class="text-xl font-bold text-pink-500">R$ {{ product.price }}</span>
							<span v-if="product.category" class="text-xs bg-pink-100 text-pink-600 px-2 py-1 rounded">{{ product.category?.name }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div v-if="!products.length" class="text-center text-gray-400 py-16">
			Nenhum produto cadastrado ainda.
		</div>
	</div>
</template>
