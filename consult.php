<?php
session_start();
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
<link rel="stylesheet" type="text/css" href="css/consult.css">
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
	<li class="nav-item p-2 active">
	<a class="nav-link" href="consult.php">CONSULT</a>
	</li>
	<li class="nav-item p-2">
	<a class="nav-link" href="#blog-head-section">BLOG</a>
	</li>
	<li class="nav-item p-2">
	<a class="nav-link" href="About.php">ABOUT US</a>
	</li>
	<li class="nav-item p-2">
	<a class="nav-link" href="Login.php">LOGIN</a>
	</li>
	<input class="btn btn-outline-success" type="button" name="btn" value="<?php echo $_SESSION["uname"]?>">
	</li>
	</ul>
</div>
</div>
</nav>
<br/>
<br/>
<div class="container">
<header id="main-header">
	<div class="row no-gutters">
		<div class="col-lg-4 col-md-5 col-sm-12">
			<img src="images/header1.jpg" alt="">
		</div>
		<div class="col-lg-8 col-md-7 col-sm-12">
			<div class="d-flex flex-column">
			<div class="p-5 bg-inverse text-white">
			<div class="d-flex flex-row justify-content-between align-items-center">
				<h1 class="display-4">fitAddict</h1>
				<div><i class="ic fa fa-twitter"></i></div>
				<div><i class="ic fa fa-facebook"></i></div>
				<div><i class="ic fa fa-instagram"></i></div>
				<div><i class="ic fa fa-linkedin"></i></div>
            </div>
			</div>

			<div class="p-4 bg-dark">Explore the consulation you are interested on</div>

			<div>
				<div class="d-flex flex-row text-white align-items-stretch text-center">
					<div class="port-item p-4 bg-primary" data-toggle="collapse" data-target="#fitness">
						<i class="fa fa-gears d-block"></i> Fitness Expert
					</div>
					<div class="port-item p-4 bg-success" data-toggle="collapse" data-target="#Dietitian">
						<i class="fa fa-leaf d-block"></i> Dietitian
					</div>
					<div class="port-item p-4 bg-warning" data-toggle="collapse" data-target="#Osteopath">
						<i class="fa fa-smile-o d-block"></i> 
						Yoga
					</div>
					<div class="port-item p-4 bg-danger" data-toggle="collapse" data-target="#Chiroprator">
						<i class="fa fa-signing d-block"></i> Chiroprator
					</div>
				</div>
			</div>

			</div>
		</div>
	</div>
</header>

<!-- fitness -->
<div id="fitness" class="collapse show">
	<div class="card card-block card-primary text-white py-5">
		<h2>Here you will find the best fitness advisors</h2>
		<p class="lead">Trainer//Motivator//Advisor</p>
	</div>

	<div class="card bg-faded card-block p-5">
	<div class="card-columns">

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" height="70px" src="images/FT1.jpg" alt="">
				<div class="card-block text-muted">
					<h4 class="card-title">Shayamal Vallabhjee</h4>
					<h5 class="card-text">I am a South African Sports Scientist & Performance Coach with 18 years experience in High Performance Sporting environments. The author of four books on Sports Science & Motivation.</h5><<br/>
					<a class="btn btn-success btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/FT2.jpg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">Guru Mann</h4>
					<h5 class="card-text text-muted">Guru Mann is Muscle Building & Fat Loss Expert. He is a Professional Fitness Model, Certified Advanced Fitness Trainer, Certified Nutrition Specialist and Certified Strength & Conditioning Specialist from San Francisco, California.</h5>
					<a class="btn btn-warning btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/FT3.jpg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">Deepika Mehta</h4>
					<h5 class="card-text text-muted">Renowned fitness trainer lives in Mumbai, has trained many celebrities. Also expert in yoga and adventure sports.</h5>
					<br/><br/><br/><br/>
					<a class="btn btn-danger btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				</div><br/><br/><br/>

		<nav>
		<ul class="pagination bg-outline-success justify-content-center">
		<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
		<li class="page-item active"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
	</div>
</div>

<!-- Dietitian -->

