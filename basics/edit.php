<?php
session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location:index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
$id_exists = false;
?>

<html>
    <head>
        <title>My first PHP website</title>
    </head>

    <body>
        <h2>Home Page</h2>
        <p>Hello <?php Print "$user" ?>!</p> <!--Displays user's name-->
        <a href="logout.php">Click here to logout</a><br/><br/>
        <a href="home.php">Return to Home page</a>
        <h2 align="center">Currently Selected</h2>
        <table border="1px" width="100%">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Post Time</th>
                <th>Edit Time</th>
                <th>Public Post</th>
            </tr>
            <?php
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

                $sql = "Select * from list Where id='$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        Print "<tr>";
                        Print '<td align="center">' . $row['id'] . "</td>";
                        Print '<td align="center">' . $row['details'] . "</td>";
                        Print '<td align="center">' . $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
                        Print '<td align="center">' . $row['date_edited'] . " - " . $row['time_edited'] . "</td>";
                        Print '<td align="center">' . $row['public'] . "</td>";
                        Print "</tr>";
                    }
                } else {
                    $id_exists = false;
                }
            }
            ?>
        </table>
        <br/>
        <?php
        if ($id_exists) {
            Print '
		<form action="edit.php" method="POST">
			Enter new detail: <input type="text" name="details"/><br/>
			public post? <input type="checkbox" name="public[]" value="yes"/><br/>
			<input type="submit" value="Update List"/>
		</form>
		';
        } else {
            Print '<h2 align="center">There is no data to be edited.</h2>';
        }
        ?>
    </body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $details = $_POST['details'];
    $public = "no";
    $id = $_SESSION['id'];
    $time = strftime("%X"); //time
    $date = strftime("%B %d, %Y"); //date

    foreach ($_POST['public'] as $list) {
        if ($list != null) {
            $public = "yes";
        }
    }
    
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

    $sql = "UPDATE list SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    //header("location: home.php");
     Print '<script>window.location.assign("home.php");</script>'; // redirects to login.php
}
?>