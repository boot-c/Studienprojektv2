<?php
	  
	  

// Create connection
function sel($table, $ROW1, $ROW2, $ROW3){
$servername = "localhost";
$username = "root";
$password = "ssdgA2016";
$dbname = "wastl";
$VAL1 = $_GET["ID"];

$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "Insertion Failed";
}
#$sql = "INSERT INTO 'table_wastl' ('".$ROW1."', '".$ROW2."', '".$ROW3."') VALUES ('".$VAL1."', '".$VAL2."', '".$VAL3."');";
$sql = "DELETE FROM `".$table."` WHERE ID=".$VAL1." ;";
$result = $conn->query($sql);



$conn->close();
echo "Datensatz mit ID ".$VAL1."gelöscht";
}
sel(table_wastl, Name, Vorname, Gewicht);

?>