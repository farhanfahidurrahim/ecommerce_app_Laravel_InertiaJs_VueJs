<template>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">

        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="/admin_assets/images/faces/face1.jpg" alt="profile" />
                        <span class="login-status online"></span>
                        <!-- change to offline or busy as needed -->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">David Grey. H</span>
                        <span class="text-secondary text-small">Project Manager</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <Link class="nav-link" href="/dashboard">Dashboard
                <!-- <span class="menu-title"></span>
          <i class="mdi mdi-home menu-icon"></i> -->
                </Link>
            </li>
            <!-- <li class="nav-item">
        <a
          class="nav-link"
          data-bs-toggle="collapse"
          href="#ui-basic"
          aria-expanded="false"
          aria-controls="ui-basic"
        >
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html"
                >Buttons</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html"
                >Typography</a
              >
            </li>
          </ul>
        </div>
      </li> -->
            <li class="nav-item">
                <Link class="nav-link" href="/slider">
                <span class="menu-title">Slider</span>
                <i class="mdi mdi-contacts menu-icon"></i>
                </Link>
            </li>

            <li class="nav-item">
                <Link class="nav-link" href="/brand">
                <span class="menu-title">Brand</span>
                <i class="mdi mdi-contacts menu-icon"></i>
                </Link>
            </li>

            <li class="nav-item">
                <Link class="nav-link" href="/category">
                <span class="menu-title">Category</span>
                <i class="mdi mdi-contacts menu-icon"></i>
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style></style>
