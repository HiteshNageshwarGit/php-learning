<?php

class DBHelper {

    private $servername;
    private $dbuname;
    private $dbpwd;
    private $dbname;

    function __construct($params = array()) {
        $servername = "localhost";
        $dbuname = "root";
        $dbpwd = "";
        $dbname = "php-learning";
        $this->connect();
    }

    function connect() {
        $conn = new mysqli($servername, $dbuname, $dbpwd, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    function GetAll() {
        $this->connect();
        $sql = "select * from list";
        $result = $conn->query($sql);
        return $result;
    }

//            // Create connection
//            $conn = new mysqli($servername, $dbuname, $dbpwd, $dbname);
//            // Check connection
//            if ($conn->connect_error) {
//                die("Connection failed: " . $conn->connect_error);
//            }
}
