<?php
    /*
    Subram & Brason
    functions.php
    March 17 2023
    FTH 2023
    */
    
    //constants
    define("EMPLOYEE_NUMBER_LENGTH", 3);
    define("MAXIMUM_NAME_LENGTH", 32);
    define("MAXIMUM_POSITION_LENGTH", 50);
 

    function db_connect() {
        $dbuser = 'fthuser';
        $dbpass = 'P@ssw0rd';
        $host = 'localhost';
        $dbname = 'fth';
        $conn_string = "host=$host port=5432 dbname=$dbname user=$dbuser password=$dbpass";
        $connection = pg_connect($conn_string);

        /*$connection = pg_connect(pgsql:host="localhost", dbname="fth", "fthuser", "P@ssw0rd");*/

        /* pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass*/

        return $connection;
    }

    function displayCopyrightInfo() {
        $copyright = "&copy; " . date("Y") . " All Rights Reserved.";

        echo $copyright;
    }
?>
