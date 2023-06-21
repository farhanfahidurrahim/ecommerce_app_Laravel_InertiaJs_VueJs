<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Products
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="card">
                <div class="card-body">
                    <Link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/product/create">Create</Link>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Product Name </th>
                                <th> Image </th>
                                <th> Qty </th>
                                <th> Price </th>
                                <th> Sale Price </th>
                                <th> Description </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td>{{ product.id }}</td>
                                <td>{{ product.name }}</td>
                                <td> <img :src="'/storage/'+product.image"> </td>
                                <td>{{ product.qty }}</td>
                                <td>{{ product.price }}</td>
                                <td>{{ product.sale_price }}</td>
                                <td>{{ product.description }}</td>
                                <td>
                                    <Link class="btn btn-primary btn-sm" :href="`/product/${product.id}/edit`">Edit</Link>
                                    <Link class="btn btn-danger btn-sm" @click="destroy(`${product.id}`)" as="button">Delete</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AdminLayout from '../../../Shared/AdminLayout.vue';
    export default {
        layout: AdminLayout,
        props:{
            products: Object
        },
        methods:{
            destroy(id){
                if (confirm('Are you sure want to delete?')) {
                    this.$inertia.post(`product/${id}/delete`)
                }
            }
        }
    }
</script>
<script setup>
    import { Link } from '@inertiajs/vue3';
</script>
