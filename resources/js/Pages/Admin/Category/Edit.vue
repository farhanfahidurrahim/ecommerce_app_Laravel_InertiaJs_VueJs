<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span>
                    Edit Brand
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Brand/Edit
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
                            <form class="forms-sample" @submit.prevent="submit" accept="multipart/form-data">
                                <div class="form-group">
                                    <label for="sl-position">Brand Name</label>
                                    <input type="text" v-model="form.category_name" class="form-control" id="sl-position"/>
                                    <div v-if="errors.category_name" style="color: red;">{{ errors.category_name }}</div>
                                </div>
                                <button type="submit" :disabled="form.processing" class="btn btn-gradient-primary me-2">
                                    Update
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
import AdminLayout from "../../../Shared/AdminLayout.vue";
export default {
    layout: AdminLayout,
    props: {
        errors: Object,
        category: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                category_name: this.category.name ?? null,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(`/category/${this.category.id}/update`);
        },
    },
};
</script>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style></style>
