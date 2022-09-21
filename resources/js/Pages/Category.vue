<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import PrimaryButton from '@/components/PrimaryButton.vue';
    import CategoryItem from '@/components/CategoryItem.vue';


    defineProps({
        categories: Array,
    });
</script>
<template>
    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="px-8">
                <div class="bg-white px-8">
                    <table class="table-fixed w-full" id="category_tbl">
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
        </div>
    </BreezeAuthenticatedLayout>
</template>
