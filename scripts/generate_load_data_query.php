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
echo "<br>";

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
echo "<br>";

echo "-- Generate some fake data for pets.<br>";
$username = array("test", "test", "user0", "user2", "user4", "user6");
$petname = array("John", "Tommy", "John", "Swify", "Molly", "Oscar");
$type = array("Bull Terrier Dog", "Cat", "Dog", "Budgies Bird", "Cat", "Siamese Cat");
$birthday = array(date("Y-m-d", strtotime("-4 months")), date("Y-m-d", strtotime("-20 weeks")));
$bio = array("A very nice dog", "My pet really loves sleeping", "He is quite quite.", "Please give her enough food. Please!", "She needs to sleep at least 8 hours a day.", "He is a very active cat.");
for ($i = 0; $i < 6; $i++) {
	$query = "INSERT INTO pets(username, pet_name, type, birthday, bio) VALUES ('" . $username[$i] 
			 . "', '" . $petname[$i] . "', '" . $type[$i] . "', '" . $birthday[$i % 2] . "', '" . $bio[$i] . "');";
	echo $query . "<br>";
}
echo "<br>";

echo "-- Generate some fake data for service offers.<br>";
$provider = array("test", "test", "user1", "user3", "user5", "user7", "user9", "user1", "user3", "user5", "user7", "user9");
$deadline = date("Y-m-d", strtotime("+4 weeks"));
$start = date("Y-m-d", strtotime("+2 months"));
$end = date("Y-m-d", strtotime("+3 months"));
for ($i = 0; $i < 12; $i++) {
	$query = "INSERT INTO service_offers(provider, start_date, end_date, decision_deadline) VALUES ('" . 
			  $provider[$i] . "', '" . $start . "', '" . $end . "', '" . $deadline . "');";
	echo $query . "<br>";
}
echo "<br>";

echo "-- Generate some fake data for service targets.<br>";
$types = array("Bull Terrier Dog", "Cat", "Dog", "Budgies Bird", "Cat", "Siamese Cat");
for ($i = 0; $i < 12; $i++) {
	for ($j = 0; $j < 2; $j++) {
		// Gets a random type.
		$type = $types[array_rand($types)];
		$query = "INSERT INTO service_target(service_id, type) VALUES (" . ($i + 1) . ", '" . $type. "');";
		echo $query . "<br>";
	}
}
echo "<br>";

echo "-- Generate some fake data for biddings.<br>";

echo "<br>";
