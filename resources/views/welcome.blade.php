<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">   <!--this is for 'error free console'/(vue_devTool)-->
    <title>LADS IMS</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!--must be linked at the Top of All other CSS_files-->
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/js/all.min.js') }}" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

<div id="app">

    <!-----------start_Top_Navbar----------->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topbar" v-show="!($route.path === '/' || $route.path === '/register' || $route.path === '/forget')" style="display: none; background-color: #004080;">
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn" type="button" style="background-color: #007bff; color: white;"><i class="fas fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item" to="/logout">Logout</router-link>   <!--Logout-->
                </div>
            </li>
        </ul>
    </nav> <!--End_Top_Navbar-->

    <!--------------------Left_Navbar------------------------>
    <div id="leftbar" v-show="!($route.path === '/' || $route.path === '/register' || $route.path === '/forget')" style="display: none;">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #004080;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <router-link class="nav-link" to="/home">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Dashboard
                            </router-link>

                            <router-link class="nav-link" to="/pos" style="background-color: #007bff;">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-cash-register"></i></div>
                                <b> POS </b>
                            </router-link>

                            <!-- Supplier -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                                Suppliers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-chevron-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" style="background-color: #007bff;">
                                    <router-link class="nav-link" to="/store-supplier" style="color: white;">Add Supplier</router-link>
                                    <router-link class="nav-link" to="/supplier" style="color: white;">All Suppliers</router-link>
                                </nav>
                            </div>

                            <!-- Categories -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                                Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-chevron-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" style="background-color: #007bff;">
                                    <router-link class="nav-link" to="/store-category" style="color: white;">Add Category</router-link>
                                    <router-link class="nav-link" to="/category" style="color: white;">All Categories</router-link>
                                </nav>
                            </div>

                            <!-- Products -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-chevron-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" style="background-color: #007bff;">
                                    <router-link class="nav-link" to="/store-product" style="color: white;">Add Product</router-link>
                                    <router-link class="nav-link" to="/product" style="color: white;">All Products</router-link>
                                </nav>
                            </div>

                            <!-- Customers -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#LayoutsC" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Customers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-chevron-down"></i></div>
                            </a>
                            <div class="collapse" id="LayoutsC" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" style="background-color: #007bff;">
                                    <router-link class="nav-link" to="/store-customer" style="color: white;">Add Customer</router-link>
                                    <router-link class="nav-link" to="/customer" style="color: white;">All Customers</router-link>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; LADS Africa 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('backend/assets/demo/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('backend/js/scripts.js') }}"></script>

</body>
</html>
