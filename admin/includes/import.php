<?php
session_start();
if (!isset($_SESSION['loggedin'])) {

    header('Location: ../login.php');

    //exit();
}

function add_to_database($values) {
    require '../../config.php';
    $query = "INSERT INTO tutorials (id, title, description, videourl, body) VALUES (NULL, ?, ?, ?, ?)";
    //mysqli_query($conn, $query) or die(mysqli_error($conn));
    $stmt = $conn->prepare($query);

    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('ssss', $values['title'], $values['description'], $values['videourl'], $values['body']);

    $stmt->execute();
}

$target_dir = "../includes/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

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


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        header('Location: ../backup.php?error');
    }
}

$import = file_get_contents($target_file);
$json = json_decode($import, true);
foreach ($json as $arr) {
    $values = array('title' => $arr['title'], 'description' => $arr['description'], 'videourl' => $arr['videourl'], 'body' => $arr['body']);
    add_to_database($values);
}

header('Location: ../backup.php?success');
unlink($target_file);
?>

