<?php
//If id is not set redirects to tutorials page
if (!isset($_GET['id'])) {

    header('Location: tutorials.php');

    exit();
}
include '../config.php';
$result = mysqli_query($conn, "SELECT * FROM tutorials WHERE id= {$_GET['id']}");
$row    = mysqli_fetch_array($result);
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
$row    = mysqli_fetch_array($result);
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
<?php
$page = 'edit';
require_once 'templates/header.tpl.php';
?>

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
                                                <textarea id="summernote" name="body"><?=$row['body']?></textarea>
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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
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