<div id="Dietitian" class="collapse">
	<div class="card card-block card-success text-white py-5">
		<h2>Consult with our top Dietitian</h2>
		<p class="lead">Customize your diet plan with expert advice</p>
	</div>

	<div class="card bg-faded card-block p-5">
	<div class="card-columns">

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" height="70px" src="images/D1.jpg" alt="">
				<div class="card-block text-muted">
					<h4 class="card-title">Ishi Khosla</h4>
					<h5 class="card-text">Ishi Khosla is a practicing clinical nutritionist, consultant, writer, columnist, researcher, author and an entrepreneur.
					She deals with a wide range of nutrition related health problems including cardio-vascular disease, diabetes, etc.</h5><br/>
					<a class="btn btn-success btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/D2.jpg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">Rujuta Diwekar</h4>
					<h5 class="card-text text-muted">India's leading nutrition and exercise science expert, Rujuta Diwekar is a vocal champion of using our common sense and un - complicating the act of eating.</h5><br/>
					<br/>
					<a class="btn btn-warning btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				<div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" src="images/D3.jpg" alt="">
				<div class="card-block">
					<h4 class="card-title text-muted">Anjali Mukerjee</h4>
					<h5 class="card-text text-muted">She is the “official nutritionist” to the Miss India contestants. She started her clinical practice in 1984 and is an alumnus of the Institute of Hotel Management, Catering Technology & Applied Nutrition, Mumbai. She also has a degree in clinical nutrition from the American Academy of Nutrition.</h5>
					<br/>
					<a class="btn btn-danger btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				</div><br/><br/><br/>

		<nav>
		<ul class="pagination bg-outline-success justify-content-center">
		<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
		<li class="page-item active"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
	</div>
</div>

<!-- Yoga -->

<div id="Osteopath" class="collapse">
	<div class="card card-block card-warning text-white py-5">
		<h2>Yoga with Andriene</h2>
		<p class="lead">Ease into your 30 day experience with an open mind, kindness and curiosity.</p>
	</div>

	<div class="card bg-faded card-block p-5">
	<div class="card-columns justify-content-between">

				<div id="frame1" class="card" style="width: 26rem; height: 28rem">
				<iframe style="width: 100%; height: 75%" src="https://www.youtube.com/embed/oBu-pQG6sTY"></iframe>
				<div class="card-block">
					<h4 class="card-title text-muted">Day 1 - Ease Into It</h4>
				</div>
				</div>
				<br/>
				<div id="frame2" class="card" style="width: 26rem; height: 28rem">
				<iframe style="width: 100%; height: 75%" src="https://www.youtube.com/embed/TB2ISQZ5Mb0"></iframe>
				<div class="card-block">
					<h4 class="card-title text-muted">Day 2 - Stretch & Soothe</h4>
				</div>
				</div>

				</div><br/><br/><br/>

		<nav>
		<ul class="pagination bg-outline-success justify-content-center">
		<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
		<li class="page-item active"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
	</div>
</div>

<!-- Chiroprator -->

<div id="Chiroprator" class="collapse">
	<div class="card card-block card-danger text-white py-5">
		<h2>Chiropractor</h2>
		<p class="lead">Chiropractic is a form of alternative medicine mostly concerned with the diagnosis and treatment of mechanical disorders of the musculoskeletal system, especially the spine</p>
	</div>

	<div class="card bg-faded card-block p-5">
	<div class="card-columns">
	
	          <div class="card" style="width: 20rem">
				<img class="card-img-top img-fluid" height="70px" src="images/C1.jpg" alt="">
				<div class="card-block text-muted">
					<h4 class="card-title">Dr. David Russ</h4>
					<h5 class="card-text">Hi there! I'm Dr. David Russ, and I practice chiropractic and neuromuscular therapy in Portland, Oregon..</h5><br/>
					<a class="btn btn-danger btn-lg btn-block" href="#">Consult</a>
				</div>
				</div>

				<div id="video" class="card" style="width: 35rem; height: 31rem">
				<iframe style="width: 100%; height: 75%" src="https://www.youtube.com/embed/WUutbnF8QFc"></iframe>
				<div class="card-block">
					<h4 class="card-title text-muted">Chiropractic Neck & Shoulder Adjustment</h4>
				</div>
				</div>

				</div>
				</div>
	</div>


<footer id="main-footer" class="p-5 bg-inverse text-white">
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-outline-secondary"><i class="fa fa-cloud-download"><small class="small"> Terms and Conditions</small></i></a>
		</div>
	</div>
</footer>
</div>


<script src="https://code.jquery-3.2.1.min.js" ></script>

<script>
	$('.port-item').click(function(){
		$('.collapse').collapse('hide');
	})
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>
