<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Link, Head} from '@inertiajs/inertia-vue3'

defineProps({
    categories: Array,
});

</script>
<template>

    <Head title="Create Category"></Head>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2>
                New Category
            </h2>
        </template>

    </BreezeAuthenticatedLayout>
</template>
