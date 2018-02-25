<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "public/head.php"; ?>
</head>
<body>
<?php
// Creates a router that acts as a facade for the whole application.
require_once 'core/App.class.php';
require_once 'app/controllers/Home.class.php';

// Runs an instance of the main app delegate.
try {
    App::run($_GET['url']);
} catch(Exception $e) {
    echo $e->getMessage();
}
?>
</body>
</html>
