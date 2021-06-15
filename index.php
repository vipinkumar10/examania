<?php
session_start();
$_SESSION['set']=-1;
$_SESSION['phone']=null;
?>

<html>

<head>
<title>EXAMANIA</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
  <script>
	  function resizeIframe(obj) {
		  obj.style.height = 0;
		obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
	  }
	</script>
</head>

<body>


<!-------------------------------------------------php------------------------------>


<?php
		include_once 'config/Database.php';
		
		$database = new Database();
		$db = $database->connect();
      
        if(isset($_POST['login'])) { 
			$phno = $_POST['phone'];
			$password = $_POST['password'];
			$sql = "select password,name,dob,email,fname,mname,imgname from user where phone='".strval($phno)."'";
			$result1 = $db->query($sql);
			
			if($result1->num_rows >0){
				$row = $result1->fetch_assoc();
				if($row['password'] == $password){
					echo "<script>alert('WELCOME');</script>";
					$_SESSION["set"] = 1;
					$_SESSION["phone"] = strval($phno);
					$_SESSION["name"] = $row['name'];
					$_SESSION["email"] = $row['email'];
					$_SESSION["dob"] = $row['dob'];
					$_SESSION["fname"] = $row['fname'];
					$_SESSION["mname"] = $row['mname'];
					$_SESSION["imgname"] = 'userPhotos/'.$row['imgname'];
				}
				else{
					echo "<script>alert('INVALID PASSWORD');</script>";
				}
			}
			else{
				echo "<script>alert('PHONE NUMBER NOT FOUND');</script>";
			}
 
        } 
         
 ?>


<!-------------------------------------------------php------------------------------>

<!------------------------------BODY------------------------------>

<div class="container-fluid" style="padding:0px">
	
	<!------------------------------HEADER------------------------------>
	<div class="fixed-top">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
			<li class="nav-item active">
			  <a class="nav-link" href="images\logo.jpg"><img src="images\logo.jpg" width="40" height="40">EXAMANIA</a>
			</li>
			<?php
			if($_SESSION['phone'] == NULL){
				
				echo '<div style="position:fixed;top:20px;right:10px;background-color:transparent">
					<img src="images/default_pic.jpg" onclick="showHide()" class="rounded-circle shadow" style="height:50px;width:50px" alt="Cinque Terre" >
				</div>';
				
				echo '<div style="position:fixed;top:70px;right:10px;z-index:2;display:none;padding:5px" id="pro_button" class="bg-dark shadow">
					<div class="row" style="margin:10px">
					<button type="button" class="btn btn-primary" onclick="signupPage()" style="width:150px">SIGNUP</button>
					</div>
					<div class="row" style="margin:10px">
					<button type="button" class="btn btn-primary" style="width:150px" data-toggle="modal" data-target="#logModal">LOGIN</button>
					</div>
					
				</div>';
			}
			?>
		  </ul>
		</nav>	
		<?php
		
			
			if($_SESSION['phone'] != NULL){
				echo '<div style="position:fixed;top:20px;right:10px;background-color:transparent">
					<img src="'.$_SESSION["imgname"].'" onclick="showHide()" class="rounded-circle shadow" style="height:50px;width:50px" alt="Cinque Terre" >
				</div>';
				echo '<div style="position:fixed;top:70px;right:10px;z-index:2;display:none;padding:5px" id="pro_button" class="bg-dark shadow">
					<div class="row" style="margin:10px">
					<button type="button" class="btn btn-primary" onclick="profilePage()" style="width:150px">PROFILE</button>
					</div>
					<div class="row" style="margin:10px">
					<button type="button" class="btn btn-primary" onclick="session_destroy"style="width:150px">LOG OUT</button>
					</div>
				</div>';
			}
		?>
	</div>
	<!------------------------------/HEADER------------------------------>
	
	
	<!------------------------------LOGIN SIGNUP MODAL------------------------------>
	
	
	
	<!---------------LOGIN--------------->
	<div id="logModal" class="modal fade">
        <div class="modal-dialog" style="padding:20px">
            <div class="modal-content" style="padding:20px">		
					<h2>LOGIN</h2>
					<form type="submit" id="newUserForm" action="index.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="usrname"><span class="glyphicon glyphicon-user"></span>Phone Number</label>
						<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number">
		
						<label for="usrname"><span class="glyphicon glyphicon-user"></span>PASSWORD</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="PASSWORD">
					</div>
					
					<button type="submit" class="btn-primary" name="login"><span class="glyphicon glyphicon-off"></span>Login</button>
					</form>
            </div>
        </div>
    </div>
	
	
	
	<!------------------------------/LOGIN SIGNUP MODAL------------------------------>
	
	<!---------------------------------------------body--------------------------->
	
	
	
		<div class="container" style="margin-top:80px">
		  <h2></h2>
		  <p>Type something to search the table:</p>  
		  <input class="form-control" id="myInput" type="text" placeholder="Search..">
		  <br>
		  <p>SELECT EXAMINATION</p>
		  <table class="table table-bordered">
			<thead style="background-color:#3399ff">
			  
				<th>EXAM NAME</th>
				<th>QUALIFICATION</th>
				<th>DATE OF EXAM</th>
			  
			</thead>
			<tbody id="myTable">
			<?php
			
				include_once 'config/Database.php';
				
				$database = new Database();
				$db = $database->connect();
				
				$sql = "select eid,name,m_qual,e_date from exam";
				
				$result = $db->query($sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr  class='tro' type='button' onclick='examPage(".$row['eid'].")' id='".$row['eid']."'>";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['m_qual']."</td>";
							echo "<td>".$row['e_date']."</td>";						
						echo"<tr>";
					}
				} else {
					echo "No results found";
				}
			
			?>
			</tbody>
		  </table>
		  
		</div>

	
	
	<!---------------------------------------------body--------------------------->
	
	
	<!-------------------------------------------------------------------------------------------------------------->


	
