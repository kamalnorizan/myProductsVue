<script setup>


defineProps({
   product: Object,
});
</script>
<template>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h3>{{product.name}} - {{product.price}}</h3>
            </div>
        </div>
    </div>
</template>
