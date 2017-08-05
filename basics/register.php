<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back<br/></a>
        <form action="register.php" method="POST">
            Enter Username: <input type="text" name="username" required="required" /> <br/>
            Enter password: <input type="password" name="password" required="required" /> <br/>
            <input type="submit" value="Register"/>
        </form>
    </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "User Name : " . $username;
    echo "<br/>";
    echo "Password : " . $password;
    $bool = true;

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

    $sql = "select * from users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $uname = $row["username"];
            if ($username == $uname) {
                $bool = false;
                print '<script> alert("User name has been taken"); </script>';
                //print '<script> window.location.assign("register.php"); </script>';
            }
        }
    } else {
        echo "0 results";
    }

    if ($bool) {
        $sql = "INSERT INTO USERS(username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>