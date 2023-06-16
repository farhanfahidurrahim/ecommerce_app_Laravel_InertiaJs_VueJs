<template>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <AdminNavVue />
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <AdminSidebarVue />
        <!-- partial -->
        <slot />
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </body>
</template>
<script>
import AdminSidebarVue from './AdminSidebar.vue';
import AdminNavVue from './AdminNavbar.vue';

export default {
    components: { AdminSidebarVue, AdminNavVue },
};
</script>
