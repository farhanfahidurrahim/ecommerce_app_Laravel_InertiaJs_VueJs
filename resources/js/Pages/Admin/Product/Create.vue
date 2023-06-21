<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span>
                    Create Product
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Product/Create
                            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Default form</h4> <p class="card-description">Basic form layout</p> -->
                            <form @submit.prevent="submit" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="sl-position">Product Name</label>
                                    <input type="text" v-model="form.product_name" class="form-control" placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label for="sl-position">Product Image</label>
                                    <input type="file" class="form-control" v-on:change="form.product_image" accept="image/*">
                                    <!-- <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <div v-if="errors.brand_image" style="color: red;">{{ errors.brand_image }}</div> -->
                                </div>

                                <div class="form-group">
                                    <label for="sl-position">Price</label>
                                    <input type="number" v-model="form.price" class="form-control" placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Sale Price</label>
                                    <input type="number" v-model="form.sale_price" class="form-control" placeholder="Enter Sale Price">
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Description</label>
                                    <textarea v-model="form.description" class="form-control"></textarea>
                                </div>
                                <button type="submit" :disabled="form.processing" class="btn btn-gradient-primary me-2">
                                    Submit
                                </button>
                                <Link href="/product" class="btn btn-light">Back</Link>
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
    layout: AdminLayout
}
</script>
<script setup>
import { Link, router } from '@inertiajs/vue3'
import { reactive} from 'vue'

const form = reactive({
    product_name:null,
    product_image:null,
    price:null,
    sale_price:null,
    description:null,
})

function submit(){
    router.post('/product/store',form)
}
</script>
