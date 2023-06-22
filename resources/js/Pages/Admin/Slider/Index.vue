<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Sliders
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
                    <Link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/slider/create">Create</Link>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Slider Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Btn Name</th>
                                <th>Btn Link</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="slider in sliders" :key="slider.id">
                                <td> {{ slider.id }} </td>
                                <td> {{ slider.title }} </td>
                                <td>{{ slider.description.split(' ').slice(0, 10).join(' ') }}</td>
                                <td> <img :src="'/storage/'+slider.image"/> </td>
                                <td> {{ slider.btn_name }} </td>
                                <td> {{ slider.btn_link }} </td>
                                <td> {{ slider.position }} </td>
                                <td>
                                    <span v-if="slider.status==true" :class="'badge badge-success'">Active</span>
                                    <span v-else :class="'badge badge-danger'">Block</span>
                                </td>
                                <td>
                                    <Link class="btn btn-primary btn-sm" :href="`/slider/${slider.id}/edit`">Edit</Link> |
                                    <Link class="btn btn-danger btn-sm" @click="destroy(`${slider.id}`)" as="button">Delete</Link>
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
    import AdminLayout from "../../../Shared/AdminLayout.vue"
    export default {
        layout: AdminLayout,
        props:{
            sliders: Object
        },
        methods:{
            destroy(id){
                if (confirm('Are you sure want to delete?')) {
                    this.$inertia.post(`/slider/${id}/delete`)
                }
            }
        },
    };
</script>

<script setup>
    import { Link } from '@inertiajs/vue3'
</script>

<style>
</style>
