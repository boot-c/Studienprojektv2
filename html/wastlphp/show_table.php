<?php

// Create connection
function con() {
    $servername = "localhost";
    $username = "root";
    $password = "ssdgA2016";
    $dbname = "wastl";
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function sel($table, $row1, $row2, $row3, $row4) {

    $conn = con();
    $query = "SELECT * FROM $table";
    //$query .= "SHOW INDEXES FROM table_name WHERE Key_name = 'PRIMARY'";
    //$result = $conn->query($sql);

    if (mysqli_multi_query($conn, $query)) {
        do {
            /* store first result set */
            if ($result = mysqli_store_result($conn)) {
                echo "<table class= myTable > 
											<tr bgcolor=#EEEEEE>		<td> " . $row1 . ": </td><td>" . $row2 . ": </td><td>" . $row3 . ": </td></tr>";
                while ($row = mysqli_fetch_array($result))

                /* print your results */ {
                    // output data of each row




                    echo "<tr>
											<td>" . $row[$row1] . "</td>
											<td>" . $row[$row2] . "</td>
											<td>" . $row[$row3] . "</td>
											
									
											<td><a href=\"javascript:loadDoc('/wastlphp/delete_from_table.php?ID=" . $row[$row4] . "',comDB, normopen);\" class=\"mybutton\"> delete</a></td>
											</tr>"
                    ;
                }
                echo "</table>";
            }
            mysqli_free_result($result);
        } while (mysqli_next_result($link));
    } else {
        echo "0 results";
    }


    $conn->close();
}

sel(table_wastl, Name, Vorname, Gewicht, ID);
?>