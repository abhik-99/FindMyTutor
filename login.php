<!doctype html>
<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>FindMyTutor-Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/custom_login.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>

  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="localhost">Find my Tutor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="aboutus.php">About Us</a>
        <a class="nav-item nav-link" href="contact.us">Contact Us</a>
      </div>
    </div>
  </nav>
    </header>

    <main role="main">

      <section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
<form class="login-form" action="login.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Email ID</label>
    <input type="text" class="form-control" placeholder="Enter Your Email ID" name="Email">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" class="form-control" placeholder="Enter Your Password" name="Password">
  </div>

  <div class="form-group">
    <label for="Sign in as:" class="text-uppercase">Sign in/ Sign Up as: </label>
    <select id="Sign_in_as" name="Sign_in_as">
    <option value="Teacher">Teacher</option>
    <option value="Student">Student</option>
    </select>
</div>

    <div class="form-check">
    <button type="submit" class="btn btn-login float-right" name="Submit">Submit</button>
  </div>

</form>
<div id='for_error' ></div>
<div class="copy-text">Don't have an account? <i class="fa fa-heart"></i> <a href="javascript:void(0)" onclick="validateSignUp()">Sign up instead!</a></div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
            <img class="d-block img-fluid" src="images/Carousel_1.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
           <div class="banner-text">
            <h2>Educare</h2>
            <p>Because we care about you!</p>

            </div>
          </div>
        </div>
      <div class="carousel-item">
      <img class="d-block img-fluid" src="images/Carousel_2.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Educare</h2>
            <p>Because we know whats right for you!</p>
        </div>
    </div>
    </div>
    </div>

		</div>
	</div>
</div>

<script>
  function validateSignUp(){
    var w=document.getElementById("Sign_in_as").value;
    if(w=="Teacher"){
      window.location.href="teachersignup.php";
    }
    else{
      window.location.href="studentsignup.php";
    }
   // alert(w);
  }
  </script>
</section>


    </main>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  
  </body>
</html>
<?php
if(isset($_POST['Submit'])){
$sign_in_as=$_POST['Sign_in_as'];
$email=$_POST['Email'];
$pass=md5($_POST['Password']);
$conn=mysqli_connect("localhost","root","","findmytutor") or die("Cannot Connect Successfully!");
$query="select password from user_info where email='$email' and who='$sign_in_as'; ";
$returned=mysqli_query($conn,$query);
$rpass=mysqli_fetch_assoc($returned)['password'];
if($rpass==$pass){
  ?>
  <script>
  document.getElementById('for_error').innerHTML="";
  </script>
  <?php
  if($sign_in_as=="Teacher"){
    $query2="select name from teacher_info where email='$email';";
    $returned2=mysqli_query($conn,$query2);
    $tname=mysqli_fetch_assoc($returned2)['name'];
    $_SESSION['tname']=$tname;
    $_SESSION['temail']=$email;
    ?><script>
    window.location.href="TeacherDashboard.php";
    </script>
    <?php
    
  }
  else{
    $query2="select name from student_info where email='$email';";
    $returned2=mysqli_query($conn,$query2);
    $tname=mysqli_fetch_assoc($returned)['name'];
    $_SESSION['sname']=$tname;
    $_SESSION['semail']=$email;
?><script>
window.location.href='studentDashboard.php';
</script>
<?php



  }
}
else{
  ?>
  <script>
  document.getElementById('for_error').innerHTML="Invalid Email ID and Password !";
  </script>
  <?php

}

}

?>
