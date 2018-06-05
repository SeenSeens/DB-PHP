<?php
$Connection = mysqli_connect("localhost", "root", "", "record");
$Update_Recored = $_GET['Update'];

$ShowQuery = "Select * From emp_record Where id = '$Update_Recored' ";
$Update = mysqli_query($Connection, $ShowQuery);

while ($DataRows = mysqli_fetch_array($Update)) {
	$Update_Id = $DataRows['id'];
    $EName = $DataRows['ename'];
    $SSN = $DataRows['ssn'];
    $Dept = $DataRows['dept'];
    $Salary = $DataRows['salary'];
    $HomeAddress = $DataRows['homeaddress'];
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Update</title>
 	<link rel="stylesheet" href="">
 </head>
 <style type="text/css">
 	input[type="text"], texterea {
 		border: 1px solid dashed;
 		background-color: rgb(221, 216, 212);
 		width: 480px;
 		padding: .5em;
 		font-size: 1.0em;
 	}
 	input[type="submit"] {
 		color:  white;
 		font-size: 1.0em;
 		font-family: Bitter, Georgia, Times, "Times New Roman", serif;
 		width: 200px;
 		height: 40px;
 		background-color: #5D0580;
 		border: 5px solid;
 		border-bottom-left-radius: 35px;
 		border-bottom-right-radius: 35px;
 		border-top-left-radius: 35px;
 		border-top-right-radius: 35px;
 	}
 	.FieldInfo {
 		color: rgb(251, 27, 214);
 		font-family: Bitter, Georgia, "Times New Roman", Times, serif;
 		font-size: 1em;
 	}
 	.success {
 		color: rgb(158, 27, 214);
 		font-family: Bitter,Georgia,"Times New Roman",Times,serif;
		font-size: 1.4em;
		font-weight:bold;
	}
	.FieldInfoHeading {
    	color: rgb(251, 174, 44);
    	font-family: Bitter,Georgia,"Times New Roman",Times,serif;
   		font-size: 1.3em;
	}
	#center {
		width: 500px;
		margin:0 auto;
	}
	fieldset {
		background-image: url("ems1.jpg");
		background-repeat: repeat-x;
	}
	body {
		background-image: url("2.jpg");
		background-repeat: repeat;
	}
 </style>
 <body>
 	<div id="center">
 		<form action=Update.php?Update_Id=<?php echo $Update_Id; ?>" method="post">
 			<fieldset>
 				<span class="FieldInfo">Employee Name:</span> <br>
 				<input type="text" name="EName" value="<?php echo $EName; ?>"> <br>
 				<span class="FieldInfo">Social Security Number:</span> <br>
 				<input type="text" name="SSN" value="<?php echo $SSN; ?>"> <br>
 				<span class="FieldInfo">Department:</span> <br>
 				<input type="text" name="Dept" value="<?php echo $Dept; ?>"> <br>
 				<span class="FieldInfo">Salary:</span> <br>
 				<input type="text" name="Salary" value="<?php echo $Salary; ?>"> <br>
 				<span class="FieldInfo">Home Address:</span> <br>
 				<textarea name="HomeAddress">
 					<?php echo $HomeAddress; ?>
 				</textarea> <br>
 				<input type="submit" name="Submit" value="Submit Your Record">
 			</fieldset>
 		</form>
 	</div>
 </body>
 </html>

 <?php
//This PHP BLOck is for Editing the data that you got in your form
$Connection = mysqli_connect("localhost", "root", "", "record");
if (isset($_POST['Submit'])) {
	$Update_Id = $_GET['Update_Id'];
	$EName = $_POST[EName];
	$SSN = $_POST['SSN'];
	$Dept = $_POST['Dept'];
	$Salary = $_POST['Salary'];
	$HomeAddress = $_POST['HomeAddress'];

	$UpdateQuery = "Update emp_record Set ename = '$EName', ssn = '$SSN', dept = '$Dept', salary = '$Salary', homeaddress = '$HomeAddress' Where id = '$Update_Id' ";
	$Execute = mysqli_query($Connection, $UpdateQuery);
	if ($Execute) {
		function redirect_to($NewLocation) {
			header("Location: ".$NewLocation);
			exit();
		}
		redirect_to("Update_Into_Database.php?Updated=Record has been Updated Successfully");
	}
}
?>
