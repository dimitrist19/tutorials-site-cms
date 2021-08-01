<?php
// We need to use sessions, so you should always start sessions using the below code.

session_start();

// If the user is not logged in redirect to the login page...

if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');

    exit();
}
require '../config.php';
$result1 = mysqli_query($conn, "SELECT * FROM users WHERE id={$_SESSION['id']}");
$row1 = mysqli_fetch_array($result1);
?>
<?php
$page = 'about';
require 'templates/header.tpl.php'
?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"><b>About</b></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active">About</li>
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
                                <div>
                                    <div class="card">
                                        <div class='card-body'>
                                            <h3>Credits</h3>
                                            Admin Interface Template: <b><a href="https://adminlte.io">AdminLTE</a></b>
                                            <br>User Interface Template: <b>Maor Dayan</b>
                                            <br>
                                            <br>
                                            <p><b>The copyright notices must be included with all pages of the script.</b> If you wish to request to remove them please contact me: <a href="support.php">Contact Options</a> 
                                            <div class="dropdown-divider"></div>
                                            <h3>About the script</h3>
                                            <p>Version: <code><?= $version?> (August 2021 Update)</code> <a href="https://service.dtprojects.eu.org/updatechecker.php?v=<?= $version?>" target="_blank">Check for updates</a></p>
                                            <p>Through 'Tutorials Site' CMS you can easily create a video tutorial site for your hosting business</p>
                                            <font size='small' color='grey'>*The script includes tools especially for web hosting video tutorial site but it may be used from non web hosting providers/sites.</font>
                                            <br>
                                            <div class="dropdown-divider"></div>
                                            <h3>Licence</h3>
                                            <p>The template is released under the MIT licence:</p>
                                            <code>
                                                MIT License

                                                <br><br>Copyright (c) 2021 Dimitris T.(https://github.com/dimitrist19)

                                                <br><br>Permission is hereby granted, free of charge, to any person obtaining a copy
                                                of this software and associated documentation files (the "Software"), to deal
                                                in the Software without restriction, including without limitation the rights
                                                to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                                                copies of the Software, and to permit persons to whom the Software is
                                                furnished to do so, subject to the following conditions:

                                                <br><br>The above copyright notice and this permission notice shall be included in all
                                                copies or substantial portions of the Software.

                                                <br><br>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                                                IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                                                FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                                                AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                                                LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                                                OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
                                                SOFTWARE.
                                            </code>
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

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>