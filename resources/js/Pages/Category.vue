<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CategoryItem from '@/components/CategoryItem.vue';
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    categories: Array,
});
</script>
<template>
    <BreezeAuthenticatedLayout>
        <div class="py-12 px-12">
            <div class="bg-white p-8">
                <Link href="category/create" class="btn btn-info float-right">Create</Link>
                <table class="table" id="category_tbl">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Kategori</th>
                            <th>Bil(Produk)</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <CategoryItem v-for="category in categories" :category="category"></CategoryItem>
                    </tbody>
                </table>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
