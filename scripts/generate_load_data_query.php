<?php
$username = "test";
$hashed = password_hash($username, PASSWORD_BCRYPT);
$query = "INSERT INTO users(username, email, password) VALUES ('" . $username . "', 'guy@gmail.com', '" . $hashed . "');";
echo $query . "<br>";

for ($i = 0; $i < 20; $i++) { 
	$username = "user" . $i;
	$hashed = password_hash($username, PASSWORD_BCRYPT);
	$query = "INSERT INTO users(username, email, password) VALUES ('" . $username . "', '" . $username . "@wepet.com', '" . $hashed . "');";
	echo $query . "<br>";
}

for ($i = 0; $i < 20; $i = $i + 2) { 
	$username = "user" . $i;
	$query = "INSERT INTO user_profiles(username, type) VALUES ('" . $username . "', 'owner');";
	echo $query . "<br>";
	$username = "user" . ($i + 1);
	$query = "INSERT INTO user_profiles(username, type) VALUES ('" . $username . "', 'peter');";
	echo $query . "<br>";
}
