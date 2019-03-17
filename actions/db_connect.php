<?php 
	$localhost="127.0.0.1";
	$usernme="root";
	$password="";
	$dbname="cr10_Anes_Smajic_biglibrary";

	$mysqli=new mysqli($localhost,$usernme,$password,$dbname);


	if($mysqli->connect_error){
		die("connection-failed:" . $mysqli->connect_error);
	}else{
		
	}
 ?>