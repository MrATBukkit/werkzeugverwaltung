<html>
<head>
<title>Kasten speichern</title>
</head>
<body>
<?php
$Bezeichnung = $_POST['Bezeichnung'];
$Anmerkung = $_POST['Anmerkung'];
require_once ('../scripte/database.php');
if ($_POST['id'] != "none"){
	$id = $_POST['id'];
	
	$sql = "UPDATE `kaesten` SET `Bezeichnung` = '$Bezeichnung', `Anmerkung` = '$Anmerkung' WHERE `Kasten_ID` = $id";
	mysqli_query($db_link, $sql) or die("Ein Fehler beim aktualisieren in die Datenbank ist aufgeträten: ");
	
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/../../kaesten.php?id='.$id);
	exit();
}
//Variablen einlesen

$sql = "INSERT INTO kaesten (`Bezeichnung`, `Anmerkung`) VALUES ('$Bezeichnung', '$Anmerkung')";
mysqli_query($db_link, $sql) or die("Ein Fehler beim Schreiben in die Datenbank ist aufgeträten: ");

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
echo "<center><h1>Daten gespeichert</h1></center>";
?>
<script language="javascript"> 
function Weiterleitung() 
{ 
   window.location = "<?php echo $uri; ?>/werkzeugverwaltung/formkasten.php";; 
} 
window.setTimeout("Weiterleitung()", 1000); 
</script>
</body>
</html>