<html>
<head>
<title>Abfrage K&auml;sten</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<center>
<?php
require_once ('/scripte/database.php');

$sql = "SELECT * FROM kaesten";
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ung&uuml;ltige Abfrage: ' . mysqli_error());
}

echo "<table border width='800'>";
echo "<tr><th>K&auml;sten</th><th>Anmerkung</th><th>Kasten bearbeiten</th></tr>";

while ($zeile = mysqli_fetch_array($db_erg))
{
  echo "<tr>";
  echo "<td><a href='boxen.php?id=$zeile[Kasten_ID]'>". $zeile['Bezeichnung'] . " ". $zeile['Kasten_ID']. "</a></td>";
  echo "<td>". $zeile['Anmerkung']. "</td>";
  echo "<td><form action='formkasten.php' method='post'><input type='submit' value='' class='aendern'>
		<input type='hidden' name='id' value=".$zeile['Kasten_ID'].">
		<input type='hidden' name='Bezeichnung' value='".$zeile['Bezeichnung']."'>
		<input type='hidden' name='Anmerkung' value='".$zeile['Anmerkung']."'>
		</form></td>";
  echo "</tr>";
}
echo "</table>";
?>
</center>
</body>
</html>