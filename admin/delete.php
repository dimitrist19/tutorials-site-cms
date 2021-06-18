<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
?>
<?php
include '../config.php';
if (!isset($_GET['id'])) {

    header('Location: tutorials.php');

    exit();
}
session_start();
$result = mysqli_query($conn, "SELECT * FROM tutorials WHERE id = {$_GET['id']}");
$row = mysqli_fetch_array($result);

mysqli_close($conn);
?>
<?php
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connection failed: %s\n" . $conn->error);

// Escape variable
$id = $conn->real_escape_string($_GET['id']);

if (count($_POST) > 0) {
    $sql = "DELETE FROM tutorials WHERE id = {$_POST['id']}";
    mysqli_query($conn, "ALTER TABLE tutorials AUTO_INCREMENT = 1");
}
?>
<?php
$page = 'delete';
require_once 'templates/header.tpl.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tutorials</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="tutorials.php">Tutorials</a></li>
                        <li class="breadcrumb-item active">Delete</li>
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
                    <?php
                    if (count($_POST) > 0) {
                        if ($conn->query($sql) === TRUE) {
                            echo '<h1 class="alert alert-success">Success!</h1>';
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    } else {
                        ?>
                        <form method="post" class="card">
                            <div class="card-body">
                                <input value="<?= $_GET['id'] ?>" name="id" hidden>
                                <div class="alert alert-danger">
                                    <h5>Are you sure you want to delete this Tutorial?</h5>
                                </div>
                                <p><b>Tutorial Title:</b><?= $row['title'] ?><p>
                                    <input type="checkbox" required> Are you sure?</input></p>
                                <p><input type="submit" value="Delete" class="btn btn-danger"></p>
                            </div>
                        </form>
                        <?php
                    }
                    ?>
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
