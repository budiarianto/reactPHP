<?php
/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * :: file:     connect.php
 * :: purpose:  Configure/Manage database connections
 * :: $Rev:: 001                                               $
 * :: $Author:: amit                                          $
 * ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
 
	global $persistDB, $mysqli;
	
	$DbHost="localhost";               									// Database host
	$DbName='react';				    							// Database name
	$DbUser='root';    													// Database username
	$DbPassword='';														// Database user password
	$persistDB  = true;

	$mysqli = new mysqli( (($persistDB == true ) ? "p:" : "" ).$DbHost, $DbUser, $DbPassword, $DbName);	// use persistant connection
	if ($mysqli->connect_errno) {
		$theError = $mysqli->connect_error;
		echo $theError;
	} else {
		$mysqli->set_charset('utf8'); // success
		//echo "db connectivity success";
	}
?>