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
include '../config.php';
$row = mysqli_fetch_array($result);
if (count($_POST) > 0) {
    $captcha = $_POST['g-recaptcha-response'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretkey . "&response=" . $captcha);
    $responseKeys = json_decode($response, true);
    if (intval($responseKeys["success"]) !== 1) {
        $message = '<p class="alert alert-danger">Please check the the captcha form.</p>';
    } else {
        if (password_verify($_POST["currentPassword"], $row['password']) == $row["password"]) {
            if ($_POST['currentPassword'] == $_POST['newPassword']) {
                $message = '<p class="alert alert-warning">New Password cannot be the same as your Old Password!</p>';
            } else {
                mysqli_query($conn, "UPDATE users SET password='" . password_hash($_POST["newPassword"], PASSWORD_DEFAULT) . "' WHERE id= {$_SESSION['id']}");
                $message = '<p class="alert alert-success">Password Changed</p>';
            }
        } else {
            $message = '<p class="alert alert-warning">Current Password is not correct</p>';
        }
    }
}
?>
<?php
$page = '';
require_once 'templates/header.tpl.php';
?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Change Password</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
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
                                        <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                                            <div style="width:500px;">
                                                <div class="message">
                                                    <?php
                                                    if (isset($message)) {
                                                        echo $message;
                                                    }
                                                    ?>
                                                </div>
                                                <table border="0" cellpadding="10" cellspacing="0" width="500" align="center">
                                                    <tr>
                                                        <td width="40%"><label>Current Password</label></td>
                                                        <td width="60%"><input type="password" name="currentPassword" class="form-control"/><span id="currentPassword"  class="required"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>New Password</label></td>
                                                        <td><input type="password" name="newPassword" class="form-control"/><span id="newPassword" class="required"></span></td>
                                                    </tr>
                                                    <td><label>Confirm Password</label></td>
                                                    <td><input type="password" name="confirmPassword" class="form-control"/><span id="confirmPassword" class="required"></span></td>
                                                    <div class="g-recaptcha" data-sitekey="<?= $sitekey ?>" id="verify"></div>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                        <td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
                                                    </tr>

                                            </div>
                                        </form>
                                        <td colspan="2"><button class="btn btn-danger" onclick="goBack()">Cancel</button></td>
                                        </table>
                                    </div>
                                </div>
                                <script>
                                    function validatePassword() {
                                        var currentPassword, newPassword, confirmPassword, output = true;

                                        currentPassword = document.frmChange.currentPassword;
                                        newPassword = document.frmChange.newPassword;
                                        confirmPassword = document.frmChange.confirmPassword;

                                        if (!currentPassword.value) {
                                            currentPassword.focus();
                                            document.getElementById("currentPassword").innerHTML = "required";
                                            output = false;
                                        } else if (!newPassword.value) {
                                            newPassword.focus();
                                            document.getElementById("newPassword").innerHTML = "required";
                                            output = false;
                                        } else if (!confirmPassword.value) {
                                            confirmPassword.focus();
                                            document.getElementById("confirmPassword").innerHTML = "required";
                                            output = false;
                                        }
                                        if (newPassword.value != confirmPassword.value) {
                                            newPassword.value = "";
                                            confirmPassword.value = "";
                                            newPassword.focus();
                                            document.getElementById("confirmPassword").innerHTML = "New Password must not be the same as your old one!";
                                            output = false;
                                        }
                                        return output;
                                    }
                                </script>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- Recaptcha -->
        <script>
                                    function goBack() {
                                        window.history.back();
                                    }

        </script>
    </body>
</html>