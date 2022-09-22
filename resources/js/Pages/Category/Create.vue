<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import {Link, Head} from '@inertiajs/inertia-vue3'

defineProps({
    categories: Array,
});

const form = reactive({
    name: null
});

const submit =  () => {
    Inertia.post('/category', form);
};

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
