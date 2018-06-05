<?php
if (isset($_POST['Submit'])) {
	if (!empty($_POST['EName']) && !empty($_POST['SSN'])) {
		$EName = mysqli_escape_string($_POST['EName']);
		$SSN = mysqli_escape_string($_POST['SSN']);
		$Dept = mysqli_escape_string($_POST['Dept']);
		$Salary = mysqli_escape_string($_POST['Salary']);
		$HomeAddress = mysqli_escape_string($_POST['HomeAddress']);

		$Connection = mysqli_connect("localhost", "root", "", "record");
		$Query = "Insert Into emp_record (ename, ssn, dept, salary, homeaddress) Values ('$EName', '$SSN', '$Dept', '$Salary', '$HomeAddress')"; 
		$Execute = mysqli_query($Connection, $Query);

		if ($Execute) {
			echo '<div id="center"><span class="success">Record Has been Added</span> </div>';
		}
	} else {
		echo '<span class="FieldInfoHeading">Please Atleast add Name and Social Security Number</span>';
	}
}


?>





 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Insert Into Database</title>
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
 		<form action="Insert_Into_Database.php" method="post">
 			<fieldset>
 				<span class="FieldInfo">Employee Name:</span> <br>
 				<input type="text" name="EName"> <br>
 				<span class="FieldInfo">Social Security Number:</span> <br>
 				<input type="text" name="SSN"> <br>
 				<span class="FieldInfo">Department:</span> <br>
 				<input type="text" name="Dept"> <br>
 				<span class="FieldInfo">Salary:</span> <br>
 				<input type="text" name="Salary"> <br>
 				<span class="FieldInfo">Home Address:</span> <br>
 				<textarea name="HomeAddress" id="" cols="30" rows="10">
 					
 				</textarea> <br>
 				<input type="submit" name="Submit" value="Submit Your Record">
 			</fieldset>
 		</form>
 	</div>
 </body>
 </html>