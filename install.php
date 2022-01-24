<?php
if (file_exists('config.php')) {
    include 'config.php';
    if (isset($version)) {
        $version_numerical = $version;
        $version           = 'V' . $version;
    } else {
        $version = 'Unknown Version';
    }
}
if (isset($_GET['install'])) {
    $conffile = fopen("config.php", "w") or die("Unable to open configuration file!");
    $data     = '<?php
            //DATABASE DETAILS
            $dbhost = "' . $_POST['dbhost'] . '";
            $dbuser = "' . $_POST['dbuser'] . '";
            $dbpass = "' . $_POST['dbpass'] . '";
            $dbname = "' . $_POST['dbname'] . '";

            //DEBUGGING
            error_reporting(0); //Set to -1 if you want to see php errors

            //DO NOT EDIT
            $conn = mysqli_connect("{$dbhost}", "{$dbuser}", "{$dbpass}", "{$dbname}") or die("Connection Error: " . mysqli_error($conn));
            $version = "1.3.1";

?>';
    fwrite($conffile, $data);
    fclose($conffile);
    include 'config.php';
    mysqli_query($conn, "DROP TABLE IF EXISTS `config`;") or die('Error #1!');
    mysqli_query($conn, "DROP TABLE IF EXISTS `tutorials`;") or die('Error #2!');
    mysqli_query($conn, "DROP TABLE IF EXISTS `users`;") or die('Error #3!');
    mysqli_query($conn, "CREATE TABLE `config` (`id` int(9) NOT NULL,`logourl` text NOT NULL,`hostname` text NOT NULL,`faviconurl` text NOT NULL,`supporturl` text NOT NULL,`knowledgebaseurl` text NOT NULL,`homeurl` text NOT NULL,`css_code` text NOT NULL,`maintenance` tinyint(1) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;") or die('Error #4!');
    mysqli_query($conn, "INSERT INTO `config` (`id`, `logourl`, `hostname`, `faviconurl`, `supporturl`, `knowledgebaseurl`, `homeurl`, `css_code`, `maintenance`) VALUES (1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTDt3gslkIahorjd5GqQiQ6s6dVLZxh9hgxrg&usqp=CAU', 'DemoSite', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTDt3gslkIahorjd5GqQiQ6s6dVLZxh9hgxrg&usqp=CAU', 'https://demowebsite.com/support', 'https://demowebsite.com/kb', 'https://demowebsite.com', '', 0);") or die('Error #5!');
    mysqli_query($conn, "CREATE TABLE `tutorials` ( `id` int(9) NOT NULL, `title` text NOT NULL, `description` text DEFAULT NULL, `videourl` text NOT NULL, `body` mediumtext DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;") or die("Error #6!");
    mysqli_query($conn, "INSERT INTO `tutorials` (`id`, `title`, `description`, `videourl`, `body`) VALUES (1, 'Demo', 'Demo Video', '<iframe width=\"700\" height=\"394\" src=\"https://www.youtube.com/embed/xcJtL7QggTI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<p style=\"text-align: left; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"font-family: Arial; text-align: justify; font-size: 1rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut laoreet risus. Nullam laoreet maximus mauris, sit amet convallis nulla dapibus a. Nullam in vestibulum massa. Nunc malesuada nec nulla in convallis. Curabitur volutpat suscipit ligula a congue. Nam congue mauris at porttitor varius. Morbi sit amet pretium augue, id accumsan mauris. Praesent faucibus lectus dapibus justo facilisis, sit amet sollicitudin orci condimentum. Maecenas fringilla turpis quis dapibus consequat.</span><br></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"text-align: left; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);\"><span source=\"\" sans=\"\" pro\";\"=\"\" comic=\"\" ms\";\"=\"\" style=\"font-family: Arial;\">Nulla vitae ultrices turpis. Praesent tincidunt nec risus nec malesuada. Phasellus congue turpis eget pulvinar posuere. Vestibulum velit urna, pulvinar eu eleifend at, placerat vel sapien. Cras aliquet, dolor vel venenatis tempus, elit lorem maximus elit, quis blandit ligula tellus nec turpis. Suspendisse ullamcorper auctor tincidunt. Aenean eleifend justo tortor, at ornare eros tristique eget. Mauris ac nulla laoreet, viverra quam vitae, ornare urna. Nunc at magna id nibh suscipit commodo. Integer vel nisi elit. Sed nec semper augue. Fusce erat ante, volutpat non mollis quis, elementum non purus.</span></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"text-align: left; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);\"><span source=\"\" sans=\"\" pro\";\"=\"\" comic=\"\" ms\";\"=\"\" style=\"font-family: Arial;\">Quisque eu urna aliquet, ornare felis ac, congue magna. Nunc nec tincidunt nibh, scelerisque dictum leo. Cras ac pretium nulla. Proin egestas urna vitae nisi congue, non auctor lectus interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet magna ut nisl condimentum lobortis vel quis enim. Nulla facilisi. Suspendisse imperdiet sollicitudin nulla sit amet semper. Sed eget lobortis tellus, eget blandit enim. Vestibulum arcu ante, volutpat sit amet convallis id, sodales ut justo.</span></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"text-align: left; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);\"><span source=\"\" sans=\"\" pro\";\"=\"\" comic=\"\" ms\";\"=\"\" style=\"font-family: Arial;\">Donec laoreet odio sapien, sed malesuada metus pulvinar id. Curabitur sagittis turpis id porttitor pulvinar. Integer laoreet orci arcu, vitae sagittis lacus molestie id. Pellentesque consequat pharetra posuere. Aenean quis ex et libero ultrices pulvinar vel in justo. Nam pharetra ornare turpis, eget molestie dui fringilla sit amet. Proin non turpis at ipsum pellentesque porta. Ut condimentum placerat lacus et posuere. Aenean sit amet cursus sem. In turpis justo, aliquet congue luctus auctor, sollicitudin nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed efficitur ipsum, eget varius enim. Ut id enim tristique, varius tellus et, tristique lacus. Fusce volutpat vel odio id accumsan. Vestibulum aliquet diam ut risus sagittis blandit.</span></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"text-align: left; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0);\"><span source=\"\" sans=\"\" pro\";\"=\"\" comic=\"\" ms\";\"=\"\" style=\"font-family: Arial;\">In sit amet nisl mollis, eleifend felis non, blandit elit. In porttitor aliquam commodo. Donec rhoncus molestie dui at placerat. Mauris convallis risus eget maximus dapibus. Phasellus id enim vitae ex venenatis dignissim. Sed nec sem id dui semper mollis vitae a purus. Integer vitae faucibus mi, a sollicitudin velit. Morbi finibus tortor eget ex ullamcorper, non efficitur dolor tempor. Donec pharetra felis id mi commodo, nec porttitor nisl interdum. Aenean condimentum enim eros, quis iaculis ligula pulvinar eu. Donec accumsan neque sit amet nisi faucibus, a viverra nisi accumsan</span></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; text-align: center; padding: 0px; color: rgb(0, 0, 0);\"></p>');") or die("Error #7!");
    mysqli_query($conn, "CREATE TABLE `users` ( `id` int(11) NOT NULL, `fullname` text NOT NULL, `username` varchar(255) NOT NULL, `password` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;") or die("Error #8!");
    mysqli_query($conn, "INSERT INTO `users` (`id`, `fullname`, `username`, `password`) VALUES (1, 'System Admin', 'admin', '$2y$10\$BXDQjQoQxg0ngOllN44p4eBfGCxmn5ysBTOSBHyZ5rMNreG8V8m.a');") or die("Error #9!");
    mysqli_query($conn, "ALTER TABLE `config` ADD PRIMARY KEY (`id`);") or die("Error #10!");
    mysqli_query($conn, "ALTER TABLE `tutorials` ADD PRIMARY KEY (`id`);") or die("Error #11!");
    mysqli_query($conn, "ALTER TABLE `users` ADD PRIMARY KEY (`id`);") or die("Error #12!");
    mysqli_query($conn, "ALTER TABLE `tutorials` MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;") or die("Error #13!");
    mysqli_query($conn, "ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;") or die("Error #14!");
    $alert = '<p class="alert alert-success">Success! Click <a href="admin">here</a> to continue to your site</p>';
    unlink('install.php');
} else if (isset($_GET['update'])) {
    if (!file_exists('config.php')) {
        $alert = '<p class="alert alert-danger">Configuration Does Not Exist. Please start with a <a href="install.php">new installation</a></p>';
    } else {
        $conffile = fopen("config.php", "w") or die("Unable to open configuration file!");
        $data     = '<?php
            //DATABASE DETAILS
            $dbhost = "' . $dbhost . '";
            $dbuser = "' . $dbuser . '";
            $dbpass = "' . $dbpass . '";
            $dbname = "' . $dbname . '";

            //DEBUGGING
            error_reporting(0); //Set to -1 if you want to see php errors

            //DO NOT EDIT
            $conn = mysqli_connect("{$dbhost}", "{$dbuser}", "{$dbpass}", "{$dbname}") or die("Connection Error: " . mysqli_error($conn));
            $version = "1.3.1";

?>';
        fwrite($conffile, $data);
        fclose($conffile);
        require_once 'config.php';
        $alert = '<p class="alert alert-success">Success! Click <a href="admin">here</a> to continue to your site</p>';
        unlink('install.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <!-- Made with love by Dimitris T. (https://github.com/dimitrist19)
    Admin Dashboard Template: AdminLTE (https://adminlte.io) -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tutorials Site CMS | Installation</title>
        <link rel="icon" href="https://icon-library.com/images/tutorial-icon-png/tutorial-icon-png-19.jpg">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#">
                    <b>Tutorials Site </b> CMS
                    <p>Installer Beta</p>
                </a>
            </div>
            <?php
if (isset($_GET['install'])) {
    echo $alert;
} else if (isset($_GET['update'])) {
    echo $alert;
} else {
    ?>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body">
                        <p class="login-box-msg">Begin with the installation of Tutorials Site CMS</p>
                        <form action="?install" method="post">
                            <div class="dropdown-divider"></div>
                            <div id="accordion">
                                <h3>Select Option</h3>
                                <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#update" aria-expanded="false" class="">
                                                Update Existing Installation <i class="fas fa-arrow-alt-circle-up"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="update" class="panel-collapse in collapse">
                                        <div class="card-body">
                                            <?php
if (file_exists('config.php')) {
        if (version_compare($version_numerical, '1.3.1') >= 0) {
            echo 'A newer version is already installed';
        } else {
            ?>
                                                    <p>This will update your installation from <?=$version?> to V1.3.1 (It will not delete any data but you are advised to backup your database before update)</p>
                                                    <a href="?update">Update Installation</a>
                                                    <p class="login-box-msg"><b>Warning! The updater may not work correctly as it's still in the testing phase. If you wish to safely update the CMS delete 'install.php' file and visit <a href="https://service.dtprojects.eu.org/support/knowledgebase.php?article=1">this page</a></b></p>
                                                    <?php
}
    } else {
        echo 'This installation cannot be updated';
    }
    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#new" aria-expanded="false" class="">
                                                New Installation <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="new" class="panel-collapse in collapse">
                                        <div class="card-body">
                                            <p class="login-box-msg"><b>Warning! The installer will erase all data.</b></p>
                                            <h3>Database Details</h3>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Database Host" name="dbhost" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-globe"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Database User" name="dbuser" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" placeholder="Database User Password" name="dbpass">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Database Name" name="dbname" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-database"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="icheck-primary">
                                                        <!--<input type="checkbox" id="remember">-->
                                                        <label>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-4" align="center">
                                                    <button type="submit" class="btn btn-primary btn-block">Install</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <?php
}
?>

            <!-- jQuery -->
            <script src="admin/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- AdminLTE App -->
            <script src="admin/dist/js/adminlte.min.js"></script>
    </body>
</html>
