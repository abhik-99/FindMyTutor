<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>FindMyTutor-Sign Up</title>

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
        <a class="nav-item nav-link" href="contactus.php">Contact Us</a>
      </div>
    </div>
  </nav>
    </header>

    <main role="main">

      <section class="login-block">
      
    <div class="container">
	<div class="row">
  
            <div class="col-md-4 login-sec">
		    <h2 class="text-center">Teacher's Sign Up</h2>
		    <form class="login-form"  onsubmit="return validateForm()" action="PostClickT.php" method="POST" enctype="multipart/form-data">
          
            <div class="form-group">
                <label for="InputFullName" class="text-uppercase">Enter the Name* :</label>
                <input type="text" class="form-control" placeholder="Enter name" id="Name" name="Name">
            </div>
            <div class="form-group">
                <label for="InputEmail1" class="text-uppercase">Enter valid email* :</label>
                 <input type="email" class="form-control" placeholder="Enter Email" id="Email" name="Email">
                 </div>

            <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase">Password* :</label>
                <input type="password" class="form-control" placeholder="Choose a Strong Password" id="Pass" name="Pass">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase">Upload Profile Picture* :</label>
                <input type="file" class="form-control" id="userimage" name="userimage">
            </div>

            <div class="form-group">
                <label for="InputNumber" class="text-uppercase">Enter phone number* :</label>
                <input type="text" class="form-control" placeholder="Give a Phone Number" id="Phone1" name="Phone1">
        
            </div>
            <div class="form-group">
                <label for="InputNumber" class="text-uppercase">Enter alternate phone number :</label>
                <input type="text" class="form-control" placeholder="Give a Phone Number" id="Phone2" name="Phone2">
        
            </div>

            <div class="form-group">
                <label for="InputAddress" class="text-uppercase">Enter the address* :</label>
                <textarea rows="5%" cols="50%" id="Address" placeholder="Please Enter a Valid Address" name="Address"></textarea>
            </div>

        
        <div class="form-group">
       <label for="Education" class="text-uppercase">Enter your highest level of education* :</label>
       <br>
       <input type="radio" class="Education" value="Upto Class 8" name="Education">Upto Class 8
        <input type="radio" class="Education" value="Upto Class 10" name="Education">Secondary Board
        <input type="radio" class="Education" value="Upto Class 12" name="Education">Higher Secondary
        <br>
        <input type="radio" class="Education" value="Bachelor" name="Education">Bachelor's Degree (B.Tech, B.Com, B.E)
        <input type="radio" class="Education" value="Masters" name="Education">Master's Degree (M.Tech, M.Com, M.E)
        <input type="radio" class="Education" value="PHD" name="education">Post-Doctorate
       </div>
    
       <div class="form-group">
            <label for="InputSubject" class="text-uppercase">Subjects that you can teach* :</label><br>
            <input type="checkbox" class="subjects" name="Subjects[]" value="None" checked> None<br> 
            <input type="checkbox" class="subjects" name="Subjects[]" value="Maths"> Mathematics 
            <input type="checkbox" class="subjects" name="Subjects[]" value="Physics"> Physics
            <input type="checkbox" class="subjects" name="Subjects[]" value="Chemistry"> Chemistry
            <input type="checkbox" class="subjects" name="Subjects[]" value="Biology"> Biology
            <br>
            <input type="checkbox" class="subjects" name="Subjects[]" value="English"> English
            <input type="checkbox" class="subjects" name="Subjects[]" value="History & Civics"> History & Civics
            <input type="checkbox" class="subjects" name="Subjects[]" value="Geography"> Geography
            <input type="checkbox" class="subjects" name="Subjects[]" value="All"> All   
        </div> 
    
        <div class="form-group">
                <label for="StudentPreference:" class="text-uppercase">Select classes that you would like to teach: </label>
                <select id="std" name="Standard">
                        <option value="unselected">Select Standard</option>
                        <option value="Less than 1">Less than Standard 1</option>
                        <option value="1-5"> Standard 1 to 5</option>
                        <option value="5-8">Standard 5 to 8</option>
                        <option value="8-10">Standard 8 to 10</option>
                  </select>
        </div>
        
                
         <div class="form-check">
            <button type="submit" class="btn btn-login float-right">Get Started!</button>
             </div>
    
    
    </div>
</form>

<script>
function validateForm(){
  var name=document.getElementById("Name").value;
  var email=document.getElementById("Email").value;
  var pass=document.getElementById("Pass").value;
  var ph1=document.getElementById("Phone1").value;
  var addr=document.getElementById("Address").value;
  var sub=document.querySelector(".subjects:checked").value.length;
  var std=document.getElementById("std").value;
  if(name=="" || email=="" || pass=="" || ph1=="" || addr=="" || sub==4 || std=="unselected"){
  document.getElementById("for_Error").innerHTML="Please Make Sure that You Have Selected the Fields Marked with a *";
  return false;
  }
  else{
    return true;
  }

}
</script>
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
<div id="for_Error"></div>
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
