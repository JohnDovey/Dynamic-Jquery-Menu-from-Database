<?php
// Copyright John Dovey, 2021
// dovey.john@gmail.com
// Ver 2.2
//
// mysql_connect ([ string $server = ini_get("mysql.default_host") [, string $username = ini_get("mysql.default_user") [, string $password = ini_get("mysql.default_password") [, bool $new_link = false [, int $client_flags = 0 ]]]]] ) : resource|false
//
mysql_connect("MyHost", "MyUsername","MyPassword") or
	die ("Could not connect to database");
//
//mysql_select_db ( string $database_name [, resource $link_identifier = NULL ] ) : bool
//
mysql_select_db("MyMenuDB") or
	die ("Could not select database");
?>
