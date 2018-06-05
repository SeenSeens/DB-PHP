<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Search_From_Database</title>
	<link rel="stylesheet" href="">
</head>
<style type="text/css">
	input[type="text"],textarea {
		border:1px solid dashed;
		background-color: rgb(221,216,212);
		width: 480px;
		padding: .5em;
		font-size: 1.0em;
	}
	input[type="Submit"] {
		color: white;
		font-size: 1.0em;
		font-family: Bitter,Georgia,Times,"Times New Roman",serif;
		width: 200px;
        height: 40px;
        background-color:  #5D0580;
        border: 5px solid ;
        border-bottom-left-radius: 35px;
        border-bottom-right-radius: 35px;
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-color: rgb(221,216,212);
        font-weight: bold;
        float: left;
	}
	.FieldInfo {
		color: rgb(251, 174, 44);
        font-family: Bitter,Georgia,"Times New Roman",Times,serif;
        font-size: 1em;
	}
	.success,caption {
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
	div {
		width: 500px;
		margin-left: 400px;
	}
	fieldset {
		background-image: url("ems1.jpg");
		background-repeat: repeat-x;
	}
	body {
		background-image: url("2.jpg");
		background-repeat: repeat;
	}
	.EditButton {
		background-color:#5D0580;
		border: 5px solid ;
        border-color: rgb(221,216,212);
		color: #ffffff;
		text-align: center;
		font-size: 1.1em;	
	}
	.DeleteButton {
		background-color:#f4bbb3;
		border: 5px solid ;
        border-color: rgb(221,216,212);
		color: #ffffff;
		text-align: center;
		font-size: 1.1em;
	}
	.EditButton:hover {
		background-color:#35ee31;
	}
	.DeleteButton:hover {
		background-color:#f00000;
	}
	th {
		font-family: pristina;
		color:black;
		background-color: #FAF9FA;
		font-size: 1.2em;	
	}
	td {
		border: 1 px solid;
		overflow: hidden;
		width: 70px;
		text-align: center;
		color: black;
		font-family: Bitter,Georgia,Times,"Times New Roman",serif;
		font-size: 1.0em;
		padding: 3px;
	}
	tr:hover {
		background-color:#eeeaee;	
	}
	#center {
		width: 500px;
		margin:0 auto;
	}
</style>
<body>


	<div id="center">
		<form action="Search_From_Database.php" method="get">
			<fieldset>
				<input type="text" name="Search" value="" placeholder="Search by Employee Name / SSN">
				<input type="submit" name="SearchButton" value="Search">
			</fieldset>
		</form>
	</div>
	
	<?php  
	// Ket noi
	$Connection = mysqli_connect("localhost", "root", "", "record");
	if (isset($_GET['SearchButton'])) {
		$Search = $_GET['Search'];
		$SearchQuery = "Select * From emp_record Where ename = '$Search' Or ssn = '$Search' ";
		$Execute = mysqli_query($Connection, $SearchQuery);
		while ($DataRows = mysqli_fetch_array($Execute) ){
		    $Id = $DataRows['id'];
		    $EName = $DataRows['ename'];
		    $SSN = $DataRows['ssn'];
		    $Dept = $DataRows['dept'];
		    $Salary = $DataRows['salary'];
		    $HomeAddress = $DataRows['homeaddress'];
		    ?>
		    <table width="1000" border="5" align="center">
		    	<caption>Search Results</caption>
		    	<tr>
		    		<th>ID</th>
		    		<th>Employee Name</th>
		    		<th>Social Security Number</th>
		    		<th>Department</th>
		    		<th>Salary</th>
		    		<th>Home Address</th>
		    		<th>New</th>
		    	</tr>
		    	<tr>
		    		<td><?php echo $Id; ?></td>
		    		<td><?php echo $EName; ?></td>
		    		<td><?php echo $SSN; ?></td>
		    		<td><?php echo $Dept; ?></td>
		    		<td><?php echo $Salary; ?></td>
		    		<td><?php echo $HomeAddress; ?></td>
		    		<td align="center">
		    			<a href="Search_From_Database.php">Search Again</a>
		    		</td>
		    	</tr>
		    </table>
		    <?php
		}
	}

	?>





	<h2 class="Success"><?php echo @$_GET['Deleted']; ?></h2>
	<h2 class="Success"><?php echo  @$_GET['Updated']; ?></h2>
	<table width="1000" border="5" align="center">
		<caption>View From Database</caption>
		<tr>
			<th>ID</th>
			<th>Employee Name</th>
			<th>SSN</th>
			<th>Department</th>
			<th>Salary</th>
			<th>Home Address</th>
			<th>Delete</th>
			<th>Update</th>
		</tr>
		<?php
		// Ket noi
		$Connection = mysqli_connect("localhost", "root", "", "record");
		// Truy van
		$ViewQuery = "Select * From emp_record";
		$Execute = mysqli_query($Connection, $ViewQuery);
		while ($DataRows = mysqli_fetch_array($Execute)) { // Duyet qua tung phan tu,
			$Id = $DataRows['id']; // gan cot trong csdl vao ten bien
			$EName = $DataRows['ename'];
			$SSN = $DataRows['ssn'];
			$Dept = $DataRows['dept'];
			$Salary = $DataRows['salary'];
			$HomeAddress = $DataRows['homeaddress'];
			?>
			<tr>
				<td><?php echo $Id; ?></td>
				<td style="color: #5e5eff;" ><?php echo $EName; ?></td>
				<td><?php echo $SSN; ?></td>
				<td><?php echo $Dept; ?></td>
				<td><?php echo $Salary; ?></td>
				<td><?php echo $HomeAddress; ?></td>
				<td class="DeleteButton">
					<a style="color: #ffffff;" href="Delete.php?Delete=<?php echo $Id; ?>">Delete</a>
				</td>
				<td class="EditButton">
					<a style="color: #ffffff;" href="Update.php?Update=<?php echo $Id; ?>">Update</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>