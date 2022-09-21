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
                <div class="bg-white px-8 py-8 ">
                    <table class="table-fixed  border-collapsed divide-black w-full" id="category_tbl">
                        <thead>
                            <tr class="bg-blue-500 text-center">
                                <th class="
                           w-1/12
                           min-w-[50px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           border-l border-transparent
                           ">Bil</th>
                                <th class="py-4 text-white">Kategori</th>
                                <th class="py-4 text-white">Bil(Produk)</th>
                                <th class="py-4 text-white">Tindakan</th>
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
