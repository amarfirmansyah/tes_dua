<script setup lang="ts">

import {Head} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import {onMounted, ref} from "vue";
import {List} from "@/Interfaces/component"
import ManufacturerService from "@/Services/manufacturer.service";

const data = ref<List[]>([{id: null, name: null}])
const loading = ref<Boolean>(false)

onMounted(() => {
    getData()
})

const getData = () => {
    if (data.value.length === 1) {
        loading.value = true
        ManufacturerService.getAll()
            .then(response => {
                loading.value = false
                data.value = response.data.data
            })
            .catch(err => {
                console.log('gagal mendapatkan status' + err)
            })
    }
}
</script>

<template>
    <Head title="Status"/>

    <Layout>
        <div class="sm:px-10 pb-20">
            <table v-if="!loading" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col"
                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Id
                    </th>

                    <th scope="col"
                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Name
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                <tr v-for="item in data">
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <div class="inline-flex items-center gap-x-3">
                            {{item.id}}
                        </div>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                        {{item.name ?? '-' }}
                    </td>
                </tr>
                </tbody>
            </table>
            <div v-else class="mt-3 w-full mx-auto flex p-2.5">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-primary-red"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Loading...
            </div>
        </div>
    </Layout>
</template>
