<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { reactive, onMounted } from 'vue';
import Swal from 'sweetalert2';
const props = defineProps({
    category: Object,
});

const form = reactive({
    name: null
});

const remove = (id) => {
    console.log(id);

    Swal.fire({
        title: 'Warning!',
        text: 'Are you sure you want to continue? You are about to remove a category and all it\'s products.',
        icon: 'warning',
        showCancelButton:true,
        showConfirmButton:true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes, I\'m sure!',
        confirmButtonColor: '#F00',
        reverseButtons: true,
    }).then((value)=>{
        if(value.isConfirmed){
            Inertia.delete(route('category.destroy',{category:id}),form);
        }
    });
}

onMounted(()=>{
    form.id = props.category.id;
});

</script>
<template>
    <tr>
        <td>{{category.id}}</td>
        <td>{{category.name}}</td>
        <td>{{category.products_count}}</td>
        <td>
            <Link :href="route('product.productbycategory',{category:category.id})" class="btn btn-sm btn-primary">Show</Link>
            <Link :href="route('category.edit',{category:category.id})" class="btn btn-sm btn-warning">Edit</Link>
            <Link @click="remove(category.id)" class="btn btn-sm btn-danger">Delete</Link>
        </td>
    </tr>
</template>
