<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href class="brand-link">
            <img src="storage/image/Control-Panel-icon.png" alt="Logo" class="brand-image" />
            <span class="brand-text font-weight-light">{{ $t('Admin Panel') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="storage/image/images.jpeg"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <a href class="d-block">
                        <p>{{ $t('Welcome message', { name: 'HA' }) }}</p>
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library-->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                <i class="right fas fa-angle-left"></i>
                                {{ $t('Stories') }}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/stories/list" class="nav-link">
                                    <p>{{ $t('Lists') }}</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="/users" class="nav-link">
                            <p>
                                <i class="fas fa-users"></i>
                                {{ $t('User') }}
                            </p>
                        </router-link>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
