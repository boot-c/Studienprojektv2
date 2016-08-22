<?php
//connect
$db = new mysqli('127.0.0.1', 'root', 'ssdgA2016', 'db_chris');

if($db->connect_errno) {
	echo $db->connect_error;
	//die('Fehler'); //tötet die seite und gibt "Fehler" aus
}

//query
if($result = $db->query("SELECT * FROM table_chris")) { 
	if($count = $result->num_rows) {
		echo '<p> Anzahl der Einträge: ', $count, '</p>'; 		

		//get data
		echo '<table style="width:100%">'; //tabelle erstellen

		while($row = $result->fetch_object()) {
			echo '<tr><th>', $row->id, '</th><th>', $row->firstname, '</th><th>', $row->lastname, '</th><th>', $row->created,  '</th></tr>';
		}
		echo '</table>';
		//free
		$result->free();
	}

}else {
	die($db->error);
}
