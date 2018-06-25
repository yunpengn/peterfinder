<?php
// If you are using Microsoft SQL Server, change DB_TYPE into 'sqlsrv'.
// If you are using MySQL, change DB_TYPE into 'mysql'.
define('DB_TYPE', 'pgsql', true);
define('DB_PREFIX', '', true);

// Retrieve connection string from Heroku variables.
$db = parse_url(getenv("DATABASE_URL"));

// Settings that are required for connecting to the database server.
define('DB_HOST', $db["host"], true);
define('DB_PORT', $db["port"], true);
define('DB_NAME', ltrim($db["path"], "/"), true);
define('DB_USER', $db["user"], true);
define('DB_PASSWORD', $db["pass"], true);

// Gets the DSN to help create connection to the database.
// Notice that the DSN for Microsoft SQL Server is slightly different.
if (DB_TYPE == 'sqlsrv') {
    $dsn = DB_TYPE . ':server=' . DB_HOST . ';database=' . DB_NAME;
} else if (DB_TYPE == 'pgsql') {
    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
} else {
    $dsn = DB_TYPE . ':server = tcp:' . DB_HOST . '; Database=' . DB_NAME;
}
define('DSN', $dsn, true);

// Defines the root path for this app.
// Change to http://localhost:8080/peterfinder on Mac.
define('APP_URL', getenv('APP_URL'));

// Settings for sending non-reply emails.
define('EMAIL_ADDRESS', getenv('EMAIL_ADDRESS'), true);
define('EMAIL_PASSWORD', getenv('EMAIL_PASSWORD'), true);

// Settings for datetime format.
define('DATE_FORMAT', 'd M, Y', true);
define('TIME_FORMAT', 'H:m d M, Y', true);
