<?php
//ENTER YOUR DATABASE DETAILS HERE
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'tutorials_site_v1';

//SECURITY
//Recaptcha Settings (Recaptcha integration is still in beta phase and currently works only at the password change page)
$sitekey = '6Ld9E8IZAAAAAHKt9L-G08mZ_nKoLIq7jePIJozo'; //ENTER YOUR RECAPTCHA'S SITE KEY
$secretkey = '6Ld9E8IZAAAAAFTGpeJ6p2VXli7V-yy6dFrDlaWT'; //ENTER YOUR RECAPTCHA'S SECRET KEY

//DEBUGGING
error_reporting(0); //Set to -1 if you want to see php errors


//DON'T EDIT
$conn = mysqli_connect("{$dbhost}", "{$dbuser}", "{$dbpass}", "{$dbname}") or die("Connection Error: " . mysqli_error($conn));
?>