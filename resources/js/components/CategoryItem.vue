<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    category: Object,
});

</script>
<template>
    <tr>
        <td>{{category.id}}</td>
        <td>{{category.name}}</td>
        <td>{{category.products_count}}</td>
        <td>{{category.user_id}}</td>
        <td>
            <Link :href="route('product.productbycategory',{category:category.id})" class="btn btn-sm btn-primary">Show</Link>
            <Link :href="route('category.edit',{category:category.id})" class="btn btn-sm btn-warning">Edit</Link>
        </td>
    </tr>
</template>
