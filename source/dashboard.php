<?php 

    session_start();
    $loggedIn = $_SESSION["logged_in"] ?? false;
    if(!$loggedIn) {
        header("Location: /login.php");
        die();
    }
?>

<a href="/logout.php">Logout</a>
<h1>You are inside dashboard!! </h1>

<?php 
  $servername = "db";
  $username = "root";
  $password = "admin";
  
try {
	$conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo  "connected to db . <br/>";

	$stmt = $conn->prepare("SELECT id, name, school, age from users;");
	$stmt->execute();

	echo "<table>";
	echo "<tr><th>ID</th><th>Name</th><th>School</th><th>Age</th></tr>";
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	foreach($stmt->fetchAll() as $row) {
		echo "<tr>";
		foreach($row as $k => $v) {
			echo "<td>$v</td>";
		}
		echo "</tr>";
	}
	echo "</table>";

}catch(Exception $e){
	var_dump($e);
	echo "connection failed";
}

?>