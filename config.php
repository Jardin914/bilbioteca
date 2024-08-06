<?php
$servername = "sql308.infinityfree.com";
$username = "if0_37047207";
$password = "nueveCatorce";
$dbname = "if0_37047207_Jardin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
