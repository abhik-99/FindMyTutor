<?php
session_start();
$sname=$_POST['acceptS'];
$tname=$_SESSION["tname"];
$conn=mysqli_connect("localhost","root","","findmytutor");
$query1="insert into teacher_student(teacher_name,student_name) values('$tname','$sname');";
$query2="delete from applications where sname like '$sname' and tname like '$tname';";
mysqli_query($conn,$query1);
mysqli_query($conn,$query2);
?>
<script>
window.location.href="TeacherDashboard.php";
</script>