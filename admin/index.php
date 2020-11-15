<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
include '../config.php';
$query = "SELECT COUNT(*) FROM tutorials";
$resulttut = mysqli_query($conn,$query);
$rows = mysqli_fetch_row($resulttut);
$result = mysqli_query($conn, "SELECT * FROM users WHERE id={$_SESSION['id']}");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Tutorials Site CMS | Admin Area</title>
        <link rel="icon" href="https://icon-library.com/images/tutorial-icon-png/tutorial-icon-png-19.jpg">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="gettingstarted.php" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> Getting Started with 'Tutorials Site V1'
                            </a>
                    </li>
                    <li><a href="logout.php"><button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index.php" class="brand-link">
                    <img src="https://icon-library.com/images/tutorial-icon-png/tutorial-icon-png-19.jpg" alt="Icon" class="brand-image"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>Tutorials Site</b> CMS</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="build/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="profile.php" class="d-block"><?= $row['fullname']?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview menu-closed">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        General Settings
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="config.php" class="nav-link">
                                            <i class="fa fa-tools nav-icon"></i>
                                            <p>Configuration</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="profile.php" class="nav-link">
                                            <i class="fa fa-user-edit nav-icon"></i>
                                            <p>User Settings</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview menu-closed">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fa fa-info-circle"></i>
                                    <p>
                                        Tutorials
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="tutorials.php" class="nav-link">
                                            <i class="fa fa-eye nav-icon"></i>
                                            <p>View All Tutorials</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="addnew.php" class="nav-link">
                                            <i class="fa fa-plus-circle nav-icon"></i>
                                            <p>Add A New Tutorial</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="vpcustomization.php" class="nav-link active">
                                    <i class="nav-icon fas fa-palette"></i>
                                    <p>
                                        VP Customization
                                        <span class="right badge badge-success">NEW</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview menu-closed">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-question"></i>
                                    <p>
                                        Help
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="gettingstarted.php" class="nav-link">
                                            <i class="fa fa-book nav-icon"></i>
                                            <p>Getting Started</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="support.php" class="nav-link">
                                            <i class="fa fa-envelope nav-icon"></i>
                                            <p>Support</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="..\index.php" class="nav-link active" target="_blank">
                                    <i class="nav-icon fas fa-external-link-square-alt"></i>
                                    <p>
                                        Your Live Site
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?= $rows[0] ?></h3>

                                                <p>Tutorials</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-book-reader"></i>
                                            </div>
                                            <a href="tutorials.php" class="small-box-footer">
                                                Manage your tutorials <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3><i class="fa fa-question"></i></h3>

                                                <p>Have questions?</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-headset"></i>
                                            </div>
                                            <a href="support.php" class="small-box-footer">
                                                Ask for help <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <!-- ./col -->
                                </div>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">

                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2020 <a href="https://github.com/dimitrist19">Dimitris T.</a></strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>
