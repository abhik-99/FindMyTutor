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
            <div class="col-md-5 login-sec">
		    <h2 class="text-center">Student Sign Up</h2>
		    <form class="login-form" onsubmit="return validateForm()" action="PostClickS.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="InputFullName" class="text-uppercase">Enter the Name* :</label>
                <input type="text" class="form-control" placeholder="Enter name" name="Name" id="Name">            
            </div>

            <div class="form-group">
                <label for="InputEmail1" class="text-uppercase">Enter valid email* :</label>
                 <input type="email" class="form-control" placeholder="Enter valid Email" name="Email" id="Email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" class="text-uppercase">Password* :</label>
                <input type="password" class="form-control" placeholder="Choose a Strong Password" name="Pass" id="Pass">
            </div>

            <div class="form-group">
                <label for="InputNumber" class="text-uppercase">Choose a Profile Picture* :</label>
                <input type="file" class="form-control"  name="userimage">        
            </div>

            <div class="form-group">
                <label for="InputNumber" class="text-uppercase">Enter phone number* :</label>
                <input type="text" class="form-control" placeholder="A number where teachers can reach you" name="Phone1" id="Phone1">        
            </div>

            <div class="form-group">
                <label for="InputNumber" class="text-uppercase">Enter an Alternate phone number :</label>
                <input type="text" class="form-control" placeholder="Optional" name="Phone2">        
            </div>

            <div class="form-group">
                <label for="InputAddress" class="text-uppercase">Enter the address* :</label>
                <textarea rows="5%" cols="50%"  placeholder="Please Enter a Valid Address" name="Address" id="Address"></textarea>
            </div>
            
            <div class="form-group">
                <label for="StudentPreference:" class="text-uppercase">Select yor class* : </label>
                <select name="Standard" id="std">
                        <option value="unselected">Select Standard</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
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
  var std=document.getElementById("std").value;
  

  if(name=="" || email=="" || pass=="" || ph1=="" || addr=="" || std=="unselected"){
  document.getElementById("for_Error").innerHTML="Please Make Sure that You Have Selected the Fields Marked with a *";
  return false;
  }
  else{
    return true;
  }

}
</script>
	

    </main>
    <div id="for_Error"></div>
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
