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
		       <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4">
			       <div v-for="product in products" :key="product.id"
				       class="bg-white rounded-xl shadow-md overflow-hidden border border-pink-100 flex flex-col"
			       >
					<img :src="product.image ? `/storage/${product.image}` : '/images/default.png'" alt="Imagem do produto" class="w-full h-48 object-cover bg-pink-50">
				       <div class="p-4 flex-1 flex flex-col">
					       <h2 class="text-lg font-semibold text-pink-600 mb-2">{{ product.name }}</h2>
						   <p class="text-gray-700 text-sm mb-4 flex-1 hidden md:block">{{ product.description }}</p>
					       <div class="mt-auto flex items-center justify-between">
						       <span class="text-xl font-bold text-pink-500">R$ {{ product.price }}</span>
						       <span v-if="product.category" class="text-xs bg-pink-100 text-pink-600 px-2 py-1 rounded hidden md:block">{{ product.category?.name }}</span>
					       </div>
				       </div>
			       </div>
		       </div>
		       <div v-if="!products.length" class="text-center text-gray-400 py-16">
			       Nenhum produto cadastrado ainda.
		       </div>
	       </div>
</template>
