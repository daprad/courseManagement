<?php
require("constants.php");

// 1. Create a database connection
$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if (!$conn) {
	die("Database connection failed: " . mysql_error());
}

// 2. Select a database to use 
$db_select = mysql_select_db(DB_NAME,$conn);
if (!$db_select) {
	die("Database selection failed: " . mysql_error());
}
?>
