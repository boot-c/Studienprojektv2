<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
</head>

<script src="jquery.ajaxform.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<body>
<form>

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

$("form").submit(function(event) {
	alert("this");
});



</script>
    
</body>
</html>