<?php
//If id is not set redirects to tutorials page
if (!isset($_GET['id'])) {

    header('Location: tutorials.php');

    exit();
}
include '../config.php';
$result = mysqli_query($conn, "SELECT * FROM tutorials WHERE id= {$_GET['id']}");
$row = mysqli_fetch_array($result);
//When form is submitted it updates the elements
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE tutorials SET title='" . $_POST["title"] . "' WHERE id= {$_POST['id']}");
    mysqli_query($conn, "UPDATE tutorials SET description='" . $_POST["description"] . "' WHERE id= {$_POST['id']}");
    mysqli_query($conn, "UPDATE tutorials SET videourl='" . $_POST["videourl"] . "' WHERE id= {$_POST['id']}");
    mysqli_query($conn, "UPDATE tutorials SET body='" . $_POST["body"] . "' WHERE id= {$_POST['id']}");
    $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i>Success!</h5></div>';
}
?>
<?php
session_start();
$result = mysqli_query($conn, "SELECT * FROM tutorials WHERE id={$_GET['id']}");
$row = mysqli_fetch_array($result);
$result1 = mysqli_query($conn, "SELECT * FROM users WHERE id={$_SESSION['id']}");
$row1 = mysqli_fetch_array($result1);

mysqli_close($conn);
?>
<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Tutorials Site CMS | Edit Tutorial</title>
        <link rel="icon" href="https://icon-library.com/images/tutorial-icon-png/tutorial-icon-png-19.jpg">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                            <a href="profile.php" class="d-block"><?= $row1['fullname']?></a>
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
                                <h1 class="m-0 text-dark">Edit Tutorial</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="tutorials.php">Tutorials</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
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
                                            <input name="id" value="<?php echo $_GET['id']; ?>" hidden>
                                            <?php
                                            if (isset($message)) {
                                                echo '';
                                            }
                                            ?>
                                            <p>Fiels marked with <b>*</b> are required. The fields that are not required, leave them blank and they won't appear in the website.</p>
                                            <div class="form-group">
                                                <label for="title">* Tutorial Title</label>
                                                <input type="text" class="form-control" value='<?php echo $row['title']; ?>' name="title" placeholder="Tutorial Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="videourl">* Video Embed Code (HTML)</label>
                                                <textarea type="text" class="form-control" name="videourl" placeholder="Video Embed Code" required><?php echo $row['videourl']; ?></textarea>
                                                <div>
                                                    <p>Preview of your current Video Embed Code:</p>
                                                    <p><?php echo $row['videourl']; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" style="height: 200px;" name="description" placeholder="Description"><?php echo $row['description']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="body">How To / Further Explanation</label>
                                                <textarea id="summernote" name="body"><?= $row['body'] ?></textarea>
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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote();
            });
            $('#summernote').summernote({
                placeholder: 'Here you can explain the tutorial further or make a How-To sections. You can include images, text & more...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help', 'undo', 'redo']],
                ],
            });
        </script>
    </body>
</html>