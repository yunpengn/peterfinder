<?php
for ($i = 0; $i < 20; $i++) { 
	$username = "user" . $i;
	$hashed = password_hash($username, PASSWORD_BCRYPT);
	$query = "INSERT INTO users(username, email, password) VALUES ('" . $username . "', '" . $username . "@wepet.com', '" . $hashed . "');";
	echo $query . "<br>";
}
