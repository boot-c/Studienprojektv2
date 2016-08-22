<?php
	  
	  

// Create connection
function sel($table, $ROW1, $ROW2, $ROW3){
$servername = "localhost";
$username = "root";
$password = "ssdgA2016";
$dbname = "wastl";
$VAL1 = $_GET["name"];
$VAL2 = $_GET["vorname"];
$VAL3 = $_GET["gewicht"];
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "Insertion Failed";
}
#$sql = "INSERT INTO 'table_wastl' ('".$ROW1."', '".$ROW2."', '".$ROW3."') VALUES ('".$VAL1."', '".$VAL2."', '".$VAL3."');";
$sql = "INSERT INTO `".$table."` (`".$ROW1."`, `".$ROW2."`, `".$ROW3."`) VALUES ('".$VAL1."', '".$VAL2."', '".$VAL3."');";
$result = $conn->query($sql);



$conn->close();
echo "Datensatz eingefügt";
}
sel(table_wastl, Name, Vorname, Gewicht);

?>