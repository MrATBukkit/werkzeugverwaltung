<html>
<head>
<title>Kasten anlegen</title>
<link rel="stylesheet" type="text/css" href="./css/notstyle.css">
</head>
<body>
<center>
<?php
$bezeichnung = "Kasten";
$id = "none";
if (isset($_POST['Bezeichnung'])){
	$bezeichnung = $_POST['Bezeichnung'];
}
if (isset($_POST['id'])){
	$id = $_POST['id'];
}
if ($id == "none"){
	echo "<h1>Neuen Kasten anlegen</h1><br>";
}
else {
	echo "<h1>Kasten bearbeiten</h1><br>";
}
?>
<form action="../werkzeugverwaltung/speichere/speichkasten.php" method="post">
	<table>
	<tr><td>Bezeichnung</td><td><input type="text" name="Bezeichnung" value="<?php echo $bezeichnung; ?>"></td></tr>
	<tr><td>Anmerkung</td><td><textarea rows="5" cols="21" name="Anmerkung"><?php if (isset($_POST['Anmerkung'])) echo $_POST['Anmerkung']; ?></textarea></td></tr>
	</table>
	<input type="reset" value="Formular l&ouml;schen"> <input type="submit" value="senden">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
</form>
<?php
if ($id != "none") {
	echo "<FORM><INPUT Type='button' VALUE='zur&uuml;ck' onClick='history.go(-1);return true;'></FORM>";
}
?>
</center>
</body>
</html>