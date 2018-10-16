<?php
session_start();
ini_set('display_errors', 0);
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];



?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<h1>Kontakt</h1> 
	
	<div id="KontaktFormular">
		<form method="POST" action="../Startseite.php">
			<label for="kontaktVorname" class="kontakt">Vorname:</label>  	
				<input type="text" id="kontaktVorname" name="vorname" required> <br><br>
			<label for="kontaktNachname" class="kontakt">Nachname:</label>
				<input type="text" id="kontaktNachname" name="nachname" required> <br><br>
			<label class="kontakt">Geschlecht:</label>
				<input type="radio" id="frau" name="group1" value="Frau"/><label for="frau">Frau</label>
				<input type="radio" id="mann" name="group1" value="Mann"/><label for="mann">Mann</label> <br><br>
			<label class="kontakt">Telefon:</label>	
				<input type="tel" id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/><br><br>
			<label class="kontakt">Email:</label>	
				<input type="email" name="email" id="mailKontakt" style="margin-left: 30px;" required /> <br><br>
		<div>
			<label for="ihrText" id="nachricht">Ihre Nachricht:</label><br>
				<textarea id="ihrText" name="ihreText" cols="50" rows="8" required ></textarea> <br><br>
		</div>
				<input type="submit" id="doSend">
		</form>
		
	</div>
	
	<h1>Extrem Wichtige Seiten</h1>
	<ul>
	<li><a href="http://localhost/Website/Startseite.php">Startseite</a></li>
	</ul>
</body>


</html>