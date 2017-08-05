<?php

session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location:index.php"); //redirects if user is not logged in.
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (!empty($_GET['id'])) {

        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        $id_exists = true;

        $servername = "localhost";
        $dbuname = "root";
        $dbpwd = "";
        $dbname = "php-learning";

        // Create connection
        $conn = new mysqli($servername, $dbuname, $dbpwd, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM list WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            Print '<script>window.location.assign("home.php");</script>'; // redirects to login.php
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}
?>