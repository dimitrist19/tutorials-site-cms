<?php

function redirect_by_path($path)
{
    $redirect = substr(strtr(realpath($path), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $redirect");
    exit;
}

if (file_exists(__DIR__ . '/../install.php')) {
    redirect_by_path(__DIR__ . '/../install.php');
}

if (!file_exists('config.php') && !file_exists(__DIR__ . '/../config.php')) {
    die('Missing configuration file. Please reinstall.');
}
