<?php
session_start();
include("../include/function.php");
include("../include/db_login.php");


	//Eine DB-Verbindung wird hergestellt
	$mysqli = new mysqli($host, $user, $pwd, $db);

	if ($mysqli->connect_errno) 
	{
		echo "Anmeldung fehlgeschlagen: ". $mysqli->connect_errno;
		exit(0);
	}
	//Der Zeichensatz zur Verstaendigung mit der DB wird festgelegt
	$mysqli->set_charset("utf8");
	
	//die Funktion sichere_eingaben() finden Sie im include function.php
	$benutzer_name = sichere_eingaben($mysqli, $_POST['benutzer_name']);
	$passwort = md5(sichere_eingaben($mysqli, $_POST['passwort']));


	$ergebnismenge = $mysqli->query("SELECT ID, Benutzername
	                                 FROM benutzer
	                                WHERE Benutzername = '".$benutzer_name."'
								      AND passwort = '".$passwort."'");


	if($datensatz = $ergebnismenge->fetch_assoc())
	{
		$ID = $datensatz['ID'];
		$_SESSION['ID']=$datensatz['ID'];
		$_SESSION['benutzer_name']=$datensatz['Benutzername'];
		//Aufrauenen
		//Die verwendeten Datenmengen werden geloescht
		$ergebnismenge->free_result();
		//Die Datenbankverbindung wird geschlossen
		$mysqli->close();
		//Das ist die Uebergabe an eine andere PHP-Datei
		header('Location: funktionsauswahl.php');
	}
	else
	{
		echo "<p>Die Anmeldedaten sind fehlerhaft<br/>
			 <a href=\"anmelden_anfrage.html\">Zur&uuml;ck zur Anmeldung</a></p>";
	}
	//Aufraeumen
	$ergebnismenge->free_result();
	$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../css/style.css">
</head>

</html>