<?php
/**
 * Notice: You should rename this file to "config.php" and change the settings accordingly.
 */

// If you are using Microsoft SQL Server, change DB_TYPE into 'sqlsrv'.
// If you are using MySQL, change DB_TYPE into 'mysql'.
define('DB_TYPE', 'pgsql', true);
define('DB_PREFIX', '', true);

// Settings that are required for connecting to the database server.
define('DB_HOST', 'localhost', true);
define('DB_PORT', '5432', true);
define('DB_NAME', 'peterfinder', true);
define('DB_USER', 'postgres', true);
define('DB_PASSWORD', '123456', true);

// Gets the DSN to help create connection to the database.
// Notice that the DSN for Microsoft SQL Server is slightly different.
if (DB_TYPE != 'sqlsrv') {
    $dsn = DB_TYPE . ":server=" . DB_HOST . ";database=" . DB_NAME;
} else if (DB_TYPE != 'pgsql') {
    $dsn = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
} else {
    $dsn = DB_TYPE . ":server = tcp:" . DB_HOST . "; Database=" . DB_NAME;
}
define('DSN', $dsn, true);

// Defines the root path for this app.
// Change to http://localhost:8080/peterfinder on Mac.
define('APP_URL', 'http://localhost/peterfinder');