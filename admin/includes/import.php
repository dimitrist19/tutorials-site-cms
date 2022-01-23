<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
}

function add_to_database($values)
{
    require '../../config.php';
    $query = "INSERT INTO tutorials (id, title, description, videourl, body) VALUES (NULL, ?, ?, ?, ?)";
    $stmt  = $conn->prepare($query);

    $stmt->bind_param('ssss', $values['title'], $values['description'], $values['videourl'], $values['body']);

    $stmt->execute();
}

$target_dir  = "../includes/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk    = 1;
$ext         = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10485760) {
    echo "Sorry, maximum upload filesize is 10mb.";
    $uploadOk = 0;
}

if ($ext == 'json') {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header('Location: ../backup.php?error');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        $import = file_get_contents($target_file);
        $json   = json_decode($import, true);
        foreach ($json as $arr) {
            $values = array('title' => $arr['title'], 'description' => $arr['description'], 'videourl' => $arr['videourl'], 'body' => $arr['body']);
            add_to_database($values);
        }
        unlink($target_file);
        header('Location: ../backup.php?success');
        return;
    } else {
        header('Location: ../backup.php?error');
    }
}

unlink($target_file);
header('Location: ../backup.php?error');
