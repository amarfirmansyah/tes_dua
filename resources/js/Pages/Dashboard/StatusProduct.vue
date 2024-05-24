<script setup lang="ts">

const props = defineProps(['data'])
</script>

<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="w-full px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-800 dark:text-gray-400">Status</span>
                <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">{{data.length >= 1 ? data[0].status : 'bagus' }}</span>
            </div>

            <div class="text-7xl text-center mt-4">
               {{data.length >= 1 ? data[0].total : 0 }}
            </div>
            <div class="mt-3 text-gray-400">
                Products
            </div>
        </div>
        <div class="w-full px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-800 dark:text-gray-400">Status</span>
                <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">{{data.length >= 2 ? data[1].status : 'rusak' }}</span>
            </div>

            <div class="text-7xl text-center mt-4">
               {{data.length >= 2 ?data[1].total : 0 }}
            </div>
            <div class="mt-3 text-gray-400">
                Products
            </div>
        </div>
        <div class="w-full px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-800 dark:text-gray-400">Status</span>
                <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">{{data.length >= 3 ? data[2].status : 'perlu perbaikan' }}</span>
            </div>

            <div class="text-7xl text-center mt-4">
               {{data.length >= 3 ? data[2].total : 0 }}
            </div>
            <div class="mt-3 text-gray-400">
                Products
            </div>
        </div>
        <div class="w-full px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-800 dark:text-gray-400">Status</span>
                <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">{{data.length === 4 ? data[3].status : 'dalam perbaikan' }}</span>
            </div>

            <div class="text-7xl text-center mt-4">
               {{data.length === 4 ? data[3].total : 0 }}
            </div>
            <div class="mt-3 text-gray-400">
                Products
            </div>
        </div>
    </div>
</template>
