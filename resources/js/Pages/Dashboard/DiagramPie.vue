<script setup lang="ts">
import ApexChart from "vue3-apexcharts";

const props = defineProps(['data'])

const series = [44, 55, 13, 43, 22]

const setup = (item) => {
    let chartOptions = {
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    chartOptions.labels = item.categories

    return chartOptions;
}

</script>

<template>
    <div class="mt-6 grid grid-cols-2 gap-6">
        <div v-for="item in data" class="w-full bg-white rounded-md shadow-md">
            <div class="px-4 py-1 m-4 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900 w-fit">{{item.name}}</div>
            <ApexChart type="pie" width="380" :options="setup(item)" :series="item.count"></ApexChart>
        </div>
    </div>
</template>
