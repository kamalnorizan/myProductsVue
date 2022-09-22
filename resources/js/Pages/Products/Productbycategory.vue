<script setup>
import ProductItem from '@/components/ProductItem.vue';
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps({
    products: Array,
    category: Object,
});
</script>
<template>
    <Head title="Category"></Head>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2>
                Category - {{category.name}}
            </h2>
        </template>
        .
        <div class="container">
            <div class="row">
                <ProductItem class="mt-2" v-for="product in products" :product="product"></ProductItem>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
