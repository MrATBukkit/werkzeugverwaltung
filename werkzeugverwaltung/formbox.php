<html>
<head>
<title>Box anlegen</title>
<link rel="stylesheet" type="text/css" href="./css/notstyle.css">
</head>
<body>
<center>
<?php
$bezeichnung = "Box";
$kasten = "";
$id = "none";
if (isset($_POST['Bezeichnung'])) {
	$bezeichnung = $_POST['Bezeichnung'];}

if (isset($_POST['id'])){
	$id = $_POST['id'];
}

if (isset($_POST['Kasten'])){
	$kasten = $_POST['Kasten'];
}

function selectyes($wert1, $wert2) {
	if ($wert1 == $wert2) {
		return "selected=''";
	}
	return "";
}
if ($id == "none"){
	echo "<h1>Neue Box anlegen</h1><br>";
}
else {
	echo "<h1>Box bearbeiten</h1><br>";
}
?>
<form action="speichere/speichbox.php" method="post">
	<table>
	<tr><td>Bezeichnung</td><td><input type="text" name="Bezeichnung" value="<?php echo $bezeichnung; ?>"></td></tr>
	<tr><td>Kasten</td><td><select name="kasten">
	<?php
		require_once ('scripte/database.php');
		$sql = "SELECT Kasten_ID, Bezeichnung FROM kaesten";
		$db_erg = mysqli_query( $db_link, $sql );
		while ($zeile = mysqli_fetch_array($db_erg))
		{
			echo "<option value='".$zeile['Kasten_ID']."' ".selectyes($zeile['Kasten_ID'], $kasten).">".$zeile['Bezeichnung']." ".$zeile['Kasten_ID']."</option>";
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