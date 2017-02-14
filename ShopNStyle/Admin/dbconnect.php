<?php
/**
 * Created by PhpStorm.
 * User: priya
 * Date: 2/3/2017
 * Time: 12:26 PM
 */

define("SERVER", "localhost");
define("DRIVER", "{SQL Server}");

/**
 * @return PDO $conn returns the connection object
 */
function connect () {
    $databaseName = "db_project";
    try {
        $conn = new PDO('odbc:Driver='.DRIVER.';Server='.SERVER.';databaseName='.$databaseName.'');
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
}