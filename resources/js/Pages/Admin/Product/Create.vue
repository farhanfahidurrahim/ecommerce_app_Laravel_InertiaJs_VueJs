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
                                    <div v-if="errors.product_name" style="color: red;">{{ errors.product_name }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Product Image</label>
                                    <input type="file" @input="form.product_image = $event.target.files[0]" class="form-control" accept="image/*"/>
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <div v-if="errors.product_image" style="color: red;">{{ errors.product_image }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Select Product Brand</label>
                                    <select v-model="form.brand_id" class="form-control" value="">
                                        <option disabled>Choose Brand</option>
                                        <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
                                    </select>
                                    <div v-if="errors.brand_id" style="color: red;">{{ errors.brand_id }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Select Product Category</label>
                                    <select v-model="form.category_id" class="form-control" value="" id="category">
                                        <option disabled>Choose Category</option>
                                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                    </select>
                                    <div v-if="errors.category_id" style="color: red;">{{ errors.category_id }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Product Quantity</label>
                                    <input type="number" v-model="form.qty" class="form-control" placeholder="Enter Quantity">
                                    <div v-if="errors.qty" style="color: red;">{{ errors.qty }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Price</label>
                                    <input type="number" pattern='[0-9]+(\\.[0-9][0-9]?)?' v-model="form.price" class="form-control" placeholder="Enter Price">
                                    <div v-if="errors.price" style="color: red;">{{ errors.price }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Sale Price</label>
                                    <input type="number" pattern='[0-9]+(\\.[0-9][0-9]?)?' v-model="form.sale_price" class="form-control" placeholder="Enter Sale Price">
                                    <div v-if="errors.sale_price" style="color: red;">{{ errors.sale_price }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Description</label>
                                    <textarea v-model="form.description" class="form-control"></textarea>
                                    <div v-if="errors.description" style="color: red;">{{ errors.description }}</div>
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
    layout: AdminLayout,
    props: {
        errors: Object,
        brands: Object,
        categories: Object
    }
}
</script>
<script setup>
import { Link, router } from '@inertiajs/vue3'
import { reactive} from 'vue'

const form = reactive({
    product_name:null,
    product_image:null,
    brand_id:null,
    category_id:null,
    qty:null,
    price:null,
    sale_price:null,
    description:null,
})

function submit(){
    router.post('/product/store',form)
}
</script>
