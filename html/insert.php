<?php

$user="root";
$password="ssdgA2016";
$mysqli =  mysqli_connect("127.0.0.1",$user,$password, "db_till");
$id = $_POST['id'];
$pw = $_POST['pw'];
$sql = "INSERT INTO Users (id, pw) VALUES ('$id','$pw')";
if($mysqli->query($sql)){
    echo    "<tr><th>" . $id  . "</th><th>" . $pw . "</th>";
    echo    "<th><form id='delete_form'  method='post'>";
    echo    "<input type='hidden' name='id' value='" . $id . "'>";
    echo    "<input type='submit' name='submit' value='Delete'>";
    echo   "</form></th>";
    echo   "</tr>";

} else{

    echo "ERROR: Could not able to execute $sql. " . $mysqli->error() . "<br><a href='hausaufgabetill.php'>Zur Seite zurückkehren</a>";

}

$mysqli->close();

 ?>
