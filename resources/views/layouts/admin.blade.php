<!DOCTYPE html>
<html lang="en">

<head>
    <title>Culinary Crafts - Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Culinary Crafts" />
    <meta name="author" content="Culinary Crafts" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    @stack('styles')
    
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">

            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="{{ route('dashboard') }}">
                            <img src="{{ asset('img/logo.png') }}" class="img-fluid logo-desktop" alt="logo" />
                            <img src="{{ asset('img/logo.png') }}" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            
                            <ul class="navbar-nav nav-right ml-auto">
                                
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('img/chef-profile.jpg') }}" alt="avtar-img">
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">{{ auth()->user()->name }}</h4>
                                                    <small class="text-white">{{ auth()->user()->email }}</small>
                                                </div>
                                                <a href="#" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                                class="zmdi zmdi-power"></i></a>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->

            <!-- begin app-container -->
            <div class="app-container">

                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Menu</li>
                            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboard</span>
                                </a> 
                            </li>
                            
                            <li class="{{ request()->routeIs('recipe-categories*', 'recipe-items*') ? 'active' : '' }}">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">Recipe Management</span></a>
                                <ul aria-expanded="false">
                                    <li class="scoop-hasmenu {{ request()->routeIs('recipe-categories*') ? 'active' : '' }}">
                                        <a class="has-arrow" href="javascript: void(0);">Category</a>
                                        <ul aria-expanded="false">
                                            <li class="{{ request()->routeIs('recipe-categories.create') ? 'active' : '' }}"> <a href="{{ route('recipe-categories.create') }}">Create Category</a> </li>
                                            <li class="{{ request()->routeIs('recipe-categories.index') ? 'active' : '' }}"> <a href="{{ route('recipe-categories.index') }}">List Categories</a> </li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('recipe-items.create') ? 'active' : '' }}"> <a href="{{ route('recipe-items.create') }}">Create Recipe</a> </li>
                                    <li class="{{ request()->routeIs('recipe-items.index') ? 'active' : '' }}"> <a href="{{ route('recipe-items.index') }}">List Recipes</a> </li>
                                </ul>
                            </li>
                            <li class="{{ request()->routeIs('blog-items*') ? 'active' : '' }}">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">Blog Management</span></a>
                                <ul aria-expanded="false">
                                    <li class="{{ request()->routeIs('blog-items.create') ? 'active' : '' }}"> <a href="{{ route('blog-items.create') }}">Create Blog</a> </li>
                                    <li class="{{ request()->routeIs('blog-items.index') ? 'active' : '' }}"> <a href="{{ route('blog-items.index') }}">List Blogs</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">User Management</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="javascript: void(0);">Create User</a> </li>
                                    <li> <a href="javascript: void(0);">List Users</a> </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Orders</span>
                                </a> 
                            </li>
                            <li class="">
                                <a href="" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Tickets</span>
                                </a> 
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">Setting</span></a>
                                <ul aria-expanded="false">
                                    <li> <a href="javascript: void(0);">General Setting</a> </li>
                                    <li> <a href="javascript: void(0);">Payment Method</a> </li>
                                </ul>
                            </li>
                            <li class="sidebar-banner p-4 text-center m-3 d-block rounded">
                                
                            </li>
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->

                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    @yield('content')
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->

            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright {{ Date('Y') }}. All rights reserved.</p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
    <!-- custom app -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')

    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success("{{ session('success') }}")
    
        @elseif (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
    
            toastr.error("{{ session('error') }}")
        @endif
    </script>
</body>


</html>