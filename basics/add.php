<?php

session_start();
if ($_SESSION['user']) {
    
} else {
    header("location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $details = $_POST['details'];
    $time = strftime("%X"); //time
    $date = strftime("%B %d, %Y"); //date
    $decision = "no";

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
    foreach ($_POST['public'] as $each_check) { //gets the data from the checkbox
        if ($each_check != null) { //checks if checkbox is checked
            $decision = "yes"; // sets the value
        }
    }

    $sql = "INSERT INTO list(details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"; //SQL query

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    //header("location:home.php");
} else {
   // header("location:home.php");
}
 Print '<script>window.location.assign("home.php");</script>'; // redirects to login.php
?>