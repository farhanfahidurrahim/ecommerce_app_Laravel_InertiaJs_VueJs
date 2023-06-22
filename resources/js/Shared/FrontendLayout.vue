<template>
    <head>
        <meta charset="utf-8">
        <title>MultiShop - Online Shop Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
    </head>

    <body>
        <FrontendTopbar/>

        <FrontendNavbar/>
        <slot />

        <FrontendFooter/>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    </body>
</template>
<script>
import FrontendTopbar from './Frontend/FrontendTopbar.vue';
import FrontendNavbar from './Frontend/FrontendNavbar.vue';
import FrontendFooter from './Frontend/FrontendFooter.vue';
export default {
    components: { FrontendTopbar, FrontendNavbar, FrontendFooter },
}
</script>
<!-- <script setup>
import FrontendTopbar from './Frontend/FrontendTopbar.vue';
import FrontendNavbar from './Frontend/FrontendNavbar.vue';
import FrontendFooter from './Frontend/FrontendFooter.vue';

defineOptions({ components: FrontendTopbar, FrontendNavbar, FrontendFooter })
</script> -->
<style>

</style>
