<?php 
    session_start();

    ?>
<!DOCTYPE html>
<html>
<?php $title="Bloodbank | About page"; ?>
<?php require 'head.php'; ?>
<head>
	<title></title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Blood Bank Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Login/Register<span class="sr-only">(current)</span></a>
        
      </li>
     
    </ul>

  </div>
</nav>

<div class="jumbotron">
  <h1>Blood Bank</h1>
  <p>Blood Bank takes in blood doners and gives it out to recipients.</p>
</div>

<section class="my-5">
	<div class="py-5">
		<h2 class="text-center">About Us</h2>
    <p class="py-3">  Blood bank is a place where blood bag that is collected from blood donation events is stored in one place. 
      The term “Blood Bank” refers to a division of a hospital laboratory where the storage of blood product occurs and where proper testing is performed to reduce the risk of transfusion related events .
       The process of managing the blood bag that is received from the blood donation events needs a proper and systematic management. 
       The blood bag must be handled with care and treated thoroughly as it is related to someone’s life. 
       The development of Web-based <b> Blood Bank Management System (BBMS)</b> is proposed to provide a management functional to the blood bank in order to handle the blood bag and to make entries of the individuals who want to donate blood and who are in need.</p>
    
  </div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<img src="image/about1.png" class="img-fluid aboutimg">
			</div>
			<div class="col-lg-6 col-md-6 col-12">
			<h2>BLOOD - "I'm here to save you!"</h2>
			<p class="py-3">We believe Every life counts!, Every life matters. Time is the thing we have and don't. Our goal is to make blood available in less time and save your precious life!</p>
			<a href="about.php"> </a> 
			</div>
		</div>
	</div>
</section>
<?php require 'footer.php'; ?>
</body>
</html>