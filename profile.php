<?php
session_start();
$name=$_SESSION['pname'];
$email=$_SESSION['pemail'];
$as=$_SESSION['as'];
$conn=mysqli_connect("localhost","root","","findmytutor");
if($as=='teacher_info'){
$query="select phone1,image,address,standard from teacher_info where name like '$name' and email like '$email';";
$return=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($return);
$img=$row['image'];
$ph1=$row['phone1'];
$address=$row['address'];
$std=$row['standard'];
}
else{
$query="select phone1,image,address,standard from student_info where name like '$name' and email like '$email';";

$return=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($return);
$img=$row['image'];
$ph1=$row['phone1'];
$address=$row['address'];
$std=$row['standard'];
}
?>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../../../favicon.ico">
  
      <title>FindMyTutor-Profile View</title>
  
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link href="css/css_browserteacher.css" rel="stylesheet">
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
            <a class="nav-item nav-link" href="contactus.php">Contact Us</a>
          </div>
        </div>
      </nav>
        </header>
        <br>

      <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 lead">Profile<hr></div>
                  </div>
                  <div class="row">
              <div class="col-md-4 text-center">
                      <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
                      display:block; margin:auto;" src="<?php echo $img;?>" height="100" width="100">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-12">
                          <h1 class="only-bottom-margin" name="username"><?php echo $name;?></h1>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <span class="text-muted">Email:</span> <?php echo " ".$email;?><br>
                          <span class="text-muted">Phone Number:</span> <?php echo " ".$ph1;?><br>
                          <span class="text-muted"><?php if($as=="teacher_info"){echo "Teaches";}else{echo "Studies In";}?>:</span><?php echo " ".$std;?><br>
                          <span class="text-muted">Address:</span> <?php echo " ".$address;?><br>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <hr><?php
                      if($as=="teacher_info"){
                        ?>
                      <form action="applyToTeacher.php" method="POST">
                      <input type="submit" class="btn btn-default pull-right" value="Apply"><i class="glyphicon glyphicon-pencil"></i> 
                      </form>
                      <?php
                    }
                    else{
                      ?>
                      <form action="acceptStudent.php" method="POST">
                      <input type="hidden" name="acceptS" value="<?php echo $name?>">
                      <input type="submit" class="btn btn-default pull-right" value="Accept Student"><i class="glyphicon glyphicon-pencil"></i> 
                      </form>
                      <?php

                    }
                   
                      ?>
                       
                      <i class="glyphicon glyphicon-pencil"></i> <br>
                      <form action="browserTeacher.php" method="POST">
                      <input type="submit" class="btn btn-default pull-right" value="Back to Results"><i class="glyphicon glyphicon-pencil"></i> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </body>
</html>