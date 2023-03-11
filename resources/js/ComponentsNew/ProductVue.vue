<script setup>
    defineProps({
        image: String,
        name: String,
        description: String,
        price: Number,

});
</script>

<template>
    <div class="rounded-lg shadow-lg bg-white max-w-sm">

        <img class="rounded-t-lg" :src="image" alt="Imagen">

        <div class="p-6">
            <h5 class="text-gray-900 text-xl font-medium mb-2">
                {{ name }}
            </h5>
            <p class="text-gray-700 text-base mb-4">
                {{ description }}
            </p>
            <h5 class="text-3xl text-center font-bold uppercase text-gray-800 dark:text-gray-100">100€</h5>
            <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Comprar</button>
        </div>
    </div>
</template>


