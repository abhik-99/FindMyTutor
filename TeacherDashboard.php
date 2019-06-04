<?php
session_start();
if(isset($_POST['discontinue'])){
$name3=$_POST["student"];
echo $name3;
$conn=mysqli_connect("localhost","root","","findmytutor");
$query5="delete from teacher_student where student_name='$name3';";
mysqli_query($conn,$query5);?>

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

    <title>FindMyTutor-Teacher Dashboard</title>

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
                      $tname=$_SESSION['tname'];
                      $temail=$_SESSION['temail'];                            
                      $query3="select * from teacher_info where email='$temail';";
                      $query4="select subject from subject_teacher where email='$temail';";
                      $returned2=mysqli_query($conn,$query3);
                      $returned3=mysqli_query($conn,$query4);
                      $row1=mysqli_fetch_assoc($returned2);
                      $tph1=$row1['phone1'];
                      $tph2=$row1['phone2'];
                      $taddress=$row1['address'];
                      $teducation=$row1['education'];
                      $tstd=$row1['standard'];
                      $timage=$row1['image']; 
                      
                      
                      ?>
                        <img class="d-block mx-auto mb-4" src="<?php echo $timage;?>" alt="Your Profile Picture" width="72" height="72">
                        <h2><?php echo $tname;?></h2>
                        <form action="logout.php"> 
                         <button type="submit" class="btn btn-login float-right" >Logout</button>
                         </form>
                     </div>
                     <hr>
                        <div class="col-md-8 order-md-1">
                          <h4 class="mb-3">Your Info : </h4>
                           <br>
                           Name :<?php echo $tname;?>
                           <br>
                           Email :<?php echo $temail;?>
                           <br>
                           Phone Number :<?php echo $tph1;?>
                           <br>
                           Alternate Phone Number :<?php echo $tph2;?>
                           <br>
                           Education :<?php echo $teducation;?>
                           <br>
                           Subjects :<?php while($subRow=mysqli_fetch_assoc($returned3)){ echo ' '.$subRow['subject'];}?>
                           <br>
                           Address :<?php echo $taddress;?>
                           <br>

                            
                        
                        </div>
                        <hr>
                        <h3>Students Currently Under You: </h3>
                        <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                  <thead>
                                    <tr>
                                      <th>Student Name</th>
                                      <th>Email</th>
                                      <th>Phone Number</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
                                   $conn=mysqli_connect("localhost","root","","findmytutor") or die("Connection to teacher_student table Unsuccessfull!");
                                   $tname=$_SESSION['tname'];
                                   $query="select student_name from teacher_student where teacher_name='$tname';";
                                   $returnedT=mysqli_query($conn,$query);

                                   while($row=mysqli_fetch_assoc($returnedT)){
                                     $sname=$row['student_name'];
                                     $query2="select name,email,phone1,image from student_info where name='$sname';";
                                     $return2=mysqli_query($conn,$query2);
                                     $row2=mysqli_fetch_assoc($return2);
                                     $email=$row2['email'];
                                     $phone=$row2['phone1'];
                                     $im=$row2['image'];
                                     ?> 
                                     <tr>
                                     <td><?php echo $sname;?> </td>
                                     <td><?php echo $email;?> </td>
                                     <td><?php echo $phone;?> </td>
                                     <td><img src='<?php echo $im;?>' alt="Student Pic" height="80" width="80"></td>
                                     <td>
                                     <form method="POST">
                                     <input type="hidden" name="student" value="<?php echo $sname;?>">
                                     <input type="submit" class="btn btn-login float-center" name="discontinue" value="Discontinue">
                                     </form>

                                     </td>
                                   </tr>

                                   <?php                                     
                                   }
                                   ?>
                                  </tbody>
                                </table>
                              </div>
                            <hr>
                              <h3>Interested Students : </h3>
                        <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Standard</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                   $conn=mysqli_connect("localhost","root","","findmytutor") or die("Connection to teacher_student table Unsuccessfull!");
                                   $tname=$_SESSION['tname'];
                                   $count=1;
                                   $query="select sname from applications where tname='$tname';";
                                   
                                   $returnedT=mysqli_query($conn,$query);

                                   while($row=mysqli_fetch_assoc($returnedT)){
                                     $sname=$row['sname'];
                                     $query2="select email,image,standard from student_info where name='$sname';";
                                     $return2=mysqli_query($conn,$query2);
                                     $row3=mysqli_fetch_assoc($return2);                                     
                                     $stds=$row3['standard'];                                     
                                     $im=$row3['image'];
                                     $email=$row3['email'];
                                     ?> 
                                     <tr>
                                     <td><?php echo $count;?></td>
                                     <td><?php echo $sname;?> </td>
                                     <td><?php echo $stds;?> </td>
                                     <td><img src='<?php echo $im;?>' alt="Student Pic" height="80" width="80"></td>
                                     <td>
                                     <form action="midprofile.php" method="POST"> 
                                      <input type="hidden" name="pname" value="<?php echo $sname;?>" >                                      
                                      <input type="hidden" name="email" value="<?php echo $email;?>" >                              
                                      <input type="submit" class="btn btn-login float-center" name="GTSP" value="Go to Student Profile">
                                      </form>
                                     </td>
                                   </tr>
                                   <?php
                                   $count=$count+1;                                     
                                   }
                                   ?>                             
                                  </tbody>
                                </table>
                              </div>



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
