<script>

export default {
    props: {
        category: Object,
    },
    methods:{
        show(category){
            console.log(category);
        },
        edit(category){
            console.log('edit');

        },
        delete(category){
            console.log('delete');

        }
    }
}
</script>
<template>
<tr>
    <td class="border-b border-l border-[#E8E8E8] py-5 px-6 text-center">{{category.id}}</td>
    <td class="border-b border-l border-[#E8E8E8] py-5 px-6 text-left">{{category.name}}</td>
    <td class="border-b border-l border-[#E8E8E8] py-5 px-6 text-center">{{category.products_count}}</td>
    <td class="border-b border-l border-[#E8E8E8] py-5 px-6 text-center">
        <button @click="show(category)" class="rounded-md font-semibold ml-2 bg-amber-400 p-2 text-sm shadow-md">Show</button>
        <button @click="edit(category)" class="rounded-md font-semibold ml-2 bg-gray-400 text-white p-2 text-sm shadow-md">Edit</button>
        <button @click="delete(category)" class="rounded-md font-semibold ml-2 bg-red-600 text-white p-2 text-sm shadow-md">Delete</button>
    </td>
</tr>
</template>
