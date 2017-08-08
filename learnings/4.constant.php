<!DOCTYPE html>
<html>
    <body>

        <h1>My first PHP page</h1>

        <?php
        define("GREETING", "Welcome to W3Schools.com!");
        echo GREETING;

        echo"<p>Constants are automatically global and can be used across the entire script.</p>";
        function myTest() {
            echo GREETING;
        }

        myTest();
        ?>
    </body>
</html>