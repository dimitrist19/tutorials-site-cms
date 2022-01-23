<?php
//***DO NOT CHANGE THIS FILE. THIS FILE CONTAINS SUPPORT INFORMATION FOR THE SCRIPT***
session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
require '../config.php';
?>
<?php
$page = 'support';
require_once 'templates/header.tpl.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Support</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Support</li>
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
                        <div class='card-body'>
                            <h4>Support options are listed below</h4>
                            <hr />
                            <table class="table table-bordered">
                                <tr>
                                    <td class="col-sm-2"><strong><i class="fas fa-bug"></i> Bug/Issue/Error Report</strong></td>
                                    <td class="col-sm-10">You can report any issue or bug you notice in this CMS by creating an issue in GitHub <a href="https://github.com/dimitrist19/tutorials-site-cms/issues/new" class="btn btn-small btn-gradient btn-secondary" target="_blank"><i class="fas fa-flag"></i> Create an issue</a>&nbsp;<a href="https://github.com/dimitrist19/tutorials-site-cms/issues/" class="btn btn-small btn-gradient btn-secondary" target="_blank"><i class="fas fa-external-link-alt"></i> View open issues</a></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2"><strong><i class="fas fa-headset"></i> Direct Support</strong></td>
                                    <td class="col-sm-10">Need direct support? You can create a support ticket and i'll try to get back to you within  48 hours. <a href="https://service.dtprojects.eu.org/support/index.php?a=add&catid=4&custom1=Tutorials Site CMS&custom2=v<?=$version?>" class="btn btn-small btn-gradient btn-secondary" target="_blank"><i class="fas fa-ticket-alt"></i> Create support ticket</a>&nbsp;<a href="https://service.dtprojects.eu.org/support/ticket.php" class="btn btn-small btn-gradient btn-secondary" target="_blank"> <i class="fas fa-file-alt"></i> View existing ticket</a></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2"><strong><i class="fas fa-life-ring"></i> Other</strong></td>
                                    <td class="col-sm-10">
                                        <i class="fas fa-envelope"></i><strong> support@dtprojects.eu.org</strong> (*connected to helpdesk)
                                        <p><i class="fab fa-discord"></i> Discord Server: <a href="https://discord.gg/wwJbMup"><b>https://discord.gg/wwJbMup</b></a></p>
                                    </td>
                                </tr>
                            </table>
                            <code><strong>Note: The software comes neither with warranty or guaranteed support<strong></code>
                                        <hr />
                                        <div id="accordion">
                                            <h3>FAQ <i class="fa fa-question-circle"></i></h3>
                                            <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
                                                            What's New?
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="card-body">
                                                        <h5><b>Change Log</b></h5>
                                                        <p>To view changelog navigate to <a href="https://dtprojects.eu.org/tutorials-site-cms/changelog.php">https://dtprojects.eu.org/tutorials-site-cms/changelog.php</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true">
                                                            The CMS has an issue. When it will be fixed?
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse in">
                                                    <div class="card-body">
                                                        <p>There is no guaranteed ETA for when each issue will be resolved. However, security issues are prioritized first to resolve and then other functional issues.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

                                        <!-- /.row -->
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