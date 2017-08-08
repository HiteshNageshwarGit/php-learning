<!DOCTYPE html>
<html>
    <body>

        <br/><br/><br/>
        <strong>String</strong>
        <p>A string can be any text inside quotes</p>
        <?php
        $x = "Hello world!";
        $y = 'Hello world!';

        echo $x;
        echo "<br>";
        echo $y;
        ?>

        <br/><br/><br/>
        <strong>integer</strong>
        <?php
        $x = 5985;
        var_dump($x);
        ?>

        <br/><br/><br/>
        <strong>Float</strong>
        <?php
        $x = 10.365;
        var_dump($x);
        ?>

        <br/><br/><br/>
        <strong>Boolean</strong>
        <?php
        $x = true;
        var_dump($x);
        ?>


        <br/><br/><br/>
        <strong>Array</strong>
        <?php
        $carArray = array("BMW", "Tesla");
        var_dump($carArray);
        ?>


        <br/><br/><br/>
        <strong>Object</strong>
        <?php

        class Car {

            function Car() {
                $this->model = "VW";
            }

        }

// create an object
        $herbie = new Car();
// show object properties
        echo $herbie->model;
        ?>
    </body>
</html>