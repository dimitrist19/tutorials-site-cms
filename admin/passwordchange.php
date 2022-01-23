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

    if (password_verify($_POST["currentPassword"], $row['password']) == $row['password']) {
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
?>
<?php
$page = 'password_change';
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
                            <form class="form-horizontal" name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                                <div class="form-group row">
                                    <?php
if (isset($message)) {
    echo $message;
}
?>
                                </div>
                                <div class="form-group row">
                                    <label for="currentPassword" class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="currentPassword" placeholder="Current Password"><span id="currentPassword"  class="required"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="newPassword" placeholder="New Password"><span id="newPassword" class="required"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password"><span id="confirmPassword" class="required"></span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-default float-right" onclick="goBack()">Cancel</button>
                        </div>
                        </form>
                        <script>
                            function validatePassword() {
                                var currentPassword, newPassword, confirmPassword, output = true;

                                currentPassword = document.frmChange.currentPassword;
                                newPassword = document.frmChange.newPassword;
                                confirmPassword = document.frmChange.confirmPassword;

                                if (!currentPassword.value) {
                                    currentPassword.focus();
                                    document.getElementById("currentPassword").innerHTML = "<font color='red'>Required</font>";
                                    output = false;
                                }

                                if (!newPassword.value) {
                                    newPassword.focus();
                                    document.getElementById("newPassword").innerHTML = "<font color='red'>Required</font>";
                                    output = false;
                                }
                                if (!confirmPassword.value) {
                                    confirmPassword.focus();
                                    document.getElementById("confirmPassword").innerHTML = "<font color='red'>Required</font>";
                                    output = false;
                                }
                                if (newPassword.value != confirmPassword.value) {
                                    newPassword.value = "";
                                    confirmPassword.value = "";
                                    newPassword.focus();
                                    document.getElementById("confirmPassword").innerHTML = "<font color='red'>Confirm Password does not match with New Password</font>";
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