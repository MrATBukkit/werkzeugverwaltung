<html>
<head>
<title>Werkzeug anlegen</title>
<link rel="stylesheet" type="text/css" href="./css/notstyle.css">
</head>
<body>
<center>
<?php
$bezeichnung = "Werkzeug";
$box = "";
$id = "none";
if (isset($_POST['Bezeichnung'])) {
	$bezeichnung = $_POST['Bezeichnung'];}

if (isset($_POST['id'])){
	$id = $_POST['id'];
}

if (isset($_POST['Box'])){
	$box = $_POST['Box'];
}

function selectyes($wert1, $wert2) {
	if ($wert1 == $wert2) {
		return "selected=''";
	}
	return "";
}
if ($id == "none"){
	echo "<h1>Neues Werkzeug anlegen</h1><br>";
}
else {
	echo "<h1>Werkzeug bearbeiten</h1><br>";
}
?>

<form action="speichere/speichwerkzeug.php" method="post">
	<table>
	<tr><td>Bezeichnung</td><td><input type="text" name="Bezeichnung" value="<?php if (isset($_POST['Bezeichnung'])) echo $_POST['Bezeichnung']; ?>"></td></tr>
	<tr><td>Box</td><td><select name="Box">
	<?php
		require_once ('scripte/database.php');
		$sql = "SELECT Box_ID, Bezeichnung FROM boxen";
		$db_erg = mysqli_query( $db_link, $sql );
		while ($zeile = mysqli_fetch_array($db_erg))
		{
			echo "<option value='".$zeile['Box_ID']."' ".selectyes($zeile['Box_ID'], $box).">".$zeile['Bezeichnung']." ".$zeile['Box_ID']."</option>";
		}
	?>
	</select>
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