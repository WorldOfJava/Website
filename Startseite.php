<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Startseite</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body style="background-color: #99ccff">
<header><a href="http://localhost/Website/pages/anmelden_anfrage.html">Anmelden</a> | <a href="http://localhost/Website/pages/registrieren_anfrage.html">Registrieren</a> | <a href="http://localhost/Website/pages/Angular.html">AngularJS</a></header>

<br><br>

<?php 

include("./include/rechner.php");

ini_set('display_errors', 0);
?>
<div id="form1">
<h1>PhP Taschenrechner mit DB-Anbindung</h1>
<form action="Startseite.php" method="POST">
  Zahl1: <input type="number" name="number1" title="Zahl" pattern="^[0-9]+$">
  <select name="g">
    <option value="+">PLUS</option>
    <option value="-">MINUS</option>
    <option value="*">MAL</option>
    <option value="/">GETEILT</option>
    <option value="^">POTENZ</option>
	<option value="%">REST</option>
  </select> 
  Zahl2: <input type="number" name="number2" title="Zahl" pattern="^[0-9]+$" ng-model="number2">
  <?php if(isset($_POST['zahlschicken'])) {echo '=' . $result;}  ?> 
  <br>
  <input type="submit" name="zahlschicken" id="absendenForm1">
  <input type="submit" name="printBerechnungen" value="DB ausgeben">
  <h2 style="color: red">Ergebnis:  <?php if(isset($_POST['zahlschicken'])) {echo $num1 . $operation . $num2 . '=' . $result;}  ?> </h2>
</form>
</div>



</div>

<h1>Extrem Wichtige Seiten</h1>
<ul>
<li><a href="https://psnprofiles.com/ColeInfamousdark">PSN Profiles</a></li>
<li><a href="https://proxer.me/">Proxer</a></li>
<li><a href="https://store.playstation.com/de-de/">PSN Store</a></li>
<li><a href="https://auskunft.avv.de/#!P|TP!histId|1!histKey|H498089">AVV Fahrplanauskunft</a></li>
</ul>

<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.   

At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>


<footer>
	<a href="http://localhost/Website/pages/Impressum.php">Impressum</a> | <a href="http://Localhost/Website/pages/Kontakt.php">Kontakt</a>
</footer>

</body>
</html>