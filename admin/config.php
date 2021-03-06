<?php
session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
?>
<?php
include '../config.php';
session_start();
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE config SET hostname='" . $_POST["hostname"] . "', homeurl='" . $_POST["home"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET logourl='" . $_POST["logourl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET faviconurl='" . $_POST["faviconurl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET supporturl='" . $_POST["supporturl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET knowledgebaseurl='" . $_POST["knowledgebaseurl"] . "' WHERE id= 1");
    $message = "Success!";
}

$result = mysqli_query($conn, "SELECT * FROM config WHERE id= 1");
$row = mysqli_fetch_array($result);
?>
<?php
$page = 'configuration';
require_once 'templates/header.tpl.php';
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Configuration</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Configuration</li>
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
                                        <h3 class="card-title"></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method='post'>
                                        <div class="card-body">
                                            <?php
                                            if (isset($message)) {
                                                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>' . $message . '</h5></div>';
                                            }
                                            ?>
                                            <p>Fiels marked with <b>*</b> are required.</p>
                                            <div class="form-group">
                                                <label for="hostname">* Hosting Name</label>
                                                <input type="text" class="form-control" value='<?php echo $row['hostname']; ?>' name="hostname" placeholder="Enter your host's name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="logourl">* Logo Url</label>
                                                <input type="url" class="form-control" value='<?php echo $row['logourl']; ?>' name="logourl" placeholder="Logo Url" required>
                                                <p>Preview of your current Logo:
                                                    <img src='<?php echo $row['logourl']; ?>' style="max-width: 150px; maxheight: 50px;">
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="faviconurl">* Favicon Url</label>
                                                <input type="url" class="form-control" value='<?php echo $row['faviconurl']; ?>' name="faviconurl" placeholder="Favicon Url" required>
                                                <p>Preview of your current Favicon:
                                                    <img src='<?php echo $row['faviconurl']; ?>' style='width: 30px; height: 30px;'>
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="supporturl">* Support Url</label>
                                                <input type="url" class="form-control" value='<?php echo $row['supporturl']; ?>' name="supporturl" placeholder="Support Url" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="knowledgebaseurl">* Knowledgebase Url</label>
                                                <input type="url" class="form-control" value='<?php echo $row['knowledgebaseurl']; ?>' name="knowledgebaseurl" placeholder="Knowledgebase Url" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="homeurl">* Homepage Url</label>
                                                <input type="url" class="form-control" value='<?php echo $row['homeurl']; ?>' name="home" placeholder="Homepage Url" required> 
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
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
