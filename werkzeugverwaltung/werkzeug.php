<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<title>Abfrage Boxen</title>
</head>
<body>
<center>
<?php
require_once ('/scripte/database.php');

$sql = "SELECT * FROM werkzeug WHERE Box_ID = ".$_GET['id'];
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ung&uuml;ltige Abfrage: ' . mysqli_error());
}

echo "<table border width='800'>";
echo "<tr><th>Bezeichnung</th><th>Anmerkung</th><th>Werkzeug bearbeiten</th></tr>";

while ($zeile = mysqli_fetch_array($db_erg))
{
  echo "<tr>";
  echo "<td>". $zeile['Bezeichnung'] . "</td>";
  echo "<td>". $zeile['Anmerkung']. "</td>";
  echo "<td><form action='formwerkzeug.php' method='post'>
  <input type='submit' value='' class='aendern'>
  <input type='hidden' name='id' value='".$zeile['Werkzeug_ID']."'>
  <input type='hidden' name='Bezeichnung' value='".$zeile['Bezeichnung']."'>
  <input type='hidden' name='Box' value='".$zeile['Box_ID']."'>
  <input type='hidden' name='Anmerkung' value='".$zeile['Anmerkung']."'>
  </form></td>";
  echo "</tr>";
}
echo "</table>";
?>
<FORM><INPUT Type="button" VALUE="zur&uuml;ck" onClick="history.go(-1);return true;"></FORM>
</center>
</body>
</html>