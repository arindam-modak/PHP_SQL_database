<!--
	File Name - dbCRUD.php
	Database CRUD Operations
-->

<?php
	require("dbconfig.php");

	if(isset($_REQUEST['txtId']))
	{
		$id = $_REQUEST['txtId'];
	}
	else
	{
		$id = "";
	}

	if(isset($_REQUEST['txtPassword']))
	{
		$password = $_REQUEST['txtPassword'];
	}
	else
	{
		$password = "";
	}

	if(isset($_REQUEST['txtName']))
	{
		$name = $_REQUEST['txtName'];
	}
	else
	{
		$name = "";
	}

	if(isset($_REQUEST['lstAge']))
	{
		$age = $_REQUEST['lstAge'];
	}
	else
	{
		$age = "";
	}

	//Add button
	if(isset($_REQUEST['btnAdd']))
	{
		$sql = "Insert into tbluserinfo(colId,colPassword,colName,colAge) values('$id', '$password', '$name', $age)";
		
		if($id=="" or $password=="" or $name=="" or $age=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			if(mysqli_query($con, $sql)===true)
			{
				if(mysqli_affected_rows($con)>0)
				{
					echo "Record Add successfully";
				}
				else
				{
					echo "Record could not be addeded!!";
				}
			}
			else
			{
				echo "Error! Query could not be run!!";
			}
		}
	}
	
	
	//Update password
	if(isset($_REQUEST['btnUpdate']))
	{
		$sql = "Update tbluserinfo set colPassword = '$password' where colId = '$id'";
		
		if($id=="" or $password=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			if(mysqli_query($con, $sql)===true)
			{
				if(mysqli_affected_rows($con)>0)
				{
					echo "Password updated successfully";
				}
				else
				{
					echo "Password could not be updated!!";
				}
			}
			else
			{
				echo "Error! Query could not be run!!";
			}
		}
	}
	
	//Delete record
	if(isset($_REQUEST['btnDelete']))
	{
		$sql = "Delete from tbluserinfo where colId = '$id'";

		if($id=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			if(mysqli_query($con, $sql)===true)
			{
				if(mysqli_affected_rows($con)>0)
				{
					echo "Record deleted successfully!";
				}
				else
				{
					echo "Record could not be deleted!!";
				}
			}
			else
			{
				echo "Error! Query could not be run!!";
			}
		}
	}
	
	
	//Display by Id
	if(isset($_REQUEST['btnDisplayById']))
	{
		$sql = "Select * from tbluserinfo where  colId = '$id'";
		
		if($id=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			$rs = mysqli_query($con, $sql);
			
			while($row = mysqli_fetch_array($rs))
			{
				echo $row['colId'].'---'.$row['colPassword'].'---'.$row['colName'].'---'.$row['colAge'].'<br>';
			}
		}
	}
	
	//Display all records
	if(isset($_REQUEST['btnDisplayAll']))
	{
		$sql = "Select * from tbluserinfo";
		
		$rs = mysqli_query($con, $sql);
			
		while($row = mysqli_fetch_array($rs))
		{
			echo $row['colId'].'---'.$row['colPassword'].'---'.$row['colName'].'---'.$row['colAge'].'<br>';
		}
	}
	
	//mysql_free_result();
	
	mysqli_close($con);
	
	
?>



<html>
	<form>
		<table border="1" align="center">
			<tr>
				<td>Id</td>
				<td><input type="text" name="txtId"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="txtPassword"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="txtName"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td>
					<select name="lstAge">
						<?php
							for($i=18; $i<=60; $i++)
							{
								echo "<option>$i</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td  colspan='2'>
					<input type="submit" name="btnAdd" value="Add Record">&nbsp;&nbsp;
					<input type="submit" name="btnUpdate" value="Update Password">&nbsp;&nbsp;
					<input type="submit" name="btnDelete" value="Delete Record">&nbsp;&nbsp;
					<input type="submit" name="btnDisplayById" value="Display Record By ID">&nbsp;&nbsp;
					<input type="submit" name="btnDisplayAll" value="Display All Records">&nbsp;&nbsp;
				</td>
			</tr>
	</form>
</html>



