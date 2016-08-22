<?php
$con = mysqli_connect("127.0.0.1", "root", "ssdgA2016");
$db = mysqli_select_db($con, 'db_till');
$id = mysqli_real_escape_string($con,$_POST['id']);
$query = "DELETE FROM Users WHERE id='$id' LIMIT 1";
echo $id;
mysqli_query($con, $query);
mysqli_close($con);
header("Location: http://193.175.38.206/hausaufgabetill.php");
exit();
?>
