<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>{{ env('APP_NAME') }} – @yield('page-title')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('../assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('../assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('../assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('../assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('../assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="/">
                            <img src="{{ asset('../assets/images/brand/logo.png') }}"
                                class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('../assets/images/brand/logo-3.png') }}"
                                class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block">
                            <input type="text" class="form-control" id="typehead"
                                placeholder="Search for results...">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon"
                                                data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex country">
                                            <a class="nav-link icon text-center" data-bs-target="#country-selector"
                                                data-bs-toggle="modal">
                                                <i class="fe fe-globe"></i><span
                                                    class="fs-16 ms-2 d-none d-xl-block">English</span>
                                            </a>
                                        </div>
                                        <!-- COUNTRY -->
                                        <div class="d-flex country">
                                            <a class="nav-link icon theme-layout layout-setting">
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                            </a>
                                        </div>
                                        <!-- Theme-Mode -->
                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        <!-- FULL-SCREEN -->

                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                                class="nav-link leading-none d-flex">
                                                <img src="{{ auth()->user()->avatar ? url(auth()->user()->avatar) : asset('assets/profile.svg') }}"
                                                    alt="profile-user"
                                                    class="avatar profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">
                                                            {{ auth()->user()->name }}</h5>
                                                        <small class="text-muted">{{ auth()->user()->email }}</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="profile.html">
                                                    <i class="dropdown-icon fe fe-user"></i> Profile
                                                </a>
                                                <a class="dropdown-item" href="email-inbox.html">
                                                    <i class="dropdown-icon fe fe-mail"></i> Inbox
                                                    <span class="badge bg-danger rounded-pill float-end">5</span>
                                                </a>
                                                <a class="dropdown-item" href="lockscreen.html">
                                                    <i class="dropdown-icon fe fe-lock"></i> Lockscreen
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.user.logout') }}">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="/">
                            <img src="{{ asset('../assets/images/brand/logo.png') }}"
                                class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('../assets/images/brand/logo-1.png') }}"
                                class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{ asset('../assets/images/brand/logo-2.png') }}"
                                class="header-brand-img light-logo" alt="logo">
                            <img src="{{ asset('../assets/images/brand/logo-3.png') }}"
                                class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide"
                                    href="{{ url('admin/') }}"><i class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">Dashboard</span></a>
                            </li>
                            <li class="sub-category">
                                <h3>UI Kit</h3>
                            </li>
                            <li class="slide {{ Request::is('admin/users*') ? 'is-expanded' : '' }}"">
                                <a class="side-menu__item {{ Request::is('admin/users*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-user"></i><span
                                        class="side-menu__label">Users</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                                    <li><a href="{{ url('admin/users/') }}"
                                            class="slide-item {{ Request::is('admin/users*') ? 'active' : '' }}">
                                            Manage Users</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <br>

                        @include('admin.includes.alert')
