<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3'
import Swal from 'sweetalert2/dist/sweetalert2';

defineProps({
    category: Object,

});

const remove = (id)=>{
    Swal.fire({
        title: 'Warning',
        text: 'Are you sure you want to remove this category?',
        icon: 'warning',
        showCancelButton: true,
        showConfirmButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes! I\'m sure',
        confirmButtonColor: '#F00'
    }).then((value)=>{
        if(value.isConfirmed){
            Inertia.delete(route('category.destroy', {category: id}));
        }
    });
}

</script>
<template>
    <tr>
        <td>{{category.id}}</td>
        <td>{{category.name}}</td>
        <td>{{category.products_count}} </td>
        <td>
            <Link :href="route('product.productbycategory',{category:category.id})" class="btn btn-sm btn-primary ml-1">Show </Link>
            <Link v-if="$page.props.permission['update-category']" :href="route('category.edit',{category:category.id})" class="btn btn-sm btn-warning ml-1">Edit</Link>
            <Link v-if="$page.props.permission['delete-category']" @click="remove(category.id)" class="btn btn-sm btn-danger ml-1">Delete</Link>

        </td>
    </tr>
</template>
