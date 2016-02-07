<html>
<head>
<title>Werkzeug anlegen</title>
</head>
<body>
<?php
//Variablen einlesen
$Bezeichnung = $_POST['Bezeichnung'];
$box= $_POST['Box'];
$Anmerkung = $_POST['Anmerkung'];
require_once ('../scripte/database.php');
if ($_POST['id'] != "none"){
	$id = $_POST['id'];
	$boxid = $_POST['Box'];
	$sql = "UPDATE `werkzeug` SET `Bezeichnung` = '$Bezeichnung', `Box_ID` = '$boxid', `Anmerkung` = '$Anmerkung' WHERE `Werkzeug_ID` = $id";
	mysqli_query($db_link, $sql) or die("Ein Fehler beim aktualisieren in die Datenbank ist aufgeträten: ");
	
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/../../werkzeug.php?id='.$boxid);
	exit();
}

$sql = "INSERT INTO werkzeug (`Bezeichnung`, `Anmerkung`, `Box_ID`) VALUES ('$Bezeichnung', '$Anmerkung', '$box')";
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
   window.location = "<?php echo $uri; ?>/werkzeugverwaltung/formwerkzeug.php";; 
} 
window.setTimeout("Weiterleitung()", 1000); 
</script>
</body>
</html>