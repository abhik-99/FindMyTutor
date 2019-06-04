<?php
session_start();
if(isset($_POST['GTP'])){
$_SESSION['pname']=$_POST['pname'];
$_SESSION['pemail']=$_POST['email'];
$_SESSION['as']='teacher_info';
?>
<script>
window.location.href="profile.php";
</script>
<?php
}
else
{ $_SESSION['pname']=$_POST['pname'];
    $_SESSION['pemail']=$_POST['email'];
    $_SESSION['as']='student_info';
    ?>
    <script>
    window.location.href="profile.php";
    </script>
    <?php

}

?>