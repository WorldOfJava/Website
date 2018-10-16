<?php
/*	// DB Verbindung
	$pdo = new PDO('mysql:host=localhost;dbname=website', 'root', '');
	$pdo->exec("set names utf8");
	echo '<br><b> Verbindung zur DB erfolgreich</b><br><br>';

	ini_set('display_errors', 0);
	
	if($_POST['passwort'] != $_POST['repeatPasswort'])
	{
		echo "Passwörter stimmen nicht überein. Bitte geben Sie ihr Passwort erneut ein <br><br>";
	}
*/			
session_start();
//Programm-Code wird mit include eingebunden
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
	$benutzer_name = sichere_eingaben($mysqli, $_POST['Benutzername']);
	$passwort = md5(sichere_eingaben($mysqli, $_POST['passwort']));
	/* $vorname = sichere_eingaben($mysqli, $_POST['vorname']);
	$nachname = sichere_eingaben($mysqli, $_POST['nachname']); */

	
	//Ist dieser Anwendername schon vergeben? Wir schauen dazu in die DB:
	$ergebnismenge = $mysqli->query("SELECT Benutzername
	                                FROM benutzer
	                               WHERE Benutzername = '".$benutzer_name."'");
								   
								   
								   
	//Die folgende if-Abfrage prueft, 
	//ob ueberhaupt ein Datensatz in der Ergebnismenge vorhanden ist.
	if($ergebnismenge->num_rows > 0)
	{
		//Es ist eine Zeile gefunden worden, damit ist der Anwendername schon vergeben - schade
		echo "<p>Der Anwendername ist schon vergeben <br /> \n";
		echo "Zur&uuml;ck zur <a href=\"registieren_anfrage.html\">Registrierung</a></p>";
	}
	else
	{	
		//Der Anwendername ist noch nicht vergeben und kann in die DB eingefuegt werden
		$insert_anweisung = "INSERT INTO benutzer(Benutzername, passwort) 
											VALUES ('".$benutzer_name."','".$passwort."')";
		$mysqli->query($insert_anweisung);
		
		//Es folgt eine Abfrage, ob irgendein Fehler beim Einfuegen aufgetreten ist
		echo $mysqli->error;

		//Hier wird der Anwender in der Session mit seinem Namen gespeichert
		$_SESSION['benutzer_name']= $benutzer_name;

		//Die gerade automatisch vergebene id_anwender
		//wird mit insert_id aus der DB geholt und in der Session gespeichert.
		$_SESSION['ID']  = $mysqli->insert_id;
		
		//Hier kann es dann weiter zur Anwendung gehen
		echo "<h3>Herzlich willkommen ".$benutzer_name."!</h3>";
		echo "<p>Sie k&ouml;nnen nun zur <a href=\"funktionsauswahl.php\">Funktionsauswahl</a> wechseln</p>";
	}
	
	
	//Die verwendeten Datenmengen werden geloescht
	$ergebnismenge->free_result();
	//Die Datenbankverbindung wird geschlossen
	$mysqli->close();	
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>

</body>

</html>