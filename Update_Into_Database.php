<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Update Into Database</title>
	<link rel="stylesheet" href="">
</head>
<style type="text/css">
	.Success, caption {
		color: rgb(158, 27, 214);
 		font-family: Bitter,Georgia,"Times New Roman",Times,serif;
		font-size: 1.4em;
		font-weight:bold;
	}
</style>
<body>
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
			$Ename = $DataRows['ename'];
			$SSN = $DataRows['ssn'];
			$Dept = $DataRows['dept'];
			$Salary = $DataRows['salary'];
			$HomeAddress = $DataRows['homeaddress'];
			?>
			<tr>
				<td><?php echo $Id; ?></td>
				<td><?php echo $Ename; ?></td>
				<td><?php echo $SSN; ?></td>
				<td><?php echo $Dept; ?></td>
				<td><?php echo $Salary; ?></td>
				<td><?php echo $HomeAddress; ?></td>
				<td><a href="Delete.php?Delete=<?php echo $Id; ?>">Delete</a></td>
				<td><a href="Update.php?Update=<?php echo $Id; ?>">Update</a></td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>