//Dependecies: PDO installed

<?php    
//Prints error
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'networkuser';
$password = 'networkuserdatabase';
$database = 'testdatabase';
 
//An options array.
//Set the error mode to "exceptions"
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
 
//Connect
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password, $pdoOptions);

//Request by ID
$stmt = $pdo->query('SELECT * FROM testtable');
echo "<h1>" , "Database"  , "</h1>";
echo "<table style='font-family: Georgia, sans-serif;'>";

echo "<tr>";
	 echo "<td>", "Testrow1" , "</td>";
   echo "<td>", "Testrow2" , "</td>";
echo "</tr>";

while ($row = $stmt->fetch()){

	echo "<tr>";
		echo "<td style='border: 1px solid black;'>", $row['testrow1'], "</td>";
		echo "<td style='border: 1px solid black;'>", $row['testrow2'], "</td>";
	echo "</tr>";

}

echo "</table>";
echo "<br>" . "<br>" . "<br>";



//Request Descending
$stmt2 = $pdo->query('SELECT * FROM testtable ORDER BY testtable DESC');

echo "<table style='font-family: Georgia, sans-serif;'>";
echo "Date Descending";

while ($row = $stmt2->fetch()){

        echo "<tr>";
                echo "<td style='border: 1px solid black;'>", $row['testrow1'], "</td>";
                echo "<td style='border: 1px solid black;'>", $row['testrow2'], "</td>";
        echo "</tr>";
}

echo "</table>";

?>
