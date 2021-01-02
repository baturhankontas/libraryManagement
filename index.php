<?php
$profpic = "2c.jpg";
?>
<html>
	<head>
		<style type="text/css">
			h2 {
    			color: white;
    			/*text-shadow: 3px 3px 4px #000000;*/
    			/*text-shadow: 4px 4px 3px #FFFFFF;*/
    			text-shadow: 4px 0 5px #FFFFFF, 2px 2px 5px #0000FF
			}
		
			body {
				background-image: url('<?php echo $profpic;?>');
				background-size: 100%; 
			}
		</style>

<form action="" method="POST">
<div style align="center"><br><br><br><br><br><br><br><br><br>

<h2><b>
<font face="Papyrus" size="6" color="white">WELCOME TO LIBRARY MANAGEMENT SYSTEM</font>
</b></h2>

<hr width="270" align="center"><br>

<input type='submit' name='admin' style="width:100px" value='Officer' ><br><br>
<input type='submit' name='studentLoginScreen' style="width:100px" value='Student'><br>
<!-- <input type='submit' name='addStu' style="width:100px" value='add'><br> -->

</div></form>
</head>
<body>
</body>
</html>

<?php
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
	if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());}
	
	if(isset($_POST['admin'])){
	header("location:officerLoginScreen.php");
	}
	else if(isset($_POST['studentLoginScreen'])){
	header("location:studentLoginScreen.php");
	}


//	 if(isset($_POST['addStu'])){
//		$sql1="SELECT * FROM studentlist";
//		$query1=mysqli_query($connection,$sql1);
//		if (!$query1) {   die('Invalid query: ' . mysql_error());}
	
	
	/*
	while($row=mysqli_fetch_assoc($query1)){
		echo "<table border='1'>
<tr>
<td>
	ID :</td><td> <input type='text' name='id' value='$row[id]'><br></td></tr>
<tr>
<td>
	Student ID:</td><td> <input type)'text' name =stuID value='$row[stuID]'> <br></td></tr>
<tr>
<td>
	Student Name :</td><td> <input type='text' name='sname' value='$row[stuName]'><br></td></tr>
<tr>
<td>
	Student Surname :</td><td> <input type='text' name='ssurname' value='$row[stuSName]'><br></td></tr></table>";
		
	}
*/

	
	
	//$sql1="INSERT INTO `studentlist`(`stuID`, `stuName`, `stuSName`) VALUES (130130130,'oz','ozz')";
	//$query1=mysqli_query($connection,$sql1);
	//if (!$query1) {   die('Invalid query: ' . mysql_error());}
?>