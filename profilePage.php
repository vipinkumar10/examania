<html>

<head>
<title>profile_examania</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <?php session_start();?> 
  <style>
.center {
  margin: auto;
  width: 60%;
  padding: 10px;
}
</style>
</head>
<!-----------------------------------------------------php-------------------------------------------------------->
<body>
 <!-----------------------------phpend----------------------------->
 
 <!------------------------navbar----------->
<div class="fixed-top">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
			
			<li class="nav-item active">
			  <a class="nav-link" href="images\logo.jpg"><img src="images\logo.jpg" width="40" height="40">EXAMANIA</a>
			</li>
			
			<?php
				if($_SESSION["phone"] != NULL)
			    {
				  echo '<div style="position:fixed;top:20px;right:10px;background-color:transparent">
					<img src="'.$_SESSION["imgname"].'" onclick="showHide()" class="rounded-circle shadow" style="height:50px;width:50px" alt="Cinque Terre" >
				        </div>';
				  echo '<div style="position:fixed;top:70px;right:10px;z-index:2;display:none;padding:5px" id="pro_button" class="bg-dark shadow">
					   <div class="row" style="margin:10px">
					   <button type="button" class="btn btn-primary" style="width:150px">PROFILE</button>
					    </div>
					  <div class="row" style="margin:10px">
					  <button type="button" class="btn btn-primary" onclick="session_destroy()" style="width:150px">LOG OUT</button>
					  </div>
				   </div>';
				}
		?>
		  </ul>
		</nav>
	</div>
<!---------------------------------------------------------navbar--------------------------------------------->  
<!----------------------------------------------------------body---------------------------------------------->
<div class="container-fluid pl-5 pt-5" id="image"style="margin-top:40px">
		<?php echo '<div class="rounded" class="float-left" class="img-fluid">
		  <img src="'.$_SESSION["imgname"].'" class="image-responsive" alt="images/default_pic.jpg" width="180" height="170" >
		</div>'
		?>
</div>
<div class="container-fluid" id="PI" style="margin-top:40px">
<h1>Personal Info </h1>
  <form class="form-online" id="info" class="responsive" style="margin-top:20px">
    <div class="col-sm-4">
      Name:<input type="text"  class="form-control" value="<?php echo $_SESSION["name"]?>" readonly >
    </div>
	<div class="col-sm-4">
      Date Of Birth:<input type="text" class="form-control" value="<?php echo $_SESSION["dob"]?>" readonly>
    </div>
	<div class="col-sm-4">
      phone:<input type="text" class="form-control" value="<?php echo $_SESSION["phone"]?>" readonly>
    </div>
	<div class="col-sm-4">
      E-mail:<input type="text" class="form-control" value="<?php echo $_SESSION["email"]?>" readonly>
    </div>
	<div class="col-sm-4">
      Father's Name:<input type="text" class="form-control" value="<?php echo $_SESSION["fname"]?>" readonly>
    </div>
	<div class="col-sm-4">
      Mother's Name:<input type="text" class="form-control" value="<?php echo $_SESSION["mname"]?>" readonly>
    </div>
  </form>
  <button type="submit" class="btn btn-primary" onclick="signupPage()">Update</button>
</div>
<!------------------------------------------------------qualification------------------------------------------>
<?php
		include_once 'config/Database.php';
		
		$database = new Database();
		$db = $database->connect();
		$phn=$_SESSION["phone"];
           $sql="select quali from qual where phone='".$phn."'";
          $result  = $db->query($sql);
	  echo "<div class='container-fluid' id='qualification' style='margin-top:40px'>
          <h1>Qualifications </h1>";
	        if($result->num_rows > 0){
		     while($row = $result->fetch_assoc()){
			   echo "<tr>".$row['quali']."</tr><br>";
		     }
		    echo "<button type='button' data-toggle='modal' data-target='#qualreg' class='btn btn-primary responsive mt-3'>Update</button>";
            }
	        else{ 		   
               echo "<button type='button' data-toggle='modal' data-target='#qualreg' class='btn btn-primary responsive mt-3'>Add qualification</button>";
	          }				
			  
    echo "</div>";
?>
<div class="modal fade" id="qualreg" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">select qualification</h5>
      </div>
      <div class="modal-body">
        <form class="form-online" class="submit" id="addqual" method="post" action="registration/pp.php">
				Select 10th:
				<select class="form-control" name="qul" selected="1">
				  <option id="1">none</option>
				  <option>10th</option>
				</select>
				Select 12th stream:
				<select class="form-control" name="qul1">
					<option selected>none</option>
					<option>Commerce</option>
					<option>Arts</option>
					<option>Bio</option>
					<option>Math</option>
					<option>Computer Science</option>
				</select>
				Select bachlor:
				<select class="form-control" name="qul2">
					<option selected>none</option>
					<option>B.Com</option>
					<option>B.C.A</option>
					<option>B.Sc.</option>
					<option>B.B.A</option>
					<option>B.A</option>
					<option>Bootney</option>
					<option>B.C.S</option>
					<option>B.tech</option>
				</select>
				Select masteres:
				<select class="form-control" name="qul3">
					<option selected>none</option>
					<option>M.Com</option>
					<option>M.C.A</option>
					<option>M.Sc.</option>
					<option>M.B.A</option>
					<option>M.A</option>
					<option>M.C.S</option>
					<option>M.tech</option>
				</select>
				  <button type="submit" class="btn btn-primary responsive mt-3"><span class="glyphicon glyphicon-off"></span>Save</button>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------------------body---------------------------------------------->
<script>
function showHide() {
  var x = document.getElementById("pro_button");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function profilePage(){
	window.location="profilePage.php";
}
function qualPage(){
	window.location="registration/qualreg.php";
}
</script>
</body>
</html>