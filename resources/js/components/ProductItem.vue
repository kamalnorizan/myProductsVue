<script setup>
import { Inertia } from '@inertiajs/inertia';

defineProps({
   product: Object,
});

const remove = (product_id) => {
    Inertia.delete(route('product.destroy', {product: product_id}));
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
