<?php
session_start();
$benutzer_name=$_SESSION['benutzer_name'];
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
    <title>Funktionsauswahl</title>
  </head>
  <body>
	<h2>Hallo <?php echo $benutzer_name; ?>!</h2>
	<p>Folgende Funktionen stehen Ihnen zur Verfügung:</p>
	<ul>
		<li><a href="http://localhost/Website/pages/Logout.php">Abmelden</a></li>
	</ul>
  </body>
</html>