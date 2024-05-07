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
            </div>
    </div>
    </nav>
<?php
$url = urlOf('pages/login');
if (!isset($_SESSION['loggedIn'])) {
    header("Location: $url");
    exit;
}
?>