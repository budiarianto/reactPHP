<?php
/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * :: file:     connect.php
 * :: purpose:  save the comment to the db
 * :: $Rev:: 001                                               $
 * :: $Author:: amit                                          $
 * ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
	require_once 'connect.php';
	$authorName = $_POST['author'];
	$commentText = $_POST['text'];
 
	$query  = "INSERT INTO comments (author, text) VALUES ('$authorName', '$commentText')";
                                        
										
	$res    = $mysqli->query( $query );
	$error  = $mysqli->error;

	if( $res ) {
	// --- no error
	$status = TRUE;
	} else {
		$status = FALSE;
		echo $error;
	}
	echo $status;
?>
