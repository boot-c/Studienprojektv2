<html>
<head>
<title>Online PHP Script Execution</title>
<link href="hausaufgabewastl.css" rel="stylesheet" type="text/css">
</head>
<script src="jquery.ajaxform.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<body>
<?php 
echo $_GET["name"];
?>
<p id="results" class="info"><p>
<div > 
<div id="demo"></div>
<p id= "insert"></P>
</div>

<form  id="form">
    <label class="h2" form="person"></label>
    <label for="nem">Name</label> <br>

    <input type="text" name="name" id="name" maxlength="30"><br>

 
    <label for="vorname">Vorname</label>  <br>

    <input type="text" name="vorname" id="vorname" maxlength="40"><br>
    
    <label for="gewicht">Gewicht</label>  <br>

    <input type="text" name="gewicht" id="gewicht" maxlength="40"><br>
    


    <button type="reset">Eingaben zurücksetzen</button>
    <button type="submit">Eingaben absenden</button>
</form>


<script>
loadDoc('/wastlphp/show_table.php', myFunction, normopen);

$("form").submit(function(event) {
	event.preventDefault();
var form = $(this);
var str = form.serialize();
loadDoc('/wastlphp/insert_table.php?', comDB, formopen, str); 
$("form").clearForm();

});




function loadDoc(url, cfunc, myopen, form) {
	
    var xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            cfunc(xhttp);
        }
    };
	
myopen(url, xhttp, form);


}
function formopen(url, xhttp, str){
xhttp.open("GET", url+str, true);
xhttp.send();
}
function normopen(url, xhttp){
xhttp.open("GET", url, true);
xhttp.send();	
}

function myFunction(xhttp) {
  document.getElementById("demo").innerHTML = xhttp.responseText;
}
function comDB(xhttp){

loadDoc('/wastlphp/show_table.php', myFunction, normopen);
document.getElementById("results").innerHTML = xhttp.responseText;
}


function delete_from_table(str){

	
}




$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = -1;
  });
};
</script>

</body>
</html>
