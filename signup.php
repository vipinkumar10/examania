<html>

<head>
<title>EXAMANIA</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>


<body>

<div class="container">
  <h2>SIGN UP</h2>
  <form type="submit" id="newUserForm" action="Registration/index.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-4" >
						<button type="button" class="btn btn-default btn-lg" id="newUserButton" style="border:none">
						<img src="images\default_pic.jpg" id="imagepre" class="img-responsive" style="width:100%" alt="Image">
						<input type="file" name="file" accept="image/*" id="imgInp"/>
						<p id="photo_para"></p>
					    </button>
					</div>
					<div class="col-md-4">
					</div>
				</div>
				<!----------------NAME------------------->
				<div class="form-group">
					<label for="usrname"><span class="glyphicon glyphicon-user"></span> NAME</label>
					<p id="name_para" style="color:red"></p>
					<input type="text" name="user" class="form-control" id="name" placeholder="NAME">
				</div>
				<!----------------NAME------------------->
				<!----------------DATE OF BIRTH------------------->
				<div class="form-group">
					<label for="dob"><span class="glyphicon glyphicon-calendar"></span> DATE OF BIRTH</label>
					<p id="dob_para" style="color:red"></p>
					<input type="date" name="dob" class="form-control" id="dateOfBirth" placeholder="Date Of Birth">
				</div>
				<!----------------DATE OF BIRTH------------------->
				<div class="form-group">
				<div class="col-md-4">
				  <label>GENDER</label>
				</div>
				<div class="col-md-4">
				  <input type="radio" id="M" name="gender" value="M"
						 checked>
				  <label for="M">MALE</label>
				</div>
				<div class="col-md-4">
				  <input type="radio" id="F" name="gender" value="F">
				  <label for="F">FEMALE</label>
				</div>
				</div>
				<!----------------FATHER NAME------------------->
				<div class="form-group">
					<label for="usrname"><span class="glyphicon glyphicon-user"></span>FATHER NAME</label>
					<p id="fname_para" style="color:red"></p>
					<input type="text" name="fname" class="form-control" id="fname" placeholder="FATHER NAME">
				</div>
				<!----------------FATHER NAME------------------->
				<!----------------MOTHER NAME------------------->
				<div class="form-group">
					<label for="usrname"><span class="glyphicon glyphicon-user"></span>MOTHER NAME</label>
					<p id="mname_para" style="color:red"></p>
					<input type="text" name="mname" class="form-control" id="mname" placeholder="MOTHER NAME">
				</div>
				<!----------------MOTHER NAME------------------->
				<!----------------DISTRICT NAME------------------->
				<div class="form-group">
					<label for="usrname"><span class="glyphicon glyphicon-home"></span>EMAIL</label>
					<p id="email_para" style="color:red"></p>
					<input type="text" name="email" class="form-control" id="email" placeholder="EMAIL">
				</div>
				<!----------------DISTRICT NAME------------------->
				<!----------------phone number------------------->
				<div class="form-group">
					<label for="usrname"><span class="glyphicon glyphicon-earphone"></span>PHONE NUMBER</label>
					<p id="phno_para" style="color:red"></p>
					<input type="number" name="phno" class="form-control" id="phno" placeholder="PHONE NUMBER">
				</div>
				<!----------------phone number------------------->
				<!----------------password------------------------>
				<div class="form-group">
					<label for="usrname"><span class="glyphicon glyphicon-user"></span>PASSWORD</label>
					<input type="password" name="pass1" class="form-control" id="pass1" placeholder="PASSWORD">
				</div>
				<div class="form-group">
					<input type="password" name="pass2" class="form-control" id="pass2" placeholder="RE-ENTER PASSWORD">
				</div>
				<!----------------password------------------------->
				<!----------------SUBMIT BUTTON------------------->
					<button type="button" class="btn btn-primary" onclick="validateForm();"><span class="glyphicon glyphicon-off"></span>SUBMIT</button>
				<!----------------SUBMIT BUTTON------------------->
				</form>
</div>




<!----------------------------script------------------------------------->
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#imagepre').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

<script>
//form validation
function validateForm(){
	var name,dob,fname,mname,gender,phno,state,dist,pinc,flag;
	flag=1;
	//...........collecting info.....................
	name = document.getElementById("name").value;
	dob = document.getElementById("dateOfBirth").value;
	//gender = document.getElementById("").value;
	fname = document.getElementById("fname").value;
	mname = document.getElementById("mname").value;
	phno = document.getElementById("phno").value;
	email = document.getElementById("email").value;
	pass1 = document.getElementById("pass1").value;
	pass2 = document.getElementById("pass2").value;
	
	//.................................................
	
	
	//-------------------image---------------------------
	var files = imgInp.files;

   /* if (files.length == 0) { 
	flag=0;
	alert("PHOTO REQUIRED"); } */
	//********************************************
	//-------------name-------------------------
	if(name==""){
		document.getElementById("name_para").innerHTML = "*REQUIRED";
		flag=0;
	}
	//-------------dob-------------------------
	if(dob==""){
		document.getElementById("dob_para").innerHTML = "*REQUIRED";
		flag=0;
	}
	//-------------fname-------------------------
	/*if(fname==""){
		document.getElementById("fname_para").innerHTML = "*REQUIRED";
		flag=0;
	}
	//-------------mname-------------------------
	if(mname==""){
		document.getElementById("mname_para").innerHTML = "*REQUIRED";
		flag=0;
	}*/
	//-------------email-------------------------
	if(email==""){
		document.getElementById("email_para").innerHTML = "*REQUIRED";
		flag=0;
	}
	//-------------phno-------------------------
	if(phno==""){
		document.getElementById("phno_para").innerHTML = "*REQUIRED";
		flag=0;
	}else{
		if(phno.length!=10){
			document.getElementById("phno_para").innerHTML = "INVALID PHONE NUMBER";
			flag=0;
		}
	}
	//--------------password-------------------------------
	if(pass1 == ""){
		alert("PASSWORD REQUIRED");
		flag = 0;
	}
	
	if(pass1 != pass2){
		alert("ENTER SAME PASSWORD IN BOTH THE FIELDS");
		flag = 0;
	}
	if(flag==1){
		document.getElementById("newUserForm").submit();
	}
	
}

</script>






</body>
</html>