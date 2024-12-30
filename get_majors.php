<?php

include("include/functions.php"); 

$faculty = $_GET['faculty'];

$query = mysqli_query($conn,"SELECT * FROM `major` WHERE `faculty_code` = {$faculty}");
while($row = mysqli_fetch_array($query)) {
	echo "<option value='$row[major_code]'>$row[major_desc_e]</option>";
}

?>

