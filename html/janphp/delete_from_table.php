<?php

// Create connection
function con() {
    $servername = "localhost";
    $username = "root";
    $password = "ssdgA2016";
    $dbname = "db_jan";

// Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    return $con;
}

function delete_from_table($table) {
    $con = con();
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $sql = "DELETE FROM $table WHERE id=$id";
    $con->query($sql);
    $con->close();
}

delete_from_table(songs);
?>