<?php
/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * :: file:     connect.php
 * :: purpose:  fetch the latest comments from the database
 * :: $Rev:: 001                                               $
 * :: $Author:: amit                                          $
 * ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */

 require_once 'connect.php';
 
$query  = "SELECT * FROM comments ORDER BY posted_on DESC";
$result = $mysqli->query($query);

$commentsArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $originalDate = $row['posted_on'];

        $row['posted_on'] = date("d-M-Y", strtotime($originalDate));

        array_push($commentsArray,$row);
    }
} else {
    //echo "0 results";
}
echo json_encode($commentsArray);

?>
