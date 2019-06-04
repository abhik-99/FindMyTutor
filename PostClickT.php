<?php
    session_start();
    $arr=$_POST;
    
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $pass=md5($_POST['Pass']);
    $ph1=$_POST['Phone1'];
    $ph2=$_POST['Phone2'];
    $address=$_POST['Address'];
    $education=$_POST['Education'];
    $subjects=$_POST['Subjects'];
    if(in_array('All',$subjects)){
        $subjects=array("All");
    }
    $std=$_POST['Standard'];
    $image=$_FILES['userimage'];
    
    $iname=$image['name'];
    $temp=$image['tmp_name'];
    $dest="images/".$iname;
    move_uploaded_file($temp,$dest);

    $conn1=mysqli_connect("localhost","root","","findmytutor") or die("Connection to DataBase Unsuccessful!");
    $query4="select * from teacher_info where name like '$name' or email like '$email';";
    $returned2=mysqli_query($conn1,$query4);
    $r=mysqli_num_rows($returned2);
    if($r==0){    
    $query1="insert into teacher_info(name,email,phone1,phone2,address,education,standard,image) values('$name','$email','$ph1','$ph2','$address','$education','$std','$dest');";
    mysqli_query($conn1,$query1);
    foreach($subjects as $subject){
          $query2="insert into subject_teacher(subject,email) values('$subject','$email');";
          mysqli_query($conn1,$query2);
      }
      $query3="insert into user_info(email,password,who) values('$email','$pass','Teacher');";
      mysqli_query($conn1,$query3);
    
    
    $_SESSION['tname']=$name;
    $_SESSION['temail']=$email;
    echo "You have Been Successfully Registered.<br>Please Wait while we redirect you to Your DashBoard.<br>Do Not Press Any Button!";
}
    else{
        echo "Your Name/Email is already registered, Sign In from the Login Page!<br><hr>Redirecting...";
        
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
        window.location.href="login.php";
    });
    </script>
    
