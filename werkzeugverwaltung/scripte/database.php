<?php
error_reporting(E_ALL);
require_once ('konfig.php');
$db_link = mysqli_connect(MYSQL_HOST,
							MYSQL_BENUTZER,
							MYSQL_KENNWORT);
//Datenbank erstellen falls sie nicht vorhanden ist
$sql = 'CREATE DATABASE IF NOT EXISTS '.MYSQL_DATENBANK;
mysqli_query($db_link, $sql) or die("Schreiben der Datenbank fehlgeschlagen: " . mysql_error());
//Tabelle erstellen falls sie nicht vorhanden ist
$db_link = mysqli_connect(MYSQL_HOST,
							MYSQL_BENUTZER,
							MYSQL_KENNWORT,
							MYSQL_DATENBANK);
//Erstelle Kästen falls nicht vorhanden
$sql = "CREATE TABLE IF NOT EXISTS Kaesten 
							( `Kasten_ID` INT(2) NOT NULL AUTO_INCREMENT,
							`Bezeichnung` VARCHAR(30) NOT NULL,
							`Anmerkung` TEXT NULL,
							PRIMARY KEY (`Kasten_ID`))";
mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());

//Erstelle Boxen falls nicht vorhanden
$sql = "CREATE TABLE IF NOT EXISTS Boxen 
							( `Box_ID` INT(2) NOT NULL AUTO_INCREMENT,
							`Kasten_ID` INT(2) NOT NULL,
							`Bezeichnung` VARCHAR(30) NOT NULL,
							`Anmerkung` TEXT NULL,
							PRIMARY KEY (`Box_ID`))";
mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());

//Erstelle Boxen falls nicht vorhanden
$sql = "CREATE TABLE IF NOT EXISTS Werkzeug 
							( `Werkzeug_ID` INT(2) NOT NULL AUTO_INCREMENT,
							`Box_ID` INT(2) NOT NULL,
							`Bezeichnung` VARCHAR(30) NOT NULL,
							`Anmerkung` TEXT NULL,
							PRIMARY KEY (`Werkzeug_ID`));";
mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());
?>