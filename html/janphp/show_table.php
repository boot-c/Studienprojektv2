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

function show_table($table) {
    $con = con();
    $sql = "SELECT * FROM $table";
    $result = $con->query($sql);


    echo "<table align='center' style='width:100%'>";
    echo "<tr>"
    . "<th style='width:45%'>Artist</th>"
    . "<th style='width:45%'>Title</th>"
    . "<th style='width:5%'>Duration</th>"
    . "<th style='width:5%'></th>"
    . "</tr>";
// output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>" . "<td>" . $row["artist"] . "</td>" . "<td>" . $row["title"] . "</td>" . "<td>" . $row["duration"] . "</td>"
        . "<td>"
        . "<form id='delete_form' method='post'>"
        . "<input type='hidden' name='id' value='" . $row['id'] . "'>"
        . "<input type='submit' name='delete' value='Delete'>"
        . "</form>"
        . "</td>"
        . "</tr>";
    }
    echo "<tr>"
    . "<form id='insert_form' method='post'></form>"
    . "<td><input form='insert_form' type='text' placeholder='Artist' name='artist'></td>"
    . "<td><input form='insert_form' type='text' placeholder='Title' name='title'></td>"
    . "<td>"
    . "<input form='insert_form' type='number' min='0' max='99' placeholder='Hours' name='hours'>"
    . "<input form='insert_form' type='number' min='0' max='59' placeholder='Minutes' name='minutes'>"
    . "<input form='insert_form' type='number' min='0' max='59' placeholder='Seconds' name='seconds'>"
    . "</td>"
    . "<td><input form='insert_form' type='submit' name='insert' value='Insert'></td>"
    . "</tr>"
    . "</table>";

    $con->close();
}

show_table(songs);
?>