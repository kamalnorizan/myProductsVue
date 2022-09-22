<script setup>

defineProps({
    msg:String,
    type:String
});


</script>
<template>
    <div :class="type">{{msg}}</div>
</template>
