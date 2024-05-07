<?php
require '../includes/init.php';
?>

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
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="<?= urlOf('assets/images/faces/face8.png') ?>" alt="logo">
                        </div>
                        <h4 class="fw-dark">CupCrafty</h4>
                        <h6 class="fw-light">Hello! let's get started</h6>
                        <form class="pt-3">
                            <div class="row">
                                <label class="col-md-2 col-form-label">Name</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="Name"
                                    placeholder="Enter your Username" autofocus>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">Password</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="Password"
                                    placeholder="Enter your Password">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="button" onclick="sendData()" >Log
                                    In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include pathOf('includes/script.php');
?>

<script>
    function sendData() {
        var data = {
            Name: $('#Name').val(),
            Password: $('#Password').val()
        }

        $.post('../api/login.php', data, function (response) {
            console.log(response);
            if (response.success !== true)
                return;

            window.location.href = '../index';
        });
    }
</script>

<?php
include pathOf('includes/pageEnd.php');
?>