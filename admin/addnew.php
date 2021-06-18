<?php
require '../config.php';

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
if (count($_POST) > 0) {
    mysqli_query($conn, "INSERT INTO `tutorials` (`id`, `title`, `description`, `videourl`, `body`) VALUES (NULL, '{$_POST['title']}', '{$_POST['description']}', '{$_POST['videourl']}', '{$_POST['body']}')");
    $message = "Success!";
}
?>
<?php
$page = 'addnew';
require_once 'templates/header.tpl.php';
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Add Tutorial</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="tutorials.php">Tutorials</a></li>
                                    <li class="breadcrumb-item active">Add New</li>
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
                  <h5><i class="icon fas fa-check"></i>' . $message . '</h5>You can manage your tutorials <a href="tutorials.php">here</a></div>';
                                            }
                                            ?>
                                            <p>Fiels marked with <b>*</b> are required. The fields that are not required, leave them blank and they won't appear in the website.</p>
                                            <div class="form-group">
                                                <label for="title">* Tutorial Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Tutorial Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="videourl">* Video Embed Code (HTML)</label>
                                                <input type="textarea" class="form-control" name="videourl" placeholder="Video Embed Code" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="body">How To / Further Explanation</label>
                                                <div style="background-color: #ffffff;">
                                                    <textarea id="summernote" name="body"></textarea>
                                                </div>
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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote();
            });
            $('#summernote').summernote({
                placeholder: 'Here you can explain the tutorial further or make a How-To sections. You can include images, text & more...',
                tabsize: 2,
                height: 200,
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