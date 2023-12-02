<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="employee";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM kso WHERE id=$id";
    $connection->query($sql);
}   

header ("location: /crud/index.php");
exit;

?>