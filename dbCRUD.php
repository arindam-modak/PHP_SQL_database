<!--
	File Name - dbCRUD.php
	Database CRUD Operations
-->
<html>
<body bgcolor="alice-blue">
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

<?php
	
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
$con = mysqli_connect("localhost", "id1781998_dbuser", "dbuser");
	
	mysqli_select_db($con, "id1781998_dbuser");
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
		}mysqli_close($con);
	}
	
	
	//Update password
	if(isset($_REQUEST['btnUpdate']))
	{$con = mysqli_connect("localhost", "id1781998_dbuser", "dbuser");
	
	mysqli_select_db($con, "id1781998_dbuser");
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
		}mysqli_close($con);
	}
	
	//Delete record
	if(isset($_REQUEST['btnDelete']))
	{$con = mysqli_connect("localhost", "id1781998_dbuser", "dbuser");
	
	mysqli_select_db($con, "id1781998_dbuser");
		$sql1 = "Select * from tbluserinfo where colId = '$id'";
                $rs = mysqli_query($con, $sql1);
                $row = mysqli_fetch_array($rs);
		
		if($id=="" or $password=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
                   if($row['colPassword']==$password){
                        $sql = "Delete from tbluserinfo where colId = '$id'";
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
		}mysqli_close($con);
	}
	
	
	//Display by Id
	if(isset($_REQUEST['btnDisplayById']))
	{$con = mysqli_connect("localhost", "id1781998_dbuser", "dbuser");
	
	mysqli_select_db($con, "id1781998_dbuser");
		$sql = "Select * from tbluserinfo where  colId = '$id'";
		
		if($id=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			$rs = mysqli_query($con, $sql);
			echo '<center><h2><font color="grey" face="algerian">'.'<u><b>Name</b></u>'.'  &nbsp;&nbsp;&nbsp;&nbsp; '.'<u><b>Age</b></u>'.'</font></h2></center>';
			while($row = mysqli_fetch_array($rs))
			{
				echo '<center><h2><font color="grey" face="algerian">'.$row['colName'].'---'.$row['colAge'].'</font></h2></center>';
			}
		}mysqli_close($con);
	}
	
	//Display all records
	if(isset($_REQUEST['btnDisplayAll']))
	{$con = mysqli_connect("localhost", "id1781998_dbuser", "dbuser");
	
	mysqli_select_db($con, "id1781998_dbuser");
		$sql = "Select * from tbluserinfo";
		
		$rs = mysqli_query($con, $sql);
		echo '<center><h2><font color="grey" face="algerian">'.'<u><b>Name</b></u>'.'  &nbsp;&nbsp;&nbsp;&nbsp; '.'<u><b>Age</b></u>'.'</font></h2></center>';
		while($row = mysqli_fetch_array($rs))
		{
			echo '<center><h2><font color="grey" face="algerian">'.$row['colName'].'---'.$row['colAge'].'</font></h2></center>';
		}mysqli_close($con);
	}
	
	//mysql_free_result();
	
		
?>
</body>
</html>