</div>
	<!-- Footer -->
	<footer class="page-footer font-small pt-4 bg-dark" style="color:white">

	  <!-- Footer Links -->
	  <div class="container-fluid text-center text-md-left" >

		<!-- Grid row -->
		<div class="row">

		  <!-- Grid column -->
		  <div class="col-md-6">

			<!-- Content -->
			<h5 align="left"><b>About</b></h5>
			<p align="left"> </p>

		  </div>
		  <!-- Grid column -->


		  <!-- Grid column -->
		  <div class="col-md-3">

			
		  </div>
		  <!-- Grid column -->
		  <!-- Grid column -->
		  <div class="col-md-3">

			<h5 class="text-uppercase" align="right" style="font-size:18"><b>Contact:</b></h5>

			<ul class="list-unstyled" align="right">
			  <li>
				<p><b>Ph. Number:999xxxxxxx</b><br>
				<b>E-Mail ID :vipinyadav@gmail.com</b></p>
			  </li>
			</ul>

		  


		  </div>
		  <!-- Grid column -->

		</div>
		<!-- Grid row -->

	  </div>
	  <!-- Footer Links -->

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3" style="background-color:#000000;color:white">© 2020 Copyright:
		<a href=""> examania.com</a>
	  </div>
	  <!-- Copyright -->

	</footer>
	<!-- Footer -->

	<!-------------------------------------------------------------------------------------------------------------->


<!-----------------------------------script---------------------->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


function examPage(eid){
	window.location="examPage.php?eid=".concat(eid);
}

function signupPage(){
	window.location="signup.php";
}

function profilePage(){
	window.location="profilePage.php";
}
</script>


<script>
function showHide() {
  var x = document.getElementById("pro_button");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<!---------------script------------------------------------------>





<!------------------------------/BODY------------------------------>
</body>
</html>