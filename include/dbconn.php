<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $dbh = new PDO("mysql:host=$servername;port=3000;dbname=acpce", $username, $password);
  // set the PDO error mode to exception
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "<script>alert('Connexion reussi');</script>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>