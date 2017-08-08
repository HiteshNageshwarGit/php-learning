<!DOCTYPE html>
<html>
    <body>

        <h1>My first PHP page</h1>

        <?php
        $txt = "stored in variable </br>";
        echo 'Getting value $txt';
        echo "Getting value $txt";
        echo "Getting value" . $txt;

        $x = 5;
        $y = 4;
        echo "Sum is $x + $y";
        $x = "now store text";
        echo "Dynamic language $x";
        ?>

        </br> </br> </br> </br>
        <strong>Global and Local Scope </br></strong>
        <p> Globle variable is accessible in global scope only</p>
        <?php
        $gloable = "I am globle";

        function AccessGlobalInLocal() {
            echo"I am not able to access $gloable </br>";
        }

        AccessGlobalInLocal();
        echo "I am accessing globle in globle scope $gloable";
        ?>


        <strong>Global and Local Scope </br></strong>
        <p> A variable declared within a function has a LOCAL SCOPE and can only be accessed within that function</p>
        <?php

        function myTest() {
            $local = 5; // local scope
            echo "Variable $local inside function is: $local";
        }

        myTest();

// using x outside the function will generate an error
        echo "Variable $local outside function is: $local";
        ?>



        <br/><br/><br/><br/>
        <strong>The global Keyword </br></strong>
        <p> The global keyword is used to access a global variable from within a function.</p>
        <?php
        $x = 5;
        $y = 10;

        function myTest1() {
            global $x, $y;
            $y = $x + $y;
        }

        myTest1();
        echo $y; // outputs 15
        ?>

        <br/><br/><br/><br/>
        <strong>$GLOBALS[index] </br></strong>
        <p> This array is also accessible from within functions and can be used to update global variables directly</p>
        <?php
        $x = 5;
        $y = 10;

        function myTest2() {
            $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
        }

        myTest2();
        echo $y; // outputs 15
        ?>



        <br/><br/><br/><br/>
        <strong>static Keyword </br></strong>
        <?php

        function myTest3() {
            static $x = 0;
            echo $x;
            $x++;
        }

        myTest3();
        myTest3();
        myTest3();

        echo "<br/><br/><br/>";

        function myTest4() {
            static $x = 0;
            echo $x;
            $x = $x + 1;
        }

        myTest4();
        myTest4();
        myTest4();
        ?>
    </body>
</html>