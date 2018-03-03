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

$query = "UPDATE biddings SET service_id = ?, point = ? WHERE username = ?;";
$db = new Database();
$result = db->query($query,array($service_id, $point, $username));
// !!! redirect to more suitable place in the future
header("Location: nav.php");

?>