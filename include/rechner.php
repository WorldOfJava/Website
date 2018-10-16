<?php

// DB Verbindung herstellen

    $pdo = new PDO('mysql:host=localhost;dbname=taschenrechner', 'root', '');
	$pdo->exec("set names utf8");
	echo '<br><b> Verbindung zur DB erfolgreich</b><br>';
	


	$num1= $_POST['number1'];
	$num2= $_POST['number2'];
		
	if(is_numeric($num1) && is_numeric($num2))
	{
		if(isset($_POST['g']))
		{
			$operation = $_POST['g'];
				
			switch($operation)
			{
				case '+';
				$result=$num1+$num2;
				break;
					
				case '-';
				$result=$num1-$num2;
				break;
					
				case '*';
				$result=$num1*$num2;
				break;
					
				case '/';
				if($num2 == 0)
				{
					echo "<br>Teilen durch null nicht möglich ";
				}
				else
				{
					$result=$num1/$num2;
					break;
				}
					
				case '^';
				$result=pow($num1, $num2);
			    break;
					
			    case '%';
				$result=$num1%$num2;
				break;
			}
				
		}
		else 
		{
			echo "Bitte wähle einen Operator aus";
		}
	}
	

// funktioniert
function fillDatabaseBillig($pdo)
{
	$vorname = $_POST['vorname'];
	$nachname = $_POST['nachname'];
	$email = $_POST['email'];
		
	if(empty($vorname) || empty($nachname) || empty($email))
	{
		echo 'Bitte füllen sie alle Felder aus <br>';
	} 
	else 
	{ 
		$sql2 = $pdo->prepare("INSERT INTO billig(Vorname, Nachname, Email) VALUES (:vorname, :nachname, :email)");
		$sql2->bindParam(':vorname', $vorname);
		$sql2->bindParam(':nachname', $nachname);
		$sql2->bindParam(':email', $email);
		$sql2->execute();
		echo 'Eintrag wurde in der Datenbank gespeichert';
	}
		
}

// funktioniert
function printDatabaseBillig($pdo)
{
	$pdoSQL2 = "SELECT * FROM billig";
	echo '<form method="POST" action="Startseite.php">';
	echo '<table width="600" border="1" cellpadding="1" cellspacing="1">';
	    echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Vorname</th>";
		echo "<th>Nachname</th>";
		echo "<th>Email</th>";
		echo "<th>Aktion</th>";
	foreach ($pdo->query($pdoSQL2) as $row) 
	{
		echo "</tr>";
		echo "<tr>";
		echo "<td>" .$row['ID']."<br/> </td>";
		echo "<td>" .$row['Vorname']."<br/> </td>";
		echo "<td>" .$row['Nachname']."<br/> </td>";
		echo "<td>" .$row['Email']."<br/> </td>";
		echo "<td>" . '<button name="btn2" value="'.$row["ID"].'" >Löschen</button>' . "</td>";
		echo "</tr>";
	}
	echo '<button name="dropTable2">Ganze Tabelle löschen</button>';
	echo "</table>";
	echo '</form>';
}

function fillDatabaseBerechnungen($result, $pdo)
{
	$num1 = $_POST['number1'];
	$num2 = $_POST['number2'];
	$operation = $_POST['g'];
			
	$sql3 = $pdo->prepare("INSERT INTO berechnungen(Erste_Zahl, Operator, Zweite_Zahl, Ergebnis) 
	VALUES (:num1, :operation, :num2, :result)");
	$sql3->bindParam(':num1', $num1);
	$sql3->bindParam(':operation', $operation);
	$sql3->bindParam(':num2', $num2);
	$sql3->bindParam(':result', $result);
	$sql3->execute();
	echo $num1 . $operation . $num2 . '=' . $result;
	echo '<br>Eintrag wurde in der Datenbank gespeichert';
} 

// funktioniert
function printDatabaseBerechnungen($pdo)
{
	// DB Inhalt ausgeben
	$pdoSQL3 = "SELECT * FROM berechnungen";
	echo '<form method="POST" action="Startseite.php">';
	echo '<table width="600" border="1" cellpadding="1" cellspacing="1" >';
	    echo "<tr>";
	    echo "<th>ID</th>";
		echo "<th>Erste Zahl</th>";
		echo "<th>Operator</th>";
		echo "<th>Zweite Zahl</th>";
		echo "<th>Ergebnis</th>";
	    echo "<th>Aktion</th>";
	foreach ($pdo->query($pdoSQL3) as $row2)
	{
		echo "</tr>";
		echo "<tr>";
		echo '<td>' .$row2['ID'] . "</td>";
		echo '<td>' .$row2['Erste_Zahl'] . "</td>";
		echo '<td>' .$row2['Operator'] . "</td>";
		echo "<td>" .$row2['Zweite_Zahl']. "</td>";
		echo "<td>" .$row2['Ergebnis']. "</td>";
		echo "<td>" . '<button name="btn" id="btn" value= "'.$row2["ID"].'" >Löschen</button>' . "</td>";
		echo "</tr>";
	}
	echo '<button name ="dropTable">Ganze Tabelle löschen</button>';
	echo '</table>';
	echo '</form>';
}



function checkSet($pdo, $result)
{
	if(isset($_POST['zahlschicken']))
    {
		
		fillDatabaseBerechnungen($result, $pdo);
    }
	
	if (isset($_POST['printBerechnungen']))
	{
		printDatabaseBerechnungen($pdo);
	}
	
	if(isset($_POST['anBilligSchicken']))
	{	
		fillDatabaseBillig($pdo);
	}
	
	if (isset($_POST['printBillig']))
	{
		printDatabaseBillig($pdo);
	}

	
	if(isset($_POST['btn']))
	{
		$löschen = $pdo->prepare("DELETE FROM berechnungen WHERE ID = ? ");
		$löschen->execute(array($_POST['btn']));
	}
	
	if(isset($_POST['btn2']))
	{
		$löschen = $pdo->prepare("DELETE FROM billig WHERE ID = ? ");
		$löschen->execute(array($_POST['btn2']));
	}
	
	if(isset($_POST["dropTable"]))
	{
		$dropTable = $pdo->prepare("TRUNCATE TABLE berechnungen");
		$dropTable->execute(array($_POST["dropTable"]));	
	}
	
	if(isset($_POST["dropTable2"]))
	{
		echo '<br>Tabelleninhalt gelöscht';
		$dropTable = $pdo->prepare("TRUNCATE TABLE billig");
		$dropTable->execute(array($_POST["dropTable2"]));
	}
}

checkSet($pdo, $result);
?>