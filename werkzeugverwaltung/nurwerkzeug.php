<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<title>Abfrage Boxen</title>
</head>
<body>
<center>
<?php
require_once ('/scripte/database.php');

$sql = "select kaesten.Kasten_ID,
				kaesten.Bezeichnung as kastenbezeichnung,
				kaesten.Anmerkung as kastenanmerkung,
				boxen.Box_ID,
				boxen.Bezeichnung as boxenbezeichnung,
				boxen.Anmerkung as boxenanmerkung,
				werkzeug.Bezeichnung as werkzeugbezeichnung,
				werkzeug.Anmerkung as werkzeuganmerkung,
				werkzeug.Werkzeug_ID
				from boxen, kaesten, werkzeug
				where (werkzeug.Werkzeug_ID = ".$_GET['id']."
				and boxen.Box_ID = werkzeug.Box_ID
				and kaesten.Kasten_ID = boxen.Kasten_ID)";
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ung&uuml;ltige Abfrage: ' . mysqli_error());
}

echo "<table border width='100%'>";
echo "<tr><th>Kasten</th><th>Box</th><th>Werkzeug Bezeichnung</th><th>Werkzeug Anmerkung</th></tr>";

while ($zeile = mysqli_fetch_array($db_erg))
{
  echo "<tr>";
  echo "<td>". $zeile['kastenbezeichnung']. " ". $zeile['Kasten_ID'] . "</td>";
  echo "<td>". $zeile['boxenbezeichnung']. " ". $zeile['Box_ID']. "</td>";
  echo "<td>". $zeile['werkzeugbezeichnung']."</td>";
  echo "<td>". $zeile['werkzeuganmerkung']. "</td>";
  echo "</tr></table><form action='formwerkzeug.php' method='post'>
  <input type='submit' value='' class='aendern'>
  <input type='hidden' name='id' value=".$zeile['Werkzeug_ID'].">
  <input type='hidden' name='Bezeichnung' value='".$zeile['werkzeugbezeichnung']."'>
  <input type='hidden' name='Box' value=".$zeile['Box_ID'].">
  <input type='hidden' name='Anmerkung' value='".$zeile['werkzeuganmerkung']."'>
  </form></td>";
}
?>
</center>
</body>
</html>