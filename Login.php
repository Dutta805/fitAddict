<?php

session_start();

$con = mysql_connect("localhost","root","root123");
mysql_query("USE user");

	$Lname=$Lemail=$Lpwd='';
	$reset='';
$error=$errorN=$errorE='';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if((empty($_POST['username']) && empty($_POST['userpwd'])) || (empty($_POST['uemail']) && empty($_POST['userpwd'])))
	{
		$error="*required*";
		$reset="true";
	}
	else
	{
		
	$Lname = valid($_POST['username']);
	$Lemail = valid($_POST['uemail']);
	$Lpwd = valid($_POST['userpwd']);

		if(!preg_match("/^[a-zA-Z ]*$/",$Lname))
		{
			$errorN="only letters and white spaces allowed";
			$reset="true";
		}
		elseif (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
			$errorE="invalid email input";
			$reset="true";
		}
		else
		{
        if(isset($_POST['submit']))
        {
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
   }
  }
}


function valid($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
				<p class="display-6 text-primary">OR</p>
				<div class="form-group">
					<input type="text" name="adminame" class="form-control form-control-lg" placeholder="Name" required="required">
				</div>

				<div class="form-group">
					<input type="password" name="adminpwd" class="form-control form-control-lg" placeholder="Password" maxlength="10" required="required">
				</div>
				<br/>

				<input type="submit" value="Login" class="btn btn-block btn-outline-danger">
			</form>
		</div>
	</div>
          	
          </div>

          <div class="col-md-4 ml-8" style="margin-left: 180px;">
			<div id="card2" class="card card-form text-center p-4">
			<div class="card-block">
			<h3 class="text-invrse display-5">User Login</h3>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div class="form-group">
					<input type="text" name="username" class="form-control form-control-lg" placeholder="Name">
					<span class=".error text-danger"><?php echo $error;?></span>
					<span class=".error text-danger"><?php echo $errorN;?></span>
				</div>
				<p class="display-6 text-primary">OR</p>
				<div class="form-group">
					<input type="text" name="uemail" class="form-control form-control-lg" placeholder="Email">
					<span class=".error text-danger"><?php echo $error;?></span>
					<span class=".error text-danger"><?php echo $errorE;?></span>
				</div>

				<div class="form-group">
					<input type="password" name="userpwd" class="form-control form-control-lg" placeholder="Password">
					<span class=".error text-danger"><?php echo $error;?></span>
				</div>
				<br/>

				<?php if($reset=="true"){echo "<a href='Login.php' class='btn btn-outline-warning btn-block'>RESET</a>";} else {echo "<input type='submit' value='SUBMIT' name='submit' class='btn btn-outline-success btn-block'>";} ?>
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



