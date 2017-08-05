<?php

include('../OOPs/DBHelper.php'); // call db.class.php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dbHelper = new DBHelper();
    $result = $dbHelper->GetAll();
    if ($result->num_rows > 0) { //IF there are no returning rows or no existing username
        while ($row = $result->fetch_assoc()) { // display all rows from query
            $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
            $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished

            if (($username == $table_users) && ($password == $table_password)) {// checks if there are any matching fields
                if ($password == $table_password) {

                    //Print '<script>window.location.assign("home.php");</script>'; 

                    header("location: home.php"); // redirects the user to the authenticated home page
                    $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                }
            } else {
                Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
                Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
            }
        }
    } else {
        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
}
?>