<?php
    include('config.php');
    session_start();
    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
         $user_check = $_SESSION['user'];
    
     $ses_sql = mysqli_query($db,"select username, teacher from users where username = '$user_check' ");
     
     $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
     
     $login_session = $row['username'];
     $teacher = $row['teacher'];
    } else {
         header('location:login.php');
    }
?>