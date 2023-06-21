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


                                <!-- <td>
                                    <Link class="btn btn-primary btn-sm" :href="`/category/${category.id}/edit`">Edit</Link>
                                    <Link class="btn btn-danger btn-sm" @click="destroy(`${category.id}`)" as="button">Delete</Link>
                                </td> -->

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
        layout: AdminLayout
    }
</script>
<script setup>
    import { Link } from '@inertiajs/vue3';
</script>
