<script>
export default {
    props: {
        category: Object,
    }
}
</script>
<template>
<tr>
    <td>{{category.id}}</td>
    <td>{{category.name}}</td>
    <td>{{category.products_count}}</td>
    <td><button class="btn btn-primary">Show</button></td>
</tr>
</template>
