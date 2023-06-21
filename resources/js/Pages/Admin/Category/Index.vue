<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Categories
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
                    <Link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/category/create">Create</Link>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Category Name</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <td>{{ category.id }}</td>
                                <td>{{ category.name }}</td>
                                <td>
                                    <Link class="btn btn-primary btn-sm" :href="`/category/${category.id}/edit`">Edit</Link>
                                    <Link class="btn btn-danger btn-sm" @click="destroy(`${category.id}`)" as="button">Delete</Link>
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
            categories: Object
        },
        methods:{
            destroy(id){
                if (confirm('Are you sure want to delete?')) {
                    this.$inertia.post(`/category/${id}/delete`)
                }
            }
        }
    }
</script>
<script setup>
    import { Link } from '@inertiajs/vue3';
</script>
<style>

</style>
