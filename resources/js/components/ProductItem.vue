<script setup>
import { Inertia } from '@inertiajs/inertia';
import Swal from 'sweetalert2';
defineProps({
   product: Object,
});

const remove = (product_id) => {
    Swal.fire({
        title: 'Warning!',
        text: 'Are you sure you want to continue? You are about to remove this product',
        icon: 'warning',
        showCancelButton:true,
        showConfirmButton:true,
        cancelButtonText: 'No',
        confirmButtonText: 'Yes, I\'m sure!',
        confirmButtonColor: '#F00',
        reverseButtons: true,
    }).then((value)=>{
        if(value.isConfirmed){
            Inertia.delete(route('product.destroy', {product: product_id}));
        }
    });
}
</script>
<template>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h3>{{product.name}} - {{product.price}}</h3>
                <button @click="remove(product.id)" class="btn btn-sm btn-danger float-right mt-2">Remove</button>
            </div>
        </div>
    </div>
</template>
