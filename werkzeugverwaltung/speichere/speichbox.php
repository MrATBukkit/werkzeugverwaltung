<html>
<head>
<title>Box speichern</title>
</head>
<body>
<?php
//Variablen einlesen
$Bezeichnung = $_POST['Bezeichnung'];
$kasten= $_POST['kasten'];
$Anmerkung = $_POST['Anmerkung'];
require_once ('../scripte/database.php');
if ($_POST['id'] != "none"){
	$id = $_POST['id'];
	$kastenid = $_POST['kasten'];
	$sql = "UPDATE `boxen` SET `Bezeichnung` = '$Bezeichnung', `Kasten_ID` = '$kastenid', `Anmerkung` = '$Anmerkung' WHERE `Box_ID` = $id";
	mysqli_query($db_link, $sql) or die("Ein Fehler beim aktualisieren in die Datenbank ist aufgeträten: ");
	
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/../../boxen.php?id='.$kastenid);
	exit();
}
$sql = "INSERT INTO boxen (`Bezeichnung`, `Anmerkung`, `Kasten_ID`) VALUES ('$Bezeichnung', '$Anmerkung', '$kasten')";
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
   window.location = "<?php echo $uri; ?>/werkzeugverwaltung/formbox.php";; 
} 
window.setTimeout("Weiterleitung()", 1000); 
</script>
</body>
</html>