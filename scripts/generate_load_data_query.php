<?php
// A quick-and-dirty script used to generate script to load sample data.
// Written by Yunpeng Niu @ 2018.

echo '-- Use this user to login and test (admin account). The password is "peterfinder".<br>';
$username = "test";
$hashed = password_hash("peterfinder", PASSWORD_BCRYPT);
$query = "INSERT INTO users(username, email, password) VALUES ('" . $username . "', 'guy@gmail.com', '" . $hashed . "');";
echo $query . "<br>";

echo "-- Below are sample users, whose password is the same as the respective username.<br>";
for ($i = 0; $i < 20; $i++) { 
	$username = "user" . $i;
	$hashed = password_hash($username, PASSWORD_BCRYPT);
	$query = "INSERT INTO users(username, email, password) VALUES ('" . $username . "', '" . $username . "@wepet.com', '" . $hashed . "');";
	echo $query . "<br>";
}
echo "<br>";

echo "-- Admin user is both owner and taker.<br>";
echo "INSERT INTO user_profiles(username, type) VALUES ('test', 'owner');<br>";
echo "INSERT INTO user_profiles(username, type) VALUES ('test', 'peter');<br>";
echo "-- Sample uses take turns to be owner or taker.<br>";
for ($i = 0; $i < 20; $i = $i + 2) { 
	$username = "user" . $i;
	$query = "INSERT INTO user_profiles(username, type) VALUES ('" . $username . "', 'owner');";
	echo $query . "<br>";
	$username = "user" . ($i + 1);
	$query = "INSERT INTO user_profiles(username, type) VALUES ('" . $username . "', 'peter');";
	echo $query . "<br>";
}
echo "<br>";

echo "-- Declare some base types for pet types first.<br>";
$name = array("Cat", "Dog", "Bird", "Fish");
$desp = array("A small, typically furry, carnivorous mammal.",
			  "A member of the genus Canis, which forms part of the wolf-like canids.",
			  "A group of endothermic vertebrates, characterised by feathers and toothless beaked jaws",
			  "Gill-bearing aquatic craniate animals that lack limbs with digits");
for ($i = 0; $i < 4; $i++) {
	$query = "INSERT INTO pet_types(type, description) VALUES ('" . $name[$i] . "', '" . $desp[$i] . "');";
	echo $query . "<br>";
}
echo "-- Then declare some derived types.<br>";
$name2 = array("Siamese Cat", "Bull Terrier Dog", "Budgies Bird", "Neon Tetra Fish");
$desp = array("With stunning blue eyes, it is ranked as the most popular pedigreed cat breed in 2011.",
			  "Unfairly branded as an aggressive animal, the Bull Terrier was actually a companion dog.",
			  "One of the most popular pet bird species, and it comes as no surprise to anyone who has ever known one.",
			  "Although small in size, these beautifully coloured, cool freshwater fish will surely satisfy you.");
for ($i = 0; $i < 4; $i++) {
	$query = "INSERT INTO pet_types(type, root_type, description) VALUES ('" . $name2[$i] . "', '" . $name[$i] . "', '" . $desp[$i] . "');";
	echo $query . "<br>";
}