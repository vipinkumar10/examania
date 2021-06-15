
<?php

include_once '../config/Database.php';

$name     =  $_POST["user"];
$dob      =  $_POST['dob'];
$gender   =  $_POST['gender'];
$fname    =  $_POST['fname'];
$mname    =  $_POST['mname'];
$phno     =  $_POST['phno'];
$email    =  $_POST['email'];
$passw    =  $_POST['pass1'];
echo $_FILES['file']['name'];


$database = new Database();
$db = $database->connect();

//-----------------phno validation----------------------
$sql = "select phone from user where phone='".strval($phno)."'";
$result1 = $db->query($sql);

$sql = "select email from user where email='".$email."'";

$result = $db->query($sql);
if($result->num_rows === 0 && $result1->num_rows ===0){
	//-----------sql to insert new data-----------------
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$filename = strval($phno).".".$ext;
    $sql = "insert into user(name,dob,gender,fname,mname,phone,imgname,email,password)
         values('".$name."','".$dob."','".$gender."','".$fname."','".$mname."','".strval($phno)."','".$filename."','".$email."','".$passw."')";
		 
	if ($db->query($sql) === TRUE) {
			echo "<script type='text/javascript'>alert('SUCCESSFULLY REGISTERED');</script>";
		

		
		
		//----------------------------------FILE HANDLING UPLOADING---------------------------------
		
			//uploading file

			  $targetdir = '../userPhotos/';   
			  $targetfile = $targetdir.$phno.'.'.$ext;

			  if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
				// file uploaded succeeded
			  } 
			  else { 
				// file upload failed
			  }
		//-------------------------------location info-------------------
		
		echo '<script type="text/javascript">location.href = "../";</script>';
		
	} 
	else {
		echo "Error: " . $sql . "<br>" . $db->error;
	}
}
else{
	echo "<script type='text/javascript'>alert('INVALID PHONE NUMBER or EMAIL (ALREADY TAKEN) -PLEASE TRY AGAIN');</script>";
	echo '<script type="text/javascript">location.href = "../";</script>';
}

?>