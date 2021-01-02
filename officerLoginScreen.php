 <?php
$profpic = "admin_hdr.png";
?>
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
		body {
				background-color: #3377ff;
				/*background-image: url('<?php echo $profpic;?>');
				background-size: 100%; */
			}
			

		</style>

<form action="" method="POST">



<input type="button" value="<< Exit <<" style='width:100' onclick="location='index.php'" ><br>

<div style align="center"><br><br><br><br><br><br>
		
<h2><font size = "7">OFFICER LOGIN PANEL</font></h2><hr width="270" align="center">

<h3>Officer ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : 
<input type='text' name='officerIDnumber' style="width:100px" maxlength="9"><br></h3>
<h3>Officer Password : 
<input type='password' name='officerPassword' style="width:100px" maxlength="10"><br></h3>  

<input type='submit' name='officerLogin' style="width:100px" value='Login'><br>

</div></form>
</head>
</body>
</html>

<?php
session_start();
$myFlag = false;

$connection=mysqli_connect("localhost","root","","librarymanagesystem");
	if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());}

if(isset($_POST['officerLogin'])){

	if((empty($_POST['officerIDnumber']) || empty($_POST['officerPassword']) ))
		$myFlag=true;

}


if(isset($_POST['officerLogin'])&& !empty($_POST['officerIDnumber']) && !empty($_POST['officerPassword'])){
	
	

	$_SESSION['officerIDNO'] = $_POST['officerIDnumber'];

	$officerIDNO=$_POST['officerIDnumber'];
	$officerPasswordNO =$_POST['officerPassword'];


	
	$sql1="SELECT officerID,officerPassword FROM officer WHERE officerID='$officerIDNO' AND officerPassword='$officerPasswordNO'";
	$query1=mysqli_query($connection,$sql1);
	if (!$query1) {   die('Invalid query: ' . mysql_error());}
	
	if(mysqli_num_rows($query1)==NULL){
		 echo "<font size=\"5\" color=white><center><b><i>THERE IS NO MATCH WITH THE OFFICER</i><b></center></font>";
	}
	else{
		header("location:officerPage.php");
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
else if ($myFlag )
	 echo "<font size=\"5\" color=white><center><b><i>THERE IS NO MATCH WITH THE OFFICER</i><b></center></font>";

?>