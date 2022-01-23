<?php

if (file_exists(__DIR__ . '/../install.php')) {
    header('Location: install.php');
    die;
}

if (!file_exists('config.php') && !file_exists(__DIR__ . '/../config.php')) {
    die('Missing configuration file. Please reinstall.');
}
