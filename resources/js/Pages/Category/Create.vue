<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import {Link, Head} from '@inertiajs/inertia-vue3'

const props = defineProps({
    category: Object,
});

const form = reactive({
    name: null
});

const submit =  () => {
    Inertia.post('/category', form);
};

onMounted(()=>{
    console.log(props);
    console.log(form.name);
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
                                <button type="submit" class="btn btn-info mt-2 float-right">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>
