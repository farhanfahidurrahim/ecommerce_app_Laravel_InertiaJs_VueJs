<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span>
                    Create Category
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Category/Create
                            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Default form</h4>
                            <p class="card-description">Basic form layout</p> -->
                            <form class="forms-sample" @submit.prevent="submit" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="sl-position">Category Name</label>
                                    <input type="text" v-model="form.category_name" id="category_name" class="form-control"
                                        placeholder="Enter Name" />
                                    <div v-if="errors.category_name" style="color: red;">{{ errors.category_name }}</div>
                                </div>

                                <button type="submit" :disabled="form.processing" class="btn btn-gradient-primary me-2">
                                    Submit
                                </button>
                                <Link href="/category" class="btn btn-light">Back</Link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AdminLayout from '../../../Shared/AdminLayout.vue';
export default {
    layout: AdminLayout,
    props: {
        errors: Object
    }
}
</script>
<script setup>
import { Link, router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const form = reactive({
    category_name: null
})

function submit() {
    router.post('/category/store', form)
}
</script>
<style lang="">

</style>
