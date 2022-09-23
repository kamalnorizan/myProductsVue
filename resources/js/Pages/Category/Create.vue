<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import {Link, Head} from '@inertiajs/inertia-vue3'

const props = defineProps({
    category: {
        type: Object,
        default: {
            name:null
        }
    },
});

const form = reactive({
    name: null
});

const submit =  () => {
    if(props.category.name==null){
        Inertia.post('/category', form);
    }else{
        Inertia.patch(route('category.update',{category:props.category.id}), form);
    }
};

onMounted(()=>{
    form.name = props.category.name;
});

</script>
<template>

    <Head title="Create Category"></Head>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2>
                New Category {{form.name}}
            </h2>
        </template>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                <label for="name">Name</label>
                                <input v-model="form.name" type="text" class="form-control" name="name" id="name" >
                                </div>
                                <button type="submit" class="btn btn-info mt-2 float-right"><span v-if="category.name!=null">Update</span><span v-if="category.name==null">Create</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
