<script setup lang="ts">
import {Head, Link} from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import StatusProduct from "@/Pages/Dashboard/StatusProduct.vue";
import {onMounted, ref} from "vue";
import ProductService from "@/Services/product.service";
import {Condition, Diagram} from "@/Interfaces/component";
import DiagramPie from "@/Pages/Dashboard/DiagramPie.vue";

const loading = ref<boolean>(false)
const productCondition = ref<Condition[]>([])
const dataDiagram = ref<Diagram[]>([])

onMounted(() => {
    getData()
})

const getData = () => {
    ProductService.checkCondition()
        .then(response => {
            productCondition.value = response.data.data
        }).catch(err => console.log('error get condition: ' + err))

    ProductService.diagram()
        .then(response => {
            dataDiagram.value = response.data.data
        }).catch(err => console.log('error get data diagram: ' + err))
}

</script>

<template>
    <Head title="Dashboard"/>

    <Layout>
        <div class="sm:px-10 pb-20">
            <StatusProduct :data="productCondition" />

            <div class="mt-6">
                Chart Diagram
            </div>

            <DiagramPie :data="dataDiagram" />
        </div>
    </Layout>
</template>
