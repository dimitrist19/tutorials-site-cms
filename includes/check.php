<?php
    if (file_exists('install.php')) {
        header('Location: install.php');
    }
    else if (file_exists('../install.php')) {
        header('Location: ../install.php');
    }
    else if (file_exists('config.php')) {
    }
    else if (file_exists('../config.php')) {
    }
    else {
        die('Configuration File Does Not Exist');
    }
?>