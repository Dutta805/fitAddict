<?php

session_start();

$con = mysql_connect("localhost","root","root123");
mysql_query("USE user");

if(isset($_POST['submit']))
{
	$Lname=$Lemail=$Lpwd='';
	$Lname=$_POST['username'];
	$Lemail=$_POST['uemail'];
	$Lpwd=$_POST['userpwd'];

	$q="SELECT * FROM fitusers";
	$r=mysql_query($q,$con);
	while ($a=mysql_fetch_array($r)) {
		if($a['Name']==$_POST[username] || $a['Email']==$_POST[uemail])
		{
			if($a['Password']==$_POST[userpwd])
			{
				$_SESSION["uname"]=$a['Name'];
				header("Location: consult.php");
			}
			else
			{
				echo "<script>alert('Invalid username or password, try again');</script>";
				header("Location: Login.php");
			}
		}
		}
}
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="images/fitAddict.png">
<link rel="stylesheet" type="text/css" href="css/Login.css">
<title>fitAddict</title>
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
<div class="container">
<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarNav">
<a href="#" class="navbar-brand text-muted"><img height="60px" width="60px" src="images/fitAddict.png" alt=""></a>
	<ul class="navbar-nav ml-auto">
	<li class="nav-item p-2">
	<a class="nav-link" href="index.php">HOME</a>
	</li>
	<li class="nav-item p-2">
	<?php if(!empty($_SESSION["uname"])){echo "<a class='nav-link' href='consult.php'>CONSULT</a>";} else {echo "<a class='nav-link' href='Login.php'>CONSULT</a>";} ?>
	</li>
	<li class="nav-item p-2">
	<a class="nav-link" href="#blog-head-section">BLOG</a>
	</li>
	<li class="nav-item p-2">
	<a class="nav-link" href="About.php">ABOUT US</a>
	</li>
	<li class="nav-item p-2 active">
	<a class="nav-link" href="Login.php">LOGIN</a>
	</li>
	</ul>
</div>
</div>
</nav>
<br/>
<br/>

<section id="main-content" class="py-5">
   <div class="container" style="margin-left: 250px;">
   <div class="row mt-2">
   <div class="col-md-4">
			<div id="card1" class="card card-form text-center p-4">
			<div class="card-block">
			<h3 class="text-inverse display-5">Admin Login</h3>
			<form action="" method="POST">
<div class="form-group">
					<input type="text" name="adminame" class="form-control form-control-lg" placeholder="Username" required="required">
				</div>
				<p>or</p>
				<div class="form-group">
					<input type="text" name="adminame" class="form-control form-control-lg" placeholder="Name" required="required">
				</div>

				<div class="form-group">
					<input type="password" name="adminpwd" class="form-control form-control-lg" placeholder="Password" required="required">
				</div>
				<br/>

				<input type="submit" value="Login" class="btn btn-outline-danger">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" value="Reset" class="btn btn-outline-danger">
			</form>
		</div>
	</div>
          	
          </div>

          <div class="col-md-4 ml-8" style="margin-left: 180px;">
			<div id="card2" class="card card-form text-center p-4">
			<div class="card-block">
			<h3 class="text-invrse display-5">User Login</h3>
			<form action="" method="POST">
<div class="form-group">
					<input type="text" name="username" class="form-control form-control-lg" placeholder="Name">
				</div>
				<p>or</p>
				<div class="form-group">
					<input type="text" name="uemail" class="form-control form-control-lg" placeholder="Email">
				</div>

				<div class="form-group">
					<input type="password" name="userpwd" class="form-control form-control-lg" placeholder="Password" required="required">
				</div>
				<br/>

				<input type="submit" name="submit" value="Login" class="btn btn-outline-success">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" value="reset" class="btn btn-outline-success">
			</form>
		</div>
	</div>
          	
          </div>
		  
		</div>
   </div>
	
</section>

<!-- footer -->
<section id="footer" class="text-inverse py-3">
	<div id="back" class="container">
	<div class="d-flex flex-row align-items-center justify-content-between">
				<h1 class="display-6">Follow Us</h1>
				<div><a href="#"><i class="fa fa-twitter fa-inverse p-4"></a></i></div>
				<div><a href="#"><i class="fa fa-facebook fa-inverse p-4"></a></i></div>
				<div><a href="#"><i class="fa fa-instagram fa-inverse p-4"></a></i></div>
				<div><a href="#"><i class="fa fa-linkedin fa-inverse p-4"></a></i></div>
				<small class="small text-right"><div class="fa fa-copyright">fitAddict 2017</div></small>
            </div>
		</div>
</section>


<script src="https://code.jquery-3.2.1.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>



