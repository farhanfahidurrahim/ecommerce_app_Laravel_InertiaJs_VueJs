<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span>
                    Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Slider/Edit
                            <i class="
                      mdi mdi-alert-circle-outline
                      icon-sm
                      text-primary
                      align-middle
                    "></i>
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
                                    <label for="sl-position">Slider Title</label>
                                    <input type="text" v-model="form.title" class="form-control" id="sl-position"
                                        placeholder="Enter Title" max="10" />
                                    <div v-if="errors.title" style="color: red;">{{ errors.title }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Description</label>
                                    <textarea v-model="form.description" class="form-control" id="sl-position"
                                        placeholder="Enter Description" rows="2"></textarea>
                                    <div v-if="errors.description" style="color: red;">{{ errors.description }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-img">Choose Image</label>
                                    <input type="file" accept="image/*" @input="form.image = $event.target.files[0]"
                                        class="form-control" id="sl-img" />
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <div v-if="errors.image" style="color: red;">{{ errors.image }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Button Name</label>
                                    <input type="text" v-model="form.btn_name" class="form-control" id="sl-position"
                                        placeholder="Enter Btn Name"/>
                                    <div v-if="errors.btn_name" style="color: red;">{{ errors.btn_name }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Button Link</label>
                                    <input type="url" v-model="form.btn_link" class="form-control" id="sl-position"
                                        placeholder="Enter Btn Link" />
                                    <div v-if="errors.btn_link" style="color: red;">{{ errors.btn_link }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Position</label>
                                    <input type="number" v-model="form.position" class="form-control"
                                        id="sl-position" placeholder="Enter Position" max="10" />
                                    <div v-if="errors.position" style="color: red;">{{ errors.position }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sl-position">Status</label>
                                    <select v-model="form.status" class="form-control">
                                        <option selected disabled>Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                    <div v-if="errors.status" style="color: red;">{{ errors.status }}
                                    </div>
                                </div>
                                <button type="submit" :disabled="form.processing" class="btn btn-gradient-primary me-2">
                                    Update
                                </button>
                                <Link href="/slider" class="btn btn-light">Back</Link>
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
        slider: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.slider.title ?? null,
                description: this.slider.description ?? null,
                image: null,
                btn_name: this.slider.btn_name ?? null,
                btn_link: this.slider.btn_link ?? null,
                position: this.slider.position ?? null,
                status: this.slider.status ?? null,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(`/slider/${this.slider.id}/update`);
        },
    },
};
</script>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style></style>
