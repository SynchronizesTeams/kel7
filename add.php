<?php
include("services/db.php");
session_start();
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];

    $file = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "images/" . $file);

    $sql = "INSERT INTO `tblist` (`image`) VALUES ('$file')";
    echo "<div><img src='images/$file'</img></div>";
    header("location: dashboard.php");
}
