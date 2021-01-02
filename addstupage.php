 
<html>
	<head>
		<style type="text/css">
			h2 {
				
    			color: white;
    			text-shadow: 5px 3px 2px #000000;
			}
			h3 {
				
				color: white;
				text-shadow: 3px 3px 4px #000000;

			}
			h4 {
				
				color: white;
				text-shadow: 3px 3px 4px #FFFFFF;

			}
		
		</style>
		<form action="" method="POST">
		
		<input type="button" value="<< Exit <<" style='width:100' onclick="location='index.php'" ><br>
		<input type="button" value="<< Back <<" style='width:100' onclick="location='officerPage.php'" ><br><br>
		
		<div style align="center"><br><br><br><br><br><br><br><br><br>
		
		<b>ADD STUDENT SYSTEM</b>
		<hr width="125" align="center"> 


	

	

	<table border="1">
		<h3>Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		<input type='text' name='addStuName' style="width:120px"  maxlength="15"><br></h3>

		<h3>Student Surname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='addStuSurname' style="width:120px" maxlength="20"><br></h3> 


		<h3>Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='addStuID' style="width:120px" maxlength="9"><br></h3>


		<h3>Student Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='addStuPassword' style="width:120px" maxlength="10"><br></h3> 

		<h3>Student Psw Again   &nbsp;&nbsp;&nbsp;&nbsp;:
		<input type='text' name='addStuPasswordConfirm' style="width:120px" maxlength="10"><br></h3> 
	<input type="submit" name="addStu"  value="ADD STUDENT">
	
	
</form> 

<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

error_reporting(E_ALL^E_DEPRECATED);
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());
}	
	
	//here
	if(isset($_POST['addStu']) && !empty($_POST['addStuName'])  && !empty($_POST['addStuSurname'])
		&& !empty($_POST['addStuID']) && !empty($_POST['addStuPassword']) && !empty($_POST['addStuPasswordConfirm']) ){

		$passwordConfirmed=false;


		$stuAdi = $_POST['addStuName'];
		$stuSoy = $_POST['addStuSurname'];
		$stuIDnew = $_POST['addStuID'];
		$stuPaswd = $_POST['addStuPassword'];
		$stuPaswdCnf = $_POST['addStuPasswordConfirm'];

		if($stuPaswd === $stuPaswdCnf)
			$passwordConfirmed = true;


		$sql1 = "SELECT * FROM studentlist WHERE stuID='$stuIDnew'";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}

		if(  (mysqli_num_rows($query1)==0 || mysqli_num_rows($query1)==NULL)){
			//header("Refresh:0");

			if( $passwordConfirmed){

				$sql2= "INSERT INTO studentlist(stuID, stuName,stuSName, stuPassword) 
									   VALUES ('$stuIDnew', '$stuAdi','$stuSoy','$stuPaswd')  ";
				
				$query2=mysqli_query($connection,$sql2);
				if (!$query2) {   die('Invalid query: ' . mysql_error());}

				echo "<br><br><h3><b><font size='6' color='green'>ADDED</font></b></h3>";
			}
			else
				echo "<br><br><h4><b><font size='6' color='red'>PASSWORDS ARE NOT MATCH</font></b></h4>";
			
		}
		else
			echo "<br><br><h3><b><font size='6' color='red'>THE STUDENT IS ALREADY EXISTS</font></b></h3>";


}

?>

</div>
</head><body bgcolor = "3377ff">
</body>
</html>