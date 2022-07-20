<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('site.home') }}" class="brand-link">
        <img src="{{ asset('adminassets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vision_commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard </p>
                    </a>
                </li>

                 {{-- Categories --}}
                <li
                    class="nav-item  {{ request()->routeIs('admin.categories.index') || request()->routeIs('admin.categories.create')
                        ? 'menu-open'
                        : '' }} ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}"
                                class="nav-link
                           {{ request()->routeIs('admin.categories.index') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.create') }}"
                                class="nav-link
                            {{ request()->routeIs('admin.categories.create') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>


                 {{-- Products --}}

                <li
                    class="nav-item {{ request()->routeIs('admin.products.index') || request()->routeIS('admin.products.create') ? 'menu-open' : '' }} ">


                    <a href="#" class="nav-link ">
                        <i class="fas fa-heart nav-icon"></i>
                        <p>Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}"
                                class="nav-link
                            {{ request()->routeIs('admin.products.index') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.create') }}"
                                class="nav-link
                            {{ request()->routeIs('admin.products.create') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Products</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Blogs --}}

                <li
                    class="nav-item {{ request()->routeIs('admin.blogs.index') || request()->routeIS('admin.blogs.create') ? 'menu-open' : '' }} ">


                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Blogs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}"
                                class="nav-link
                                {{ request()->routeIs('admin.blogs.index') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Blogs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.create') }}"
                                class="nav-link
                                {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Blog </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Testimonials --}}

                <li
                    class="nav-item {{ request()->routeIs('admin.testimonials.index') || request()->routeIS('admin.testimonials.create')
                        ? 'menu-open'
                        : '' }} ">


                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Testimonials
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.index') }}"
                                class="nav-link
                                    {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Testimonial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.create') }}"
                                class="nav-link
                                    {{ request()->routeIs('admin.testimonials.create') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Testimonial</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- users --}}


                <li class="nav-item">
                    <a href="{{ route('admin.users') }}"
                        class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }} ">

                        <i class="nav-icon fas fa-users"></i>
                        <p> Users </p>

                    </a>
                </li>

                {{-- Roles --}}


                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}"
                        class="nav-link {{ request()->routeIs('admin.roles.index') ? 'active' : '' }} ">

                        <i class="nav-icon fas fa-users"></i>
                        <p>Roles </p>

                    </a>
                </li>

                {{-- Admin --}}

                <li class="nav-item">
                    <a href="{{ route('admin.admins') }}"
                        class="nav-link {{ request()->routeIs('admin.admins') ? 'active' : '' }} ">

                        <i class="nav-icon fas fa-users"></i>
                        <p> Admins </p>

                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
