<?php
// With service_id, point, add a row in biddings
// Start the session
session_start();
if (isset($_SESSION['username'])) {
	$username=$_SESSION['username'];
} else {
	header("Location: nav.php");
	exit;
}

$service_id = $_GET["service_id"];
$point = $_GET["point"];

$query = "INSERT INTO biddings(username, service_id, point) VALUES(?, ?, ?);";
$db = new Database();
$result = db->query($query,array($username, $service_id, $point));
// !!! redirect to more suitable place in the future
header("Location: nav.php");

?>