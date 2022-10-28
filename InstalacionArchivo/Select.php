<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebaCrear";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $resultado = $conn->query("SELECT id, firstname, lastname FROM MyGuests");

  while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "id: ".$row['id']. " -  Name:  ". $row['firstname']. " ". $row['lastname']. "<br>";
  }

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>