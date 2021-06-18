<?php
//***DO NOT CHANGE THIS FILE. THIS FILE CONTAINS SUPPORT INFORMATION FOR THE SCRIPT***
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
include '../config.php';
$result1 = mysqli_query($conn, "SELECT * FROM users WHERE id={$_SESSION['id']}");
$row1 = mysqli_fetch_array($result1);
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
                                        <p>The software comes with no warranty but if encounter any problems feel free to open an issue in GitHub</p>
                                        <a href="https://github.com/dimitrist19/tutorials-site-cms/issues/new" class="btn btn-gradient btn-primary" target="_blank">Create an issue</a>
                                        <p>You may also contact me at my Discord Server: <a href="https://discord.gg/wwJbMup"><b>https://discord.gg/wwJbMup</b></p></a>
                                        <br>
                                        <div class="col-lg-4">
                                            <div class="card card-secondary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                                                <div class="card-header">
                                                    <h3 class="card-title">Currently Open Issues</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div id="github-issues"></div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div>
                                            <div class="dropdown-divider"></div>
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
                                                            <p>V1.2</p>
                                                            <ul>
                                                                <li>Improved UI in some pages</li>
                                                                <li>Bug Fixes</li>
                                                                <li>Code Optimization</li>
                                                                <li>Backup & Export tool (in beta phase)</li>
                                                                <li>Installer / Updater (in beta phase)</li>
                                                            </ul>
                                                            <p>V1.1</p>
                                                            <ul>
                                                                <li>Improved UI in some pages</li>
                                                                <li>Bug Fixes</li>
                                                                <li>Improved Editor Integration</li>
                                                                <li>Added 'VP CUSTOMIZATION' section</li>
                                                                <li>Datatable for Tutorial List with 'View' action</li>
                                                            </ul>
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
        <script>
            var urlToGetAllOpenBugs = "https://api.github.com/repos/dimitrist19/tutorials-site-cms/issues?state=open";


            $(document).ready(function () {
                $.getJSON(urlToGetAllOpenBugs, function (allIssues) {
                    $("div#github-issues").append("There are currently <b>" + allIssues.length + "</b> open issues:</br>");
                    $.each(allIssues, function (i, issue) {


                        // Get assignee (if applicable)
                        var assigneeName = "Unassigned";
                        if (issue.assignee) {
                            assigneeName = issue.assignee.login;
                        }


                        // Calculate number of days ago created
                        var today = new Date();
                        var timeDifference = today - Date.parse(issue.created_at);
                        var daysAgo = (timeDifference / (1000 * 3600 * 24)).toFixed();


                        $("div#github-issues")
                                .append("<div style=\"margin-bottom:20px;\">")
                                .append("<strong><a href=\"" + issue.html_url + "\">" + issue.title + "</a></strong></br>")
                                .append("#" + issue.number + " opened " + daysAgo + " days ago by " + issue.user.login + "</br>")
                                .append("Assigned to: " + assigneeName)
                                .append("</div>");
                    });
                });
            });
        </script>
    </body>
</html>
