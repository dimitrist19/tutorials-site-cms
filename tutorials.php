<?php
require_once 'includes/check.php';
require 'config.php';
$getSettings = mysqli_query($conn, "SELECT * FROM config WHERE id= 1");
$getTutorials = mysqli_query($conn, "SELECT * FROM tutorials");

session_start();
$settings = mysqli_fetch_array($getSettings);
if (intval($settings['maintenance']) == 1) {
    if (!isset($_SESSION['loggedin'])) {
        die(include 'maintenance.php');
    }
}
?>
<html>
    <head>
        <!-- Made with love by Maor Dayan 
        Tutorials Site CMS by Dimitris T. (https://github.com/dimitrist19) -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="MD">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="<?= $settings['faviconurl'] ?>" type="image/x-icon">
        <meta name="description" content="<?= $settings['hostname'] ?> | Web Hosting Video Tutorials">

        <title><?= $settings['hostname'] ?> - Video Tutorials</title>
        <link rel="stylesheet" href="assets/css/mobirise-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/socicon-styles.css">
        <link rel="stylesheet" href="assets/css/dropdown-style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mobirise-assets@1.0.1/tether/tether.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preload" as="style" href="assets/css/mbr-additional.css"><link rel="stylesheet" href="assets/css/mbr-additional.css" type="text/css">
        <style>
<?= $settings['css_code'] ?>
        </style>
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
                        <span class="navbar-logo"><a href="index.php"><img src="<?= $settings['logourl'] ?>" alt="Logo" style="height: 3.8rem;"></a></span>
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-1" href="index.php#header2-1"></a></span>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="index.php#header2-1">Home</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="tutorials.php">Video Tutorials</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="index.php#next">&nbsp;<i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </nav>
        </section>
        <?php
        if (!isset($_GET['id'])) {
            while ($tutorial = mysqli_fetch_array($getTutorials)) {
                echo '<section class="header7 cid-rEMpe1dCB9">
    <div class="container">
        <div class="media-container-row">

            <div class="media-content align-right">
                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">' . $tutorial['title'] . '</h1>
                <div class="mbr-section-text mbr-white pb-3">
                    <p class="mbr-text mbr-fonts-style display-5">' . $tutorial['description'] . '</p>
                </div>
                <div class="mbr-section-btn"><a class="btn btn-md btn-primary display-5" href="tutorials.php?id=' . $tutorial['id'] . '">Read More</a></div>
            </div>
            <div class="mbr-figure" style="width: 100%;">' . $tutorial['videourl'] . '</div>
            </div>
        </div>
    </div>
</section>';
            }
        } else if (isset($_GET['id'])) {
            $getTutorialById = mysqli_query($conn, "SELECT * FROM tutorials WHERE id = {$_GET['id']}");
            $singleTutorial = mysqli_fetch_array($getTutorialById);
            if (is_null($singleTutorial['id'])) {
                echo '<section class="header7 cid-rEMpe1dCB9">
    <div class="container">
        <div class="media-container-row">
            <div class="media-content align-right">
                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">404 Not Found</h1>
                <div class="mbr-section-text mbr-white pb-3">
                    <p class="mbr-text mbr-fonts-style display-5">Looks like you are lost!</p>
                </div>
                <div class="mbr-section-btn"><a class="btn btn-md btn-primary display-5" href="tutorials.php">Go Back</a></div>
            </div>
            <div class="mbr-figure" style="width: 100%;"><img src="assets/img/404.png"></div>
            </div>
        </div>
    </div>
</section>';
            } else {
                $tutorial['id'] = $_GET['id'];
                echo '<section class="header7 cid-rEMpe1dCB9">
    <div class="container">
        <div class="media-container-row">
            <div class="media-content align-center">
                <a href="tutorials.php"><font color="white"><i class="fa fa-arrow-left"></i> Back to all tutorials</font></a>
                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">' . $singleTutorial['title'] . '</h1>
                <div class="mbr-section-text mbr-white pb-3">
                    <p class="mbr-text mbr-fonts-style display-5">' . $singleTutorial['description'] . '</p>
                </div>
            </div>
            </div>
            <div class="mbr-figure" style="width: 100%;">' . $singleTutorial['videourl'] . '</div>
        </div>
    </div>
</section>';
                ?>
                <?php
                if (!isset($singleTutorial['body'])) {
                    
                } else if (is_null($singleTutorial['body'])) {
                    
                } else if (empty($singleTutorial['body'])) {
                    
                } else {
                    echo '<div style="padding: 75px;">' . $singleTutorial['body'] . '</div>';
                }
            }
        }
        mysqli_close($conn);
        ?>
        <section class="cid-rEPlBpa0xu" id="footer1-1g">
            <div class="container">
                <div class="media-container-row content text-white">
                    <div class="col-12 col-md-3">
                        <div class="media-wrap">
                            <a href="index.php">
                                <img src="<?= $settings['logourl'] ?>" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    </div>
                    <div class="col-12 col-md-3 mbr-fonts-style display-7">
                        <h5 class="pb-3">Links</h5>
                        <p class="mbr-text"><a href="<?= $settings['homeurl'] ?>">Homepage</a><br><a href="<?= $settings['supporturl'] ?>" target="_blank">Support</a><br><a href="<?= $settings['knowledgebaseurl'] ?>" target="_blank">Knowledgebase</a><br></p>
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
                                © Copyright 2022 <b><a href="<?= $settings['homeurl'] ?>"><?= $settings['hostname'] ?></a></b> - Tutorials Site CMS by <b><a href="https://github.com/dimitrist19">Dimitris T.</a></b>
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
    </body>
</html>