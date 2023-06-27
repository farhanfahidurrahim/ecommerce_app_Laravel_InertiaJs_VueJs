<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Orders
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
                    <!-- <Link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/order/create">Create</Link> -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Order Number </th>
                                <th> User Id </th>
                                <th> Total </th>
                                <th> Item Count </th>
                                <th> Payment Method </th>
                                <th> Payment Status </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in orders" :key="order.id">
                                <td>{{ order.id }}</td>
                                <td>{{ order.order_number }}</td>
                                <td>{{ order.user_id }}</td>
                                <td>{{ order.grand_total }}</td>
                                <td>{{ order.item_count }}</td>
                                <td>{{ order.payment_method }}</td>
                                <td>{{ order.payment_status }}</td>
                                <td>
                                    <select v-model="order.status" class="form-control">
                                        <option v-if="order.status === 'pending'" selected value="pending">Pending</option>
                                        <option v-else-if="order.status === 'processing'" selected value="processing">Processing</option>
                                        <option v-else-if="order.status === 'completed'" selected value="completed">Completed</option>
                                        <option v-else value="cancel">Cancel</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#shippingInfoModal">
                                        Shipping Info
                                    </button> |
                                    <Link class="btn btn-primary btn-sm" :href="`/product/${order.id}/edit`">Edit</Link> |
                                    <Link class="btn btn-danger btn-sm" @click="destroy(`${order.id}`)" as="button">Delete</Link>
                                </td>

                                <!-- View Shipping Modal -->
                                <div class="modal fade" id="shippingInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">View Shipping Details: {{ order.order_number }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- <Link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/order/create">Create</Link> -->
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> Shipping Name </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> Address </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>{{ order.name }}</td>
                                                            <td>{{ order.email }}</td>
                                                            <td>{{ order.phone }}</td>
                                                            <td>{{ order.address }}</td>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> Country </th>
                                                                <th> City </th>
                                                                <th> District </th>
                                                                <th> Post Code </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>{{ order.country }}</td>
                                                            <td>{{ order.city }}</td>
                                                            <td>{{ order.district }}</td>
                                                            <td>{{ order.postal_code }}</td>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> Product Image </th>
                                                                <th> Product Qauntity </th>
                                                                <th> Price </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>{{ order.country }}</td>
                                                            <td>{{ order.city }}</td>
                                                            <td>{{ order.district }}</td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Shipping Modal -->

                                <!-- View Product Modal -->
                                <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">View Product Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th> Order Number </th>
                                                                <th> Name </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> Address </th>
                                                                <th> Country </th>
                                                                <th> City </th>
                                                                <th> District </th>
                                                                <th> Post Code </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- End Product Modal -->
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
    props: {
        orders: Object,
    }
}
</script>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
