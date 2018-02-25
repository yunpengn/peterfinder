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
} catch(Exception $e) {
    echo $e->getMessage();
}
?>
</body>
</html>
