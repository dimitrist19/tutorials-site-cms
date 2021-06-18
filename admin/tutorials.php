<?php
include '../config.php';
$result = mysqli_query($conn, "SELECT * FROM tutorials");
?>
<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
$result1 = mysqli_query($conn, "SELECT * FROM users WHERE id={$_SESSION['id']}");
$row1 = mysqli_fetch_array($result1);
?>
<?php
    $page = 'tutorials';
    require_once 'templates/header.tpl.php';
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Manage Your Tutorials     <a href="addnew.php"><button class="btn btn-primary btn-sm">Add New</button></a></h1>
                                <!--<div align="right">-->

                                <!--</div>-->
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Tutorials</li>
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
                                <br>
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">                
                                                <table id="tutorialstable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>Title</th>
                                                            <th style="width: 60px;">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo "<tr>";
                                                            echo '<td>' . $row['title'] . '</td>';
                                                            echo '<td><a href="edit.php?id=' . $row['id'] . '"><i class="fa fa-edit"></i></a><a href="delete.php?id=' . $row['id'] . '">  <i class="fa fa-trash text-danger"></i></a><a target="_blank" href="../tutorials.php?id=' . $row['id'] . '">  <i class="fa fa-eye text-secondary"></i></a></td>';
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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
        <!-- DataTables -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script>
            $(function () {
                $('#tutorialstable').DataTable({
                    "columns": [
                        null,
                        {"orderable": false}
                    ],
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true
                });
            }
            );
        </script>
    </body>
</html>

