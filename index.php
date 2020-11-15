<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM config WHERE id= 1");
$row = mysqli_fetch_array($result);

$tresult = mysqli_query($conn, "SELECT * FROM tutorials");

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Made with love by Maor Dayan
        Tutorials Site CMS by Dimitris T. (https://github.com/dimitrist19) -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="MD">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="<?= $row['faviconurl'] ?>" type="image/x-icon">
        <meta name="description" content="<?= $row['hostname'] ?> | Web Hosting Video Tutorials">

        <title><?= $row['hostname'] ?> - Video Tutorials</title>
        <link rel="stylesheet" href="assets/css/mobirise-icons.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="assets/css/socicon-styles.css"/>
        <link rel="stylesheet" href="assets/css/dropdown-style.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/tether/tether.min.css"/>
        <link rel="stylesheet" href="assets/css/style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="preload" as="style" href="assets/css/mbr-additional.css"><link rel="stylesheet" href="assets/css/mbr-additional.css" type="text/css"/>
    </head>
    <body>
        <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0" style="margin-bottom: 20px;">
            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="index.php"><img src="<?= $row['logourl'] ?>" alt="Logo" style="height: 3.8rem;"></a>
                        </span>
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-1" href="index.php#header2-1"></a></span>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="index.html#header2-1">Home</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="tutorials.php">Video Tutorials</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="#next"> &nbsp;<i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </nav>
        </section>

        <section class="engine"></section><section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1">
            <div class="container align-center">
                <div class="row justify-content-md-center">
                    <div class="mbr-white col-md-10">
                        <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Free Hosting Video Tutorials</h1>
                        <p class="mbr-text pb-3 mbr-fonts-style display-5"><strong><em><?= $row['hostname'] ?> - Video Library</em></strong></p>
                        <div class="mbr-section-btn"><a class="btn btn-md btn-secondary display-4" href="tutorials.php">Click here to watch our video tutorials</a></div>
                    </div>
                </div>
            </div>
            <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
                <a href="#next">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </div>
        </section>

        <section class="mbr-section article content1 cid-rESiUHqoCV" id="content2-1i">
            <div class="container" id="next">
                <div class="media-container-row">
                    <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                        <p><br><strong>What would you like to know ?</strong></p><p><strong>
                                <div align="center" style="">
                                    <input style="width: 100%; height: 50px;" type="text" id="searchbar" onkeyup="search()" placeholder="Search for tutorials..." class="form-control"/>
                                </div><br>
                                <ul id="myUL">
                                    <?php
                                    while ($row2 = mysqli_fetch_array($tresult)) {
                                        echo '<li><a href="tutorials.php?id=' . $row2['id'] . '">' . $row2['title'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="cid-rEPlBpa0xu" id="footer1-1g">
            <div class="container">
                <div class="media-container-row content text-white">
                    <div class="col-12 col-md-3">
                        <div class="media-wrap">
                            <a href="index.php">
                                <img src="<?= $row['logourl'] ?>" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    </div>
                    <div class="col-12 col-md-3 mbr-fonts-style display-7">
                        <h5 class="pb-3">Links</h5>
                        <p class="mbr-text"><a href="<?= $row['homeurl'] ?>">Homepage</a><br><a href="<?= $row['supporturl'] ?>" target="_blank">Support</a><br><a href="<?= $row['knowledgebaseurl'] ?>" target="_blank">Knowledgebase</a><br></p>
                    </div>
                    <div class="col-12 col-md-3 mbr-fonts-style display-7">
                        <h5 class="pb-3"></h5>
                        <p class="mbr-text"></p>
                    </div>
                </div>
                <div class="footer-lower">
                    <div class="media-container-row">
                        <div class="col-sm-12">
                            <hr>
                        </div>
                    </div>
                    <div class="media-container-row mbr-white">
                        <div class="col-sm-6 copyright">
                            <p class="mbr-text mbr-fonts-style display-7">
                                © Copyright 2020 <b><a href="<?= $row['homeurl'] ?>"><?= $row['hostname'] ?></a></b> - Tutorials Site V1 by <b><a href="https://github.com/dimitrist19">Dimitris T.</a></b>
                            </p>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/smooth-scroll/smooth-scroll.js"></script>
        <script src="https://tutorials.ifastnet.com/assets/dropdown/js/nav-dropdown.js"></script>
        <script src="https://tutorials.ifastnet.com/assets/dropdown/js/navbar-dropdown.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/touch-swipe/jquery.touch-swipe.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/jarallax/jarallax.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/tether/tether.min.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/formoid/formoid.min.js"></script>
        <script>
                                        function search() {
                                            var input, filter, ul, li, a, i, txtValue;
                                            input = document.getElementById("searchbar");
                                            filter = input.value.toUpperCase();
                                            ul = document.getElementById("myUL");
                                            li = ul.getElementsByTagName("li");
                                            for (i = 0; i < li.length; i++) {
                                                a = li[i].getElementsByTagName("a")[0];
                                                txtValue = a.textContent || a.innerText;
                                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                    li[i].style.display = "";
                                                } else {
                                                    li[i].style.display = "none";
                                                }
                                            }
                                        }
        </script>
    </body>
</html>