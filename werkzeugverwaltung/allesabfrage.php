<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/notstyle.css">
<title>Abfrage Werkzeug</title>
</head>
<body>
<center>
<?php
require_once ('/scripte/database.php');
$suche = "";
if (isset($_GET['suche'])){
	$suche = $_GET['suche'];
}
?>
<form>
	<input type="text" class="search" name="suche" value="<?php echo $suche;?>">
	<input type="submit" value="suchen">
</form>
<?php
$sql = "SELECT * FROM werkzeug
				WHERE (Bezeichnung LIKE '%" . $suche . "%'
				OR Anmerkung LIKE '%" . $suche . "%')";
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ung&uuml;ltige Abfrage: ' . mysqli_error());
}

echo "<table class='rand' width='800'>";
echo "<tr><th>Bezeichnung</th><th>Anmerkung</th></tr>";

while ($zeile = mysqli_fetch_array($db_erg))
{
  echo "<tr class='rand'>";
  echo "<td class='rand'><a href=nurwerkzeug.php?id=".$zeile['Werkzeug_ID'].">". $zeile['Bezeichnung'] . "</a></td>";
  echo "<td class='rand'>". $zeile['Anmerkung']. "</td>";
  echo "</tr>";
}
echo "</table>";
?>
</center>
</body>
</html>