<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/function.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Hotel Reservation - Home</title>
    <!-- Favicon -->
    <link rel="icon" href="/hotel-reservation-template/assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Core CSS Libraries -->
    <!-- Bootstrap Core CSS -->
    <link href="/hotel-reservation-template/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="/hotel-reservation-template/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Waves Effect CSS -->
    <link href="/hotel-reservation-template/assets/plugins/node-waves/waves.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="/hotel-reservation-template/assets/plugins/animate-css/animate.css" rel="stylesheet">

    <!-- Wait Me Css -->
    <link href="assets/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Date & Time Picker CSS -->
    <link href="/hotel-reservation-template/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="/hotel-reservation-template/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- WaitMe Loading CSS -->
    <link href="/hotel-reservation-template/assets/plugins/waitme/waitMe.css" rel="stylesheet">

    <!-- Bootstrap Select CSS -->
    <link href="/hotel-reservation-template/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="/hotel-reservation-template/assets/css/style.css" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    
    <!-- Bootstrap DatePicker Css -->
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Theme Styles -->
    <link href="/hotel-reservation-template/assets/css/themes/all-themes.css" rel="stylesheet">

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/hotel-reservation-template/pages/template/index.php">HOTEL RESERVATION</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="/hotel-reservation-template/assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li>
                        <a href="/hotel-reservation-template/pages/template/index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Reservations Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/hotel-reservation-template/pages/reservation/reservation.php">
                                    <i class="material-icons">event</i>
                                    <span>Reservation</span>
                                </a>
                            </li>

                            <li>
                                <a href="/hotel-reservation-template/pages/check-in/checkin.php">
                                    <i class="material-icons">input</i>
                                    <span>Check In</span>
                                </a>
                            </li>
                            <li>
                                <a href="/hotel-reservation-template/pages/check-out/checkout.php">
                                    <i class="material-icons">output</i>
                                    <span>Check Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/hotel-reservation-template/pages/room/room.php">
                            <i class="material-icons">meeting_room</i>
                            <span>Room</span>
                        </a>
                    </li>
                    <li>
                        <a href="/hotel-reservation-template/pages/guest/guest.php">
                            <i class="material-icons">group</i>
                            <span>Guest</span>
                        </a>
                    </li>
                    <li>
                        <a href="/hotel-reservation-template/pages/report/report.php">
                            <i class="material-icons">insert_chart</i>
                            <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="/hotel-reservation-template/pages/user/user.php">
                            <i class="material-icons">person</i>
                            <span>User</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2024 <a href="javascript:void(0);">ZieHotelReservation</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>