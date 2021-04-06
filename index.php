<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$GLOBALS["config"] = array(
		"appName" => "supernova",		// SET IT TO YOUR DESIRED PROJECT NAME OR Directory NAME
		"domain" => "supernova",		// SET IT TO YOUR DESIRED PROJECT NAME OR Directory NAME
		"version" => "0.0.1",
		"encryption_key" => "",		// SET ENCRYPTION KEY FOR PASSWORD ENCRYPTION
		/* DO NOT CHANGE BELOW SECTION */
		"paths" => array(
			"app" => "app/",
			"core" => "core/",
			"index" => "index.php"
		),
		/* DO NOT CHANGE ABOVE SECTION */
		"defaults" => array(
			"controller" => "home",			// DEFAULT CONTROLLER NAME
			"method" => "index"					// DEFAULT METHOD or FUNCTION NAME
		),
		"routes" => array(
		),
		"database" => array(
			"host" => "localhost",	// DATABASE HOSTNAME
			"username" => "root",		// DATABASE USERNAME
			"password" => "",				// DATABASE PASSWORD
			"dbname" => ""     			// DATABASE NAME
		),
	);

	/* DO NOT CHANGE BELOW SECTION */
	$GLOBALS['instances'] = array();
	require_once $GLOBALS['config']['paths']['core']."autoload.php";
	new router();
	/* DO NOT CHANGE ABOVE SECTION */
?>
