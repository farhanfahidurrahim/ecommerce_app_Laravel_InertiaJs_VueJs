<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span>
                    Edit Product
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Product/Edit
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
                                    <label for="sl-position">Product Name</label>
                                    <input type="text" v-model="form.product_name" class="form-control" id="sl-position"/>
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
                                    Update
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
import AdminLayout from "../../../Shared/AdminLayout.vue";
export default {
    layout: AdminLayout,
    props: {
        errors: Object,
        product: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                product_name: this.product.name ?? null,
                product_image: null,
                qty: this.product.qty ?? null,
                price: this.product.price ?? null,
                sale_price: this.product.sale_price ?? null,
                description: this.product.description ?? null,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(`/product/${this.product.id}/update`);
        },
    },
};
</script>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>


<!-- <script setup>
import AdminLayout from "../../../Shared/AdminLayout.vue";
import { Link, router } from '@inertiajs/vue3'
import { reactive} from 'vue'

defineOptions({ layout: AdminLayout })
defineProps({ product: Object,});

const form = reactive({
    name: null,
})

function submit() {
    router.post(`/product/${this.product.id}/update`, form);
}
</script> -->
