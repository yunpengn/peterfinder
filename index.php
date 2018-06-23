<?php
session_start();

// Adds the configuration variables.
if (file_exists('config/config.php')) {
	require_once 'config/config.php';
} else {
	require_once 'config/config.example.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "public/head.php"; ?>
</head>
<body>
<?php
/**
 * Acts as a router with a facade for the whole application.
 */
require_once 'core/App.class.php';

// Utilizes auto-loading here.
spl_autoload_register(array("App", "myAutoLoader"));

// Runs an instance of the main app delegate.
try {
    App::run($_GET['url']);
} catch(NotFoundException $nfe) {
    $nfe->showError();
}
?>
</body>
</html>
