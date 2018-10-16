<?php
session_start();
session_destroy();

echo "Logout erfolgreich";

header("Refresh:3; http://Localhost/Website/Startseite.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
</html>