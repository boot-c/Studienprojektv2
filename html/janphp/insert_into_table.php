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

function insert_into_table($table) {
    $con = con();
    $artist = mysqli_real_escape_string($con, $_POST['artist']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $hours = empty(mysqli_real_escape_string($con, $_POST['hours'])) ? '0' : mysqli_real_escape_string($con, $_POST['hours']);
    $minutes = empty(mysqli_real_escape_string($con, $_POST['minutes'])) ? '0' : mysqli_real_escape_string($con, $_POST['minutes']);
    $seconds = empty(mysqli_real_escape_string($con, $_POST['seconds'])) ? '0' : mysqli_real_escape_string($con, $_POST['seconds']);
    $sql = "INSERT INTO $table VALUES (NULL, '$artist', '$title', '$hours:$minutes:$seconds')";
    $con->query($sql);
    $con->close();
}

insert_into_table(songs);
?>