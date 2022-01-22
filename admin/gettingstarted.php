<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
include '../config.php';
?>
<?php
$page = 'getting_started_guide';
require_once 'templates/header.tpl.php';
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"><b>Getting Started</b></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Getting Started</li>
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
                                <div class="card">
                                    <h5 class="card-header">Welcome! This is a short guide on how to get started with 'Tutorials Site CMS V<?= $version?>':</h5>
                                    <div class="card-body">
                                        <p>1) For security reasons change the admin's password <a href="profile.php">here</a></p>
                                        <p>2) Then go to <a href="config.php">Configuration</a> and replace name, logo, favicon etc. with your preferred one's.</p>
                                        <p>3) You can add tutorials at the the <a href="tutorials.php">Tutorials Section</a></p>
                                        <p><b>You're ready to go! You may start linking your tutorials url with your site so clients can watch your video tutorials!</b></p>
                                        <font size='extra-small' color='grey'>TIP: You can make modifications at the script and customize it for your own needs!</font>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php
            require_once 'templates/footer.tpl.php';
            ?>
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
