<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('assets/admin-template') ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->

    <link href="<?= base_url('assets/admin-template') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/admin-template') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/admin-template') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/admin-template') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/admin-template') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/admin-template') ?>/build/css/custom.min.css" rel="stylesheet">

    <style>
        :root {

            scroll-behavior: smooth;
        }

        #notification {

            animation: fade 15s infinite;
        }

        @keyframes fade {
            50% {
                opacity: 0.00;
            }
        }
    </style>

<script src="https://kit.fontawesome.com/41b3ebfb1f.js" crossorigin="anonymous"></script>
</head>