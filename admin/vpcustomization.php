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
$page = 'vpcustomization';
require_once 'templates/header.tpl.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Vista Panel Customization</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">VP Customization</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class='card'>
                <div class='card-body'>
                    <img src="https://panel.myownfreehost.net/panel/img/cp_logo.png" style="background: #353535;">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>You can place this code in header's ad section of your VistaPanel and it will replace the 'Tutorials' link. <b>Don't forget to change http://yourdomain.com with your tutorial's installation url</b></p>
                            <code>&lt;script type=&quot;text/javascript&quot;&gt;  <br />
                                <br />
                                var b = {  <br />
                                tutorial : &quot;"http://yourdomain.com&quot;,   <br />
                                }  <br />
                                <br />
                                &lt;/script&gt;  <br />
                                &lt;script src=&quot;https://cdn.jsdelivr.net/gh/VPTOfficial/VistaPanel-Customizations/tutorial-link-changer/tutorial-link-changer.js&quot; type=&quot;text/javascript&quot;&gt;<br />&lt;/script&gt;</code>
                            <br />
                            <br />
                            <div class="callout callout-info">
                                <p>Credit: <a href='https://github.com/WybeNetwork/VistaPanel-Customizations/tree/master/tutorial-link-changer'>'Tutorial Link Changer'</a> by WybeNetwork</p>
                            </div>
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
