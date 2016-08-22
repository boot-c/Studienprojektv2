<!DOCTYPE php>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hausaufgabe von Till</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./hausaufgabetill.css">
    <link rel="stylesheet" type="text/css" href="">
  </head>
  <body>
	<h2><a href="hausaufgabetill.css">CSS</a></h2>
    <?php
    header('Content-Type: text/html; charset=utf-8');
    echo "<h3>USERS</h3>";
    $user="root";
    $password="ssdgA2016";
    $con =  mysqli_connect("127.0.0.1",$user,$password);
    $db = mysqli_select_db($con, 'db_till');
    $query = mysqli_query($con,"SELECT * FROM Users");
    echo "<table id='user_table'>";
    echo "<tr><th>ID</th><th>PASSWORD</th></tr>";
  	while($row = mysqli_fetch_assoc($query)){
  	echo "<tr>";
		echo "<th>" . $row['id'] ."</th><th> " .$row['pw'];
		echo	"<th><form id='delete_form'  method='post'>";
    echo	"<input type='hidden' name='id' value='" . $row['id'] . "'>";
		echo	"<input type='submit' name='submit' value='Delete'>";
	  echo	"</form></th>";
		echo "</tr>";
	   }
	   echo "</table>";
      mysqli_close();
	   ?>

  <div class="form-wrapper">
  <h3> Add User to Database: </h3>
  <form id="insert_form" method="post">

        <input type="text" placeholder="ID-Name"  name="id" id="idinput">

        <input placeholder="Password"  type="password" name="pw" id="pwinput">

        <input type="submit" value="Absenden" id="submitinput">
 </form>

  </div>
  </body>
</html>

<script>
$("#insert_form").submit(function(event){
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "insert.php",
		data: $(this).serialize(),
		success: function(data){
			$('#user_table').append($(data).fadeIn('slow'));
		},
	});
});
$(document).on("submit", "#delete_form", function(event){
	event.preventDefault();
	var row = $(this).closest("tr");
	$.ajax({
		type: "POST",
		url: "delete.php",
		data: $(this).serialize(),
		success: function(data){
			row.fadeOut(300, function() { $(this).remove(); });
		},
	});
});
 </script>

