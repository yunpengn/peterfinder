<?php
// With start_time, end_time, decision_deadline, expected_salary, add a row in service_offers
// Start the session
session_start();
if (isset($_SESSION['username'])) {
	$username=$_SESSION['username'];
} else {
	header("Location: nav.php");
	exit;
}

$start_time = $_GET["start_time"];
$end_time = $_GET["end_time"];
$decision_deadline = $_GET["decision_deadline"];
$expected_salary = $_GET["expected_salary"];

$query = "INSERT INTO service_offers(provider,start_time,end_time,decision_deadline,expected_salary) VALUES(?, ?, ?, ?, ?);";
$db = new Database();
$result = db->query($query,array($username, $start_time, $end_time, $decision_deadline, $expected_salary));
header("Location: nav.php");

?>