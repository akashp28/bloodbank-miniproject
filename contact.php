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
<?php
require 'file/connection.php';
if(isset($_POST["send"])){
  $name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$message=$_POST['msg'];
// $conn=mysqli_connect("localhost","root","","bloodbank") or die("Connection error");
$sql= "insert into usermsg (uname,uemail,unumber,umsg) values('$name','$email','$number','$message')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
  echo '<div class="alert alert-success alert_dismissible"><b><button type="button" class="close" data-dismiss="alert">&times;</button></b><b>Message Sent, We will contact you shortly. </b></div>';
}?>

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
  <h1>Anytime!</h1>
  <p>We are always here to help you!</p>
</div>

<section class="my-5">
  <div class="py-5">
    <h2 class="text-center">Contact Us</h2>
    <center><div> <b> ADMIN : admin@bbms.com <br>  +919990009999 </b> </center>
    </div>
  </div>
  <div class="col-lg-8 mb-4">
        <h3>Send us your Feedback and Queries</h3>

        <form name="feedback"  method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Full Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Mobile Number<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Email Id</div>
<div><input type="email" name="emailid" class="form-control"></div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Message / Feedback<span style="color:red">*</span></div>
<div><textarea  class="form-control" name="msg" required></textarea></div></div>
</div>
            <button type="submit" name="send"  class="btn btn-primary">Submit</button>
            </div></form>
    </div>

 
  <a href="contact.php"> </a>
</div>
</section>
<?php require 'footer.php'; ?>
</body>
</html>