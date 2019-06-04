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

    <title>FindMyTutor-Browse Teacher</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/corecss.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
        <a class="nav-item nav-link" href="contactus.php">Contact Us</a>
      </div>
    </div>
  </nav>
    </header>

    <main role="main">
        
                <div class="container">
                  <div>
                        <div class="py-5 text-center">
                          <img class="d-block mx-auto mb-4" src="" alt="" width="72" height="72">
                          <h2>Find Your Tutor !</h2> 
                          <form action="logout.php">
                           <button type="submit" class="btn btn-login float-right" >Logout</button>
                           </form>
                       </div>
                       <form action="BrowserTeacher.php" method="POST">
                       <div class="form-group">
                            <label for="InputSubject" class="text-uppercase">Subjects you want to learn:</label>
                            <br>
                            <input type="checkbox" class="subjects" name="Subjects[]" value="Invalid Subject Choice" checked>None  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="Maths">Mathematics  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="Physics">Physics  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="Chemistry">Chemistry  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="Biology">Biology  
                            <br>
                            <input type="checkbox" class="subjects" name="Subjects[]" value="English">English  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="History & Civics">History & Civics  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="Geography">Geography  
                            <input type="checkbox" class="subjects" name="Subjects[]" value="All">All   
                        </div>
                        
                        <div class="form-group">
                                <label for="StudentPreference:" class="text-uppercase">Select the maximum qualification of the teacher: </label>
                                <select name="Qualification">
                                        <option value="Invalid Qualification">Select qualification</option>
                                        <option value="Upto Class 8">Upto class 8</option>
                                        <option value="Upto Class 10"> Secondary board</option>
                                        <option value="Upto Class 12">Higher secoondary</option>
                                        <option value="Bachelor">Bachelor's Degree</option>
                                        <option value="Masters">Master's Degree</option>
                                        <option value="PHD">Postgrad Degree</option>
                                        <option value="*">All Apply</option>
                                  </select>
                        </div>
                        <button type="submit" class="btn btn-login float-center" name="Submit">Go!</button>
                        </form>
                        <br>
                        <br>
                        </div>
                </div>
                <div class="container" name="results">

                <?php
                if(isset($_POST['Submit'])){
                echo "Results Here!<br>";
                $qualify=$_POST['Qualification'];
                $subjects=$_POST['Subjects'];
                $count=1;
                if($qualify=="Invalid Qualification" || $subjects[0]=="Invalid Subject Choice"){
                  echo "Invalid Choice!";
                  die;
                }

                ?>
                <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Picture</th>
                                      <th>View Profile</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  foreach($subjects as $subject){
                                    $conn=mysqli_connect("localhost","root","","findmytutor") or die("Connection Unsuccessful!");
                                    $query1="select email from subject_teacher where subject='$subject';";
                                    $return1=mysqli_query($conn,$query1);
                                    while($row1=mysqli_fetch_assoc($return1)){
                                    $email=$row1['email'];
                                    if($qualify=="*"){
                                      $query2="select name,image from teacher_info where email like '$email';";

                                    }else{
                                    $query2="select name,image from teacher_info where email like '$email' and education like '$qualify';";
                                  }
                                    $return2=mysqli_query($conn,$query2);
                                    while($row2=mysqli_fetch_assoc($return2)){
                                      $name2=$row2['name'];
                                      $imgD=$row2['image'];
                                      ?>
                                  <tr>
                                      <td><?php echo $count;?></td>
                                      <td><?php echo $name2;?></td>
                                      <td><img src="<?php echo $imgD;?>" alt="Teacher Pic" height="80" width="80"></td>
                                      <td>
                                      <form action="midprofile.php" method="POST"> 
                                      <input type="hidden" name="pname" value="<?php echo $name2;?>" >                                      
                                      <input type="hidden" name="email" value="<?php echo $email;?>" >                              
                                      <input type="submit" class="btn btn-login float-center" name="GTP" value="Go to Profile">
                                      </form>
                                      </td>
                                      
                                    </tr>
                                    <?php
                                    $count=$count+1;
                                    }
                                   }
                                  }
                                   ?> 
                                  </tbody>
                </table>
                <?php

                }
                

                ?>               
                
                </div>
        

    </main>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
