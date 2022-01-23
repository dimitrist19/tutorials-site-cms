<?php
require '../config.php';

session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
?>
<?php
$page = 'backup';
require_once 'templates/header.tpl.php';
?>
<?php
function checkForMessage()
{
    if (isset($_GET['success'])) {
        echo '<p class="alert alert-success">Restore Completed!</p>';
    } else if (isset($_GET['error'])) {
        echo '<p class="alert alert-danger">Something went wrong! Please try again or ask for help.</p>';
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Backup & Restore</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Backup & Restore</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Backup</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <a href="includes/export.php"><p class="btn btn-primary">Create Backup</p></a>
                            <h5>Restore</h5>
                            <?=checkForMessage()?>
                            <form action="includes/import.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" required>
                                <input type="submit" value="Import" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
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

