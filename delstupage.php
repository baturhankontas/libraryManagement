 
<html>
	<head>
		<style type="text/css">
			h2 {
				
    			color: white;
    			text-shadow: 5px 3px 2px #000000;
			}
			h3 {
				text-size:20;
				color: white;
				text-shadow: 3px 3px 4px #000000;

			}
		
		</style>
		<form action="" method="POST">
		
	<input type="button" value="<< Exit <<" style='width:100' onclick="location='index.php'" ><br>
		<input type="button" value="<< Back <<" style='width:100' onclick="location='officerPage.php'" ><br><br>
		
		<div style align="center"><br><br><br><br><br><br><br><br><br>
		
		<b>DELETE STUDENT SYSTEM</b>
		<hr width="125" align="center"> 

	<table border="1">

	<h3>Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<input type='text' name='delStuName' style="width:120px"  maxlength="15"><br></h3>
	<h3>Student Surname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='delStuSurname' style="width:120px" maxlength="20"><br></h3>  	
	<h3>Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='delStuID' style="width:120px" maxlength="9"><br></h3>  	
	<h3>Student Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='delStuPassword' style="width:120px" maxlength="10"><br></h3> 
	<h3>Student Psw Again   &nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='delStuPasswordConfirm' style="width:120px" maxlength="10"><br></h3> 
	<input type="submit" name="delStu"  value="DELETE STUDENT">	
	
</form> 

<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

error_reporting(E_ALL^E_DEPRECATED);
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());
}	
	
	//here
$buttonPressedFlag = false;
if(isset($_POST['delStu'])) $buttonPressedFlag = true;

if($buttonPressedFlag){
	if(isset($_POST['delStu']) && !empty($_POST['delStuName'])  && !empty($_POST['delStuSurname'])
		&& !empty($_POST['delStuID']) && !empty($_POST['delStuPassword']) && !empty($_POST['delStuPasswordConfirm']) ){


		$passwordConfirmed=false;


		$stuAdi = $_POST['delStuName'];
		$stuSoy = $_POST['delStuSurname'];
		$stuIDnew = $_POST['delStuID'];
		$stuPaswd = $_POST['delStuPassword'];
		$stuPaswdCnf = $_POST['delStuPasswordConfirm'];

		if($stuPaswd === $stuPaswdCnf)
			$passwordConfirmed = true;


		$sql1 = "SELECT * FROM studentlist WHERE stuID='$stuIDnew'";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}

		if(  (mysqli_num_rows($query1)!=NULL)){
			//header("Refresh:0");

			if( $passwordConfirmed){

				$sql2= "DELETE FROM  studentlist WHERE stuID='$stuIDnew' AND stuName='$stuAdi' AND stuSName='$stuSoy' AND stuPassword='$stuPaswd' ";
				
				$query2=mysqli_query($connection,$sql2);
				if (!$query2) {   die('Invalid query: ' . mysql_error());}

				echo "<br><br><h3><b><font size='6' color='green'>REMOVED</font></b></h3>";
			}
			else
				echo "<br><br><h4><b><font size='6' color='red'>PASSWORDS ARE NOT MATCH</font></b></h4>";
			
		}
		else
			echo "<br><br><h3><b><font size='6' color='red'>THE STUDENT IS NOT IN THE LIST</font></b></h3>";

}else
	echo "<br><br><h3><b><font size='6' color='red'>ERROR</font></b></h3>";
}




?>

</div>
</head><body bgcolor ="#3377ff">
</body>
</html>