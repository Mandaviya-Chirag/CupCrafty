<?php

$url = urlOf('pages/login');
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: $url");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CupCrafty</title>
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/typicons/typicons.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/js/select.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= urlOf('assets/css/vertical-layout-light/style.css') ?>">
    <link rel="shortcut icon" href="<?= urlOf('assets/images/faces/face8.png') ?>" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="<?= urlOf('#') ?>">
                        <img src="<?= urlOf('assets/images/logo1.png') ?>" alt="logo" />
                    </a>
                    <!-- <a class="navbar-brand brand-logo-mini" href="<?= urlOf('assets/index.html') ?>">
                        <img src="<?= urlOf('assets/images/logo-mini.svg') ?>" alt="logo" />
                    </a> -->
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Welcome Back ! <span class="text-black fw-bold">Chirag Mandaviya</span></h1>
                        <h3 class="welcome-sub-text">"Coffee Crafted with Care"</h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="<?= urlOf('assets/images/faces/face8.png') ?>"
                                alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                            </div>
                            <a class="dropdown-item" href="<?= urlOf('pages/users')?>"><i
                            class="dropdown-item-icon mdi mdi-account-multiple-outline text-primary me-2"></i>All Users</a>
                            <a class="dropdown-item" href="<?= urlOf('api/logout') ?>" ><i
                            class="dropdown-item-icon mdi mdi-power text-primary me-2 "></i>Log-Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
