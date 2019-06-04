<!doctype html>
<?php
session_start();
if(isset($_POST["discontinue"])){
  $name3=$_POST["teacher"];
  $conn=mysqli_connect("localhost","root","","findmytutor");
  $query5="delete from teacher_student where teacher_name='$name3';";
  mysqli_query($conn,$query5);
  ?>
  <script>
  window.location.href="studentDashboard.php";
  </script>
  <?php
}

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
        <a class="nav-item nav-link" href="contactus.php">Contact Us</a>
        
      </div>
    </div>
  </nav>
    </header>

    <main role="main">

            <body class="bg-light">

                    <div class="container">
                      <div class="py-5 text-center">
                        
                        <?php                        
                        $conn=mysqli_connect("localhost","root","","findmytutor") or die(" Connection to teacher_student table Unsuccessful!");
                        $semail=$_SESSION['semail'];                        
                        $query3="select * from student_info where email='$semail';";
                        $return3=mysqli_query($conn,$query3);
                        $row=mysqli_fetch_assoc($return3);
                        $sname=$row['name'];
                        $sph1=$row['phone1'];
                        $sph2=$row['phone2'];
                        $saddress=$row['address'];
                        $sstd=$row['standard'];
                        $img=$row['image'];
                        ?>

                        <img class="d-block mx-auto mb-4" src="<?php echo $img;?>" alt=" Your Profile Pic" width="72" height="72">
                        <h2><?php echo $sname;?></h2> 
                        <form action="logout.php" method="POST">
                         <button type="submit" class="btn btn-login float-right">Logout</button>
                         </form>
                     </div>
                     <hr>
                        <div class="col-md-8 order-md-1">
                          <h4 class="mb-3">Your Info : </h4>
                           <br>
                           Name: <?php echo $sname;?>
                           <br>
                           Standard: <?php echo $sstd;?>
                           <br>
                           Phone Number: <?php echo $sph1;?>
                           <br>
                           Alternate Phone Number:<?php echo $sph2;?>
                           <br>
                           Email:<?php echo $semail;?>
                           <br>
                           Address:<?php echo $saddress;?>
                           <br>

                        </div>
                        <hr>
                        <h3>Currently Teaching You : </h3>
                        <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Phone Number</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $conn=mysqli_connect("localhost","root","","findmytutor") or die(" Connection to teacher_student table Unsuccessful!");
                                  $sname=$_SESSION['sname'];
                                  $query1="select teacher_name from teacher_student where student_name='$sname';";
                                  $returnedT=mysqli_query($conn,$query1);
                                  while($result=mysqli_fetch_assoc($returnedT)){
                                    $tname=$result['teacher_name'];
                                    $query2="select email,phone1,image from teacher_info where name='$tname';";
                                    $return2=mysqli_query($conn,$query2);
                                    $row=mysqli_fetch_assoc($return2);
                                    
                                    $phone=$row['phone1'];
                                    $im=$row['image'];       
                                    ?>
                                    <tr>
                                      <td><?php echo $tname?></td>                                      
                                      <td><?php echo $phone?></td>
                                      <td><img src="<?php echo $im?>"></td>
                                      <td> 
                                      <form method="POST">
                                      <input type="hidden" name="teacher" value="<?php echo $tname;?>">
                                      <input type="submit" class="btn btn-login float-center" name="discontinue" value="Discontinue">
                                     </form>
                                     </td>                                   
                                    </tr>
                                    <?php
                                  }
                                  ?>
                                    <tr>
                                      <td>1,001</td>
                                      <td>Lorem</td>
                                      <td>ipsum</td>
                                      <td>dolor</td>
                                      <td>sit</td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                            
                             
                       <form action="BrowserTeacher.php" method="POST">     
                      <button type="submit" class="btn btn-login float-right">Browse teachers!</button>
                       </form>     
                        <br>
                        


                      </div>
                      
                
                      <footer class="my-5 pt-5 text-muted text-center text-small">
                        <p class="mb-1">© 2017-2018 Company Name</p>
                        <ul class="list-inline">
                          <li class="list-inline-item"><a href="#">Privacy</a></li>
                          <li class="list-inline-item"><a href="#">Terms</a></li>
                          <li class="list-inline-item"><a href="#">Support</a></li>
                        </ul>
                      </footer>
                    </div>
                
                    <!-- Bootstrap core JavaScript
                    ================================================== -->
                    <!-- Placed at the end of the document so the pages load faster -->
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
                    <script src="../../assets/js/vendor/popper.min.js"></script>
                    <script src="../../dist/js/bootstrap.min.js"></script>
                    <script src="../../assets/js/vendor/holder.min.js"></script>
                    <script>
                      // Example starter JavaScript for disabling form submissions if there are invalid fields
                      (function() {
                        'use strict';
                
                        window.addEventListener('load', function() {
                          // Fetch all the forms we want to apply custom Bootstrap validation styles to
                          var forms = document.getElementsByClassName('needs-validation');
                
                          // Loop over them and prevent submission
                          var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                              if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                              }
                              form.classList.add('was-validated');
                            }, false);
                          });
                        }, false);
                      })();
                    </script>
                  
                
                </body>
    </main>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
