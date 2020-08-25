<?php

session_start();
if (isset($_SESSION['loggedin'])) {

    header('Location: index.php');

    //exit();
} else if (count($_POST) > 0) {
    include '../config.php';
    $captcha = $_POST['g-recaptcha-response'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretkey . "&response=" . $captcha);
    $responseKeys = json_decode($response, true);
    //if (intval($responseKeys["success"]) !== 1) {
      //  $message = '<p class="alert alert-danger">Invalid Captcha!</p>';
    //}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
    //else {
        if (!isset($_POST['username'], $_POST['password'])) {

            // Could not get the data that should have been sent.
            $message = '<p class="alert alert-info">Please fill both the username and password field</p>';
            die();
        }

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.

        if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {

            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"

            $stmt->bind_param('s', $_POST['username']);

            $stmt->execute();

            // Store the result so we can check if the account exists in the database.

            $stmt->store_result();

            if ($stmt->num_rows > 0) {

                $stmt->bind_result($id, $password);

                $stmt->fetch();

                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.

                if (password_verify($_POST['password'], $password) == $password) { //(password_verify)
                    // Verification success! User has loggedin!
                    // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();

                    $_SESSION['loggedin'] = TRUE;

                    $_SESSION['name'] = $_POST['username'];

                    $_SESSION['id'] = $id;

                    header('Location: index.php');
                } else {

                    $message = '<p class="alert alert-danger">Incorrect password!</p>';
                }
            } else {

                $message = '<p class="alert alert-warning">Incorrect username!</p>';
            }
        }

        $stmt->close();
    }
//}
?>