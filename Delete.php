<?php
$Connection = mysqli_connect("localhost", "root", "", "record");
$Delete_Record_Id = $_GET['Delete'];
$Delete_Query = "Delete From emp_record Where id = '$Delete_Record_Id' ";
$Execute = mysqli_query($Connection, $Delete_Query);
if ($Execute) {
	echo '<script> window.open("Delete_From_Database.php?Deleted=Record Delete Successfully", "_self")</script>';
}
?>