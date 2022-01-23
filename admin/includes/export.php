<?php
session_start();
if (!isset($_SESSION['loggedin'])) {

    header('Location: ../login.php');

    //exit();
}

// Database Connection
require "../../config.php";

// get Tutorials
$query = "SELECT title, description, videourl, body FROM tutorials";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$tutorials = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tutorials[] = $row;
    }
}

$filename = 'tutorials_export.json';
// file creation
$file = fopen($filename, "w");

fwrite($file, json_encode($tutorials));

fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=" . $filename);

readfile($filename);

// deleting file
unlink($filename);
