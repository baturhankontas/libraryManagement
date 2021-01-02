<?php
$profpic = "ooo.jpg";
?>
<html>
	<head>
		<style type="text/css">
			h2 {				
    			color: white;
    			text-shadow: 4px 0 5px #FFFFFF, 2px 2px 5px #0000FF
			}
			h3 {
				color: white;
				text-shadow: 3px 3px 4px #000000;
			}
			body {
				background-image: url('<?php echo $profpic;?>');
				background-size: 100%; 
				opacity: 1;
    		}
		
		</style>





<form action="" method="POST">
	<input type="button" value="<< Exit <<" style='width:100' onclick="location='index.php'" ><br>
		
<div style align="center"><br><br><br><br><br><br><br><br><br>

<h2><b>
<font face="Papyrus" size="12" color="white">STUDENT LOGIN PAGE</font>
</b></h2><hr width="270" align="center">

<h3>Student ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : 
<input type='text' name='studentIDnumber' style="width:100px" maxlength="10"><br></h3>
<h3>Student Password : 
<input type='password' name='studentPassword' style="width:100px" maxlength="10"><br></h3>  

<input type='submit' name='studentLogin' style="width:100px" value='Login'><br>

</div></form>
</head>
</html>

<?php

session_start();

$myFlag = false;
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
	if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());}


if(isset($_POST['studentLogin'])){

	if((empty($_POST['studentIDnumber']) || empty($_POST['studentPassword']) ))
		$myFlag=true;

}



if(isset($_POST['studentLogin'])&& !empty($_POST['studentIDnumber']) && !empty($_POST['studentPassword'])){
	
	

$_SESSION['studentIDNO'] = $_POST['studentIDnumber'];

	 $studentIDNO=$_POST['studentIDnumber'];
	 $studentPasswordNO =$_POST['studentPassword'];


	
	$sql1="SELECT stuID,stuPassword FROM studentlist WHERE stuID='$studentIDNO' AND stuPassword='$studentPasswordNO'";
	$query1=mysqli_query($connection,$sql1);
	if (!$query1) {   die('Invalid query: ' . mysql_error());}
	
	if(mysqli_num_rows($query1)==NULL){
		 echo "<font size=\"5\" color=cyan><center><b><i>THERE IS NO MATCH WITH THE STUDENT</i><b></center></font>";
	}
	else{
		header("location:studentPage.php");
		//	print for controlling values
		/*
		while($row=mysqli_fetch_assoc($query1)){			
			echo "name :  ";
			echo "$row[stuID]";
			echo "<br> passwd : $row[stuPassword]";		
		}
		*/
		

		//$sql2="INSERT INTO studentbook (studentid,book) VALUES ('$borrowerID', '$sql1')";
		//$query2=mysqli_query($connection,$sql2);
	
	/*while($row=mysqli_fetch_assoc($query1)){
		echo "<b>YOU BORROWED ";
		echo "$row[name]";
		echo" SUCCESFULLY</b> ";
		
	}*/

	}//ELSE
}// BIG IF
else if (  $myFlag )
	 echo "<font size=\"5\" color=red><center><b><i>THERE IS NO MATCH WITH THE STUDENT</i><b></center></font>";
	



/*
	 if(isset($_GET['stuLog']) ){
		$sql1="SELECT stuID,stuPassword FROM studentlist";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}
	

		while($row=mysqli_fetch_assoc($query1)){
	
			if( $row[stuID] == studentIDnumber && $row[stuPassword] == studentPassword)
				echo " <tr><td>ASDADASD</tr></td>";

		}
	}
	*/
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