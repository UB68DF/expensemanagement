<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'ec2-13-59-72-138.us-east-2.compute.amazonaws.com');
	define('DBUSER', 'emadmin');
	define('DBPASS', 'sb##123');
	define('DBNAME', 'mydb');
	
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
	?>