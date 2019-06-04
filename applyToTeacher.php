<?php
session_start();
$student=$_SESSION['sname'];
$teacher=$_SESSION['pname'];
$conn=mysqli_connect("localhost","root","","findmytutor");
$query="insert into applications(sname,tname) values('$student','$teacher');";
mysqli_query($conn,$query);
?>
<script>
window.location.href="studentDashboard.php";
</script>