<?php
session_start();

$con = mysql_connect("localhost","root","root123");
mysql_query("USE user");
$a=("INSERT INTO fitusers (Name, Email, Age, Password) VALUES ('$_POST[username]', '$_POST[email]', '$_POST[dob]', '$_POST[password]')" );

$name=$email=$age=$pwd=$cnfpwd='';
$reset='';
$error=$errorN=$errorE=$errorA='';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(empty($_POST['username']) && empty($_POST['email']) && empty($_POST['password']) && empty($_POST['cnfmpwd']))
	{
		$error="*required*";
		$reset="true";
	}
	else
	{
		$name=valid($_POST['username']);
		$email=valid($_POST['email']);
		$age=valid($_POST['dob']);
		$pwd=valid($_POST['password']);
		$cnfpwd=valid($_POST['cnfmpwd']);

		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$errorN="only letters and white spaces allowed";
			$reset="true";
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$errorE="invalid email input";
				$reset="true";
			}
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errorE="invalid email input";
			$reset="true";
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$errorN="only letters and white spaces allowed";
				$reset="true";
			}
		}
		elseif (!($age>20 && $age<80)) {
			$errorA="enter age within 0 to 80";
			$reset="true";
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$errorN="only letters and white spaces allowed";
				$reset="true";
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$errorE="invalid email input";
				$reset="true";
			}
		}
		else
		{
        if(isset($_POST['submit']))
        {
	    if($pwd != $cnfpwd)
	    {

		echo "<script>alert('password doesnt match'); </script>";
		header('Location: index.php');
	    }
	    else{

		echo "<script>alert('Congrats! $name you are now a fitAddict'); </script>";
		mysql_query($a,$con);
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
       mysql_close($con);

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
<link rel="stylesheet" type="text/css" href="css/index.css">
<title>fitAddict</title>
<style>
	.error{
		color: #FF0000;
		font-size: 14px;
	}
</style>
<script type="text/javascript">
function bmi()
{
	var kg = document.getElementById("Kg").value;
	var foot = document.getElementById("foot").value;
	foot = foot * 0.3048;
	var inch = document.getElementById("inch").value;
	inch = inch * 0.0254;
	var meter = foot + inch;
	var meter = meter * meter;
	var result = (kg / meter).toFixed(2);

	if (result<18.5) {
		document.getElementById("result").style.color="#0000CD";
		document.getElementById("comment").style.color="#0000CD";
		document.getElementById("result").innerHTML=result;
		document.getElementById("comment").innerHTML="Ooh No! You are underweight";
	}
	else if(result>=18.5 && result<=24.9)
	{
		document.getElementById("result").style.color="#00FF00";
		document.getElementById("comment").style.color="#00FF00";
		document.getElementById("result").innerHTML=result;
		document.getElementById("comment").innerHTML="Congrats! You are healthy";
	}
	else if(result>=25 && result<=29.9)
	{
		document.getElementById("result").style.color="#FFD700";
		document.getElementById("comment").style.color="#FFD700";
		document.getElementById("result").innerHTML=result;
		document.getElementById("comment").innerHTML="Ooh No! You are overweight";
	}
	else if(result>=30)
	{
		document.getElementById("result").style.color="#FF0000";
		document.getElementById("comment").style.color="#FF0000";
		document.getElementById("result").innerHTML=result;
		document.getElementById("comment").innerHTML="Sorry but You are obese!";
	}
	else{
		document.getElementById("result").innerHTML=result;
	}
}
</script>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
<div class="container">
<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarNav">
<a href="#" class="navbar-brand text-muted"><img height="60px" width="50px" src="images/fitAddict.png" alt=""></a>
	<ul class="navbar-nav ml-auto">
	<li class="nav-item p-2 active">
	<a id="home" class="nav-link" href="index.php">HOME</a>
	</li>
	<li class="nav-item p-2">
	<a class='nav-link' href='index.php'>CONSULT</a>
	</li>
	<li class="nav-item p-2">
	<a class="nav-link" href="#blog-head-section">BLOG</a>
	</li>
	<li class="nav-item p-2">
	  <a class="nav-link" href="About.php">ABOUT US</a>
	</li>
	<li class="nav-item p-2">
	   <?php if(!empty($_SESSION["uname"])){echo "<a id='logout' class='nav-link' href='Login.php'>LOGOUT</a>";} else {echo "<a class='nav-link' href='Login.php'>LOGIN</a>";} ?>
	</li>
	

	<li class="nav-item p-2">
	<input class="btn btn-outline-success" type="button" name="btn" value="<?php if(!empty($_SESSION["uname"])) {echo $_SESSION["uname"];} else {echo "Profile";} ?>">
	</li>
	</ul>
</div>
</div>
</nav>

<header id="home-section">
<div class="dark-overlay">
<br/>
<br/>
<br/>
<br/>
<br/>
	<div class="home-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="display-4">If You Worry for your health then stop! <strong>Your are at the right place</strong>. Let us take care of you</h1>
					<div class="d-flex flex-row">
					<div class="p-4 align-self-start"><i class="fa fa-check"></i>
				</div>
				<div id="fsize" class="p-3 align-self-end">
					We deal with making your health better to make you produce more efficiency
				</div>
				</div>
				<div class="d-flex flex-row">
					<div class="p-4 align-self-start">
					<i class="fa fa-check"></i>
				</div>
				<div id="fsize" class="p-3 align-self-end">
					We dont impose you to follow, we guide you to achieve your best health.
				</div>
				</div>
				<div class="d-flex flex-row">
					<div class="p-4 align-self-start">
					<i class="fa fa-check"></i>
				</div>
				<div id="fsize" class="p-3 align-self-end">
					We are online 24*7 to tend to your queries
				</div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="card card-primary card-form text-center">
			<div class="card-block">
			<h3>Sign Up Today</h3>
			<p>Please fill out this form to register</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
					<input type="text" name="username" class="form-control form-control-lg" placeholder="Name">
					<span class=".error text-danger"><?php echo $error;?></span>
					<span class=".error text-danger"><?php echo $errorN;?></span>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
					<span class=".error text-danger"><?php echo $error;?></span>
					<span class=".error text-danger"><?php echo $errorE;?></span>
				</div>
				<div class="form-group">
					<input type="text" name="dob" class="form-control form-control-lg" placeholder="Age">
					<span class=".error text-danger"><?php echo $errorA;?></span>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" maxlength="10">
					<span class=".error text-danger"><?php echo $error;?></span>
				</div>
				<div class="form-group">
					<input type="password" name="cnfmpwd" class="form-control form-control-lg" placeholder="Confirm Password" maxlength="10">
					<span class=".error text-danger"><?php echo $error;?></span>
				</div>
				<?php if($reset=="true"){echo "<a href='index.php' class='btn btn-outline-warning btn-block'>RESET</a>";} else {echo "<input type='submit' value='SUBMIT' name='submit' class='btn btn-outline-success btn-block'>";} ?>
			</form>
		</div>
	</div>
</div>

</div>
</div>
</div>
</div>
</header>

<!-- Explore Head -->
<section id="explore-head-section">
	<div class="container">
		<div class="row">
			<div class="col text-center">
			<div class="py-5">
				<h1 class="display-4">Explore</h1>
				<p class="lead">Welcome to our world of possibilities</p>
				<br/>

				<div class="card-columns">

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/card01.jpeg" alt="">
				<div class="card-block text-muted">
					<h4 class="card-title">Check Your BMI</h4>
					<h5 class="card-text">The BMI is an attampt to quantify the amount of tissue mass in an individual, and then categorize that person as <i>underweight, normal weight, overweight, or obese</i> based on that value</h5>
					<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">Check BMI</button>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/card02.jpeg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">DIET</h4>
					<h5 class="card-text text-muted">When you start eating food without labels, you no longer need to count calories<br/><br/>Prepare your own customized diet plan</h5>
					<a class="btn btn-warning btn-lg btn-block" href="#">DIET</a>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/card03.jpeg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">Fitness</h4>
					<h5 class="card-text text-muted">It is never too early and never too late to work towards the healthiest you <br/><br/>
					Kick start your fitness routine</h5>
					<a class="btn btn-danger btn-lg btn-block" href="#">GO</a>
				</div>
				</div>

				</div>

                <br/>
				<a href="#" class="btn btn-outline-secondary">Find Out More</a>
				</div>
			</div>
		</div>

		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h6 class="modal-title display-5" id="myModalLabel">BMI Calculator</h6>
						<button class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-inline">
						Weight(in kilograms):<input class="form-control ml-3" type="text" name="Kg" id="Kg">
					</div><br/>
					<div class="form-inline">
						Height:<input class="form-control ml-3" type="text" name="foot" id="foot" placeholder="foot">
	                    &nbsp; . &nbsp;<input class="form-control" type="text" name="inch" id="inch" placeholder="inch" style="margin-left: 65px;">
						
					</div><br/>
					<div class="form-inline">
						Result: <span class="form-control ml-3 display-4" id="result"></span>
					</div><br/>
					<div class="form-inline">
						<span id="comment" style="margin-left: 60px; font-size: 18px;"></span>
					</div>
					</div>
					<div class="modal-footer bg-success">
						<button class="btn btn-primary" onClick="bmi()">Results</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<!-- Explore Section -->
<section id="explore-section" class="bg-faded text-muted py-5">
	<div class="container">
		<div class="row">
			<div id="img1" class="col-md-6">
			<img src="images/01.jpeg" alt="" class="img-fluid mb-3 rounded-circle">
			</div>
			<div class="col-md-6">
			<h3>Consult With Our Experts</h3>
			<p>Google tends to your problems from databases But our experts tends to your problems based on their knowledge and skills. So feel free to ask.</p>
			<div class="d-flex flex-row">
					<div class="p-4 align-self-start">
					<i class="fa fa-check"></i>
				</div>
				<div class="p-4 align-self-end">
					Get your own customized diet plan with expert advice.
				</div>
				</div>
				<div class="d-flex flex-row">
					<div class="p-4 align-self-start">
					<i class="fa fa-check"></i>
				</div>
				<div class="p-4 align-self-end">
					Fix personal appointments, or consult online for free.
				</div>
				</div>
				<a class="btn btn-lg btn-outline-success" href="#">Know more</a>
			</div>
		</div>
	</div>
</section>

<section id="card-container" class="bg-success text-inverse py-5">
	<div class="container">
	<div class="row">
	<div class="col text-center">
			<div class="py-5">
				<h1 class="display-4">Latest Articles</h1>
	       </div>
	       <br/>
	       <div class="card-columns">

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/card04.jpeg" alt="">
				<div class="card-block text-muted">
					<h4 class="card-title">Benefits of Green Tea</h4>
					<h5 class="card-text"><ol>
						<li>Green tea contains Bioactive Compounds that improve health</li><br/>
						<li>Improves brain function and Makes you smarter</li>
					</ol></h5>
					<a class="btn btn-outline-success btn-lg" href="#">Know More</a>
					<p class="card-text"><br/><small class="text-muted">Last updated 3days ago</small></p>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img height="30px" class="card-img-top img-fluid" src="images/card05.jpeg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">Papayas Benefits</h4>
					<h5 class="card-text text-muted">Dont' be deterred by the exquisite look of the Papaya fruit. According to studies and research. Papayas could provide protection against a number of different body conditions like heath diseases. The fibers found in <small> Papayas fruits could also help....</small></h5>
					<a class="btn btn-outline-warning btn-lg" href="#">Know more</a><p class="card-text"><br/><small class="text-muted">Last updated 2days ago</small></p>
				</div>
				</div>

				<div class="card" style="width: 26rem; height: 30rem">
				<iframe style="width: 100%; height: 75%" src="https://www.youtube.com/embed/IODxDxX7oi4"></iframe>
				<div class="card-block">
					<h4 class="card-title text-muted">Push Up</h4>
					<h5 class="card-text text-muted">Proper way to do push ups</h5>
					<p class="card-text" style="margin-top: -25px;"><br/><small class="text-muted">Last updated today</small></p>
				</div>
				</div>

				</div>
	     </div>
		</div>
	</div>
	<br/>
	<nav>
		<ul class="pagination bg-outline-success justify-content-center">
		<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
		<li class="page-item active"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
</section>

<!-- footer -->
<section id="footer" class="text-inverse py-3">
	<div class="container">
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
