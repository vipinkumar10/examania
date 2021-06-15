<?php
include_once '../config/Database.php';
session_start();
$database = new Database();
$db = $database->connect();
$PH=$_SESSION["phone"];
$sql="select quali from qual where phone='".$phn."'";
          $result  = $db->query($sql);
		  if($result->num_rows==0){
if(($_POST["qul"]!="none")){
	if($_POST["qul1"]!="none"){
		if($_POST["qul2"]!="none"){
			if($_POST["qul3"]!="none"){
				$sql = "insert into qual(phone,quali)".
                        "values('".$PH."','".$_POST["qul3"]."')";
						 if ($db->query($sql) == TRUE) {
		                 }else{
								echo "<script type='text/javascript'>alert('.$sql.');</script>";
								}	       
							     //break();//also qual &qual1 &qual2
			}
         $sql = "insert into qual(phone,quali)
                  values('".$PH."','".$_POST["qul2"]."')";
						//break();//also qual &qual1
						if ($db->query($sql) == TRUE) {
							}else{
									echo "<script type='text/javascript'>alert('.$sql.');</script>";
									}
		}   
		$sql = "insert into qual(phone,quali)
               values('".$PH."','".$_POST["qul1"]."')";
						  //break();//also qual
				if ($db->query($sql) == TRUE) {
				}else{
						echo "<script type='text/javascript'>alert(' ERROR1');</script>";
						}
	}
$sql = "insert into qual(phone,quali)
       values('".$PH."','".$_POST["qul"]."')";
}		
		if ($db->query($sql) == TRUE) {
			echo "<script type='text/javascript'>alert(' SAVED SUCCESSFULLY');</script>";
		}else{
		echo "<script type='text/javascript'>alert(' ERROR');</script>";
		}	
		  }		 
?>