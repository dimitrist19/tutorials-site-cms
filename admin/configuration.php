<?php
session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
?>
<?php
include '../config.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE config SET hostname='" . $_POST["hostname"] . "', homeurl='" . $_POST["home"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET logourl='" . $_POST["logourl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET faviconurl='" . $_POST["faviconurl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET supporturl='" . $_POST["supporturl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET knowledgebaseurl='" . $_POST["knowledgebaseurl"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET css_code='" . $_POST["customcss"] . "' WHERE id= 1");
    mysqli_query($conn, "UPDATE config SET maintenance='" . checkMaintenance('post') . "' WHERE id= 1");
    $message = "Success!";
}

$result = mysqli_query($conn, "SELECT * FROM config WHERE id= 1");
$row    = mysqli_fetch_array($result);

function checkMaintenance($inp)
{
    global $row;
    if ($inp == 'post') {
        if (count($_POST) > 0) {
            if (isset($_POST['maintenancemode']) && $_POST['maintenancemode'] == 'on') {
                return '1';
            } else {
                return '0';
            }
        }
    } else if ($inp == 'check') {
        if (intval($row['maintenance']) == 1) {
            return 'checked';
        }
    }
}
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
                    <form role="form" method='post'>
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="configuration-general-tab" data-toggle="pill" href="#configuration-general" role="tab" aria-controls="configuration-general" aria-selected="true"><i class="fas fa-cogs"></i> General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="configuration-design-tab" data-toggle="pill" href="#configuration-design" role="tab" aria-controls="configuration-design" aria-selected="false"><i class="fas fa-brush"></i> Design</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="configuration-maintenance-tab" data-toggle="pill" href="#configuration-maintenance" role="tab" aria-controls="configuration-maintenance" aria-selected="false"><i class="fas fa-toolbox"></i> Maintenance</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <?php
if (isset($message)) {
    echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>' . $message . '</h5></div>';
}
?>
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="configuration-general" role="tabpanel" aria-labelledby="configuration-design-tab">
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
                                    <div class="tab-pane fade" id="configuration-design" role="tabpanel" aria-labelledby="configuration-design-tab">
                                        <div class="form-group">
                                            <label for="customcss">Custom CSS</label>
                                            <textarea name="customcss" placeholder="Enter custom CSS here" class="form-control"><?=$row['css_code']?></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="configuration-maintenance" role="tabpanel" aria-labelledby="configuration-maintenance-tab">
                                        <div class="form-group">
                                            <label for="maintenancemode">Maintenance Mode:</label>
                                            <input type="checkbox" name="maintenancemode" <?=checkMaintenance('check')?>>Enable Maintenance Mode</input>
                                        </div>
                                        <p>* If you are logged in and maintenance mode is active you will be able to see the site normally</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                    <!-- /.card -->
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
