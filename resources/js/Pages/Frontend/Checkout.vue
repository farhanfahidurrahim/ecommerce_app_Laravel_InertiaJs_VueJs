<template>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <form @submit.prevent="submit" action="" method="POST">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Full Name</label>
                                <input v-model="form.name" class="form-control" type="text" placeholder="Enter Full Name">
                                <div v-if="errors.name" style="color: red;">{{ errors.name }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input v-model="form.email" class="form-control" type="email" placeholder="Enter Valid Email">
                                <div v-if="errors.email" style="color: red;">{{ errors.email }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input v-model="form.phone" class="form-control" type="tel" placeholder="Enter Phone No">
                                <div v-if="errors.phone" style="color: red;">{{ errors.phone }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input v-model="form.address" class="form-control" type="text" placeholder="Enter Full Address">
                                <div v-if="errors.address" style="color: red;">{{ errors.address }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select v-model="form.country" class="custom-select">
                                    <option selected value="bangladesh">Bangladesh</option>
                                    <option>India</option>
                                    <option>USA</option>
                                    <option>China</option>
                                    <option>Australia</option>
                                </select>
                                <div v-if="errors.country" style="color: red;">{{ errors.country }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input v-model="form.city" class="form-control" type="text" placeholder="Enter City">
                                <div v-if="errors.city" style="color: red;">{{ errors.city }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input v-model="form.district" class="form-control" type="text" placeholder="Enter District">
                                <div v-if="errors.district" style="color: red;">{{ errors.district }}</div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Postal Code</label>
                                <input v-model="form.postal_code" class="form-control" type="number" placeholder="Enter Postal Code">
                                <div v-if="errors.postal_code" style="color: red;">{{ errors.postal_code }}</div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Create an account</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse mb-5" id="shipping-address">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                        <div class="bg-light p-30">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="John">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="Doe">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="example@email.com">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="+123 456 789">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" placeholder="123 Street">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control" type="text" placeholder="123 Street">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="New York">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="New York">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="123">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 1</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 2</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 3</p>
                                <p>$150</p>
                            </div>
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>${{ cartSubTotal }}</h6>
                            </div>
                            <!-- <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div> -->
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>${{ cartSubTotal }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input v-model="form.payment_method" value="cod" type="radio" class="custom-control-input" name="cod" id="paypal">
                                    <label class="custom-control-label" for="paypal">Cash On Delivery</label>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div> -->
                            <button type="submit" :disabled="form.processing" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->
</template>
<script>
import FrontendLayout from '../../Shared/FrontendLayout.vue';
export default {
    layout: FrontendLayout,
    props: {
        errors: Object,
        cartSessions: Object,
        cartSubTotal: String,
    }
}
</script>
<script setup>
import { Link, router } from '@inertiajs/vue3';
import { reactive } from 'vue';

const form = reactive({
    name: null,
    email: null,
    phone: null,
    address: null,
    country: null,
    city: null,
    district: null,
    postal_code: null,
    payment_method: null,
})
function submit(){
    router.post('/order-place',form)
}
</script>
<style>

</style>
