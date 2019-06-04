<?php
    session_start();
    $arr=$_POST;
    
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $pass=md5($_POST['Pass']);
    $ph1=$_POST['Phone1'];
    $ph2=$_POST['Phone2'];
    $address=$_POST['Address'];
    $std=$_POST['Standard'];

    $image=$_FILES['userimage'];
    
    $iname=$image['name'];
    $temp=$image['tmp_name'];
    $dest="images/".$iname;
    move_uploaded_file($temp,$dest);

    $conn1=mysqli_connect("localhost","root","","findmytutor");

    $query1="insert into student_info(name,email,phone1,phone2,address,standard,image) values('$name','$email','$ph1','$ph2','$address','$std','$dest');";
    $query2="select * from student_info where name like '$name' or email like '$email';";    
    $return=mysqli_query($conn1,$query2);
    $r=mysqli_num_rows($return);
    if($r==0){
    mysqli_query($conn1,$query1);      
    $query3="insert into user_info(email,password,who) values('$email','$pass','Student');";
    mysqli_query($conn1,$query3);
    
    $_SESSION['sname']=$name;
    $_SESSION['semail']=$email;
    echo "You have Been Successfully Registered.<br>Please Wait while we redirect you to Your DashBoard.<br>Do Not Press Any Button!";   
    
  }
  else{
    echo "<center>Your Name/Email is registered with the system. Please Sign In from the Login Page.<br>Redirecting... Do not Press Any Button!</center><hr>";
?>
<script>
     function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
sleep(5000).then(() => {
        window.location.href="login.php";
    });
    </script>  
<?php

  }

    
?>
     <script>
     function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
sleep(5000).then(() => {
        window.location.href="studentDashboard.php";
    });
    </script>  