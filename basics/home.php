<?php
session_start(); //starts the session
if ($_SESSION['user']) { // checks if the user is logged in  
    $user = $_SESSION['user']; //assigns user value
    //echo 'hell ' . $user;
} else {
    // header("location: index.php"); // redirects if user is not logged in
}
?>

<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Home Page</h2>
    <hello>! 
        <!--Display's user name-->
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <form action="add.php" method="POST">
            Add more to list: <input type="text" name="details" /> <br/>
            Public post? <input type="checkbox" name="public" value="yes" /> <br/>
            <input type="submit" value="Add to list"/>
        </form>
        <h2 align="center">My list</h2>
        <table border="1px" width="100%">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Post Time</th>
                <th>Edit Time</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Public Post</th>
            </tr>

            <?php
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

            $sql = "select * from list";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {        // output data of each row
                while ($row = $result->fetch_assoc()) {
                    Print "<tr>";
                    Print '<td align="center">' . $row['id'] . "</td>";
                    Print '<td align="center">' . $row['details'] . "</td>";
                    Print '<td align="center">' . $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
                    Print '<td align="center">' . $row['date_edited'] . " - " . $row['time_edited'] . "</td>";
                    Print '<td align="center"><a href="edit.php?id=' . $row['id'] . '">edit</a> </td>';
                    Print '<td align="center"><a href="#" onclick="myFunction(' . $row['id'] . ')">delete</a> </td>';
                    Print '<td align="center">' . $row['public'] . "</td>";
                    Print "</tr>";
                }
            }
            ?>
        </table>
        <script>
            function myFunction(id)
            {
                var r = confirm("Are you sure you want to delete this record?");
                if (r == true)
                {
                    window.location.assign("delete.php?id=" + id);
                }
            }
        </script>
    </body> 
</html>