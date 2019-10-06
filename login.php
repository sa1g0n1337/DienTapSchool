<?php
    include("config.php");
    session_start();
    if (isset($login_session)) {
     header("location:index.php");
     exit;
    } else {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
       
       $usr = $_POST['username'];
       // echo $usr;
       $pass = $_POST['password'];
       // echo $pass;
       // $myusername = mysqli_real_escape_string($db,$_POST['username']);
       // $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
       
       $sql = "SELECT * FROM users WHERE username = '$usr' and password = '$pass'";//'admin' or '1'='1 -- -'
       // die($sql);
       $result = mysqli_query($db,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       // $active = $row['active'];
       
       $count = mysqli_num_rows($result);
       
       // If result matched $myusername and $mypassword, table row must be 1 row
       
       if($count == 1) {
          $_SESSION["loggedin"] = true;
          $_SESSION["user"] = $row['username'];
          $_SESSION["teacher"] = $row['teacher'];
          
          header("location:index.php?page=home");
       }else {
          $error = "Your Login Name or Password is invalid";
       }
    }
    }   
    ?>
<html>
    <head>
        <title>Ninja school</title>
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <link rel="stylesheet" href="public/fontawesome/css/all.css" type="text/css">
    </head>
    <body class="bg-dark">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white mb-4">Ninja school</h2>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <!-- form card login -->
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h3 class="mb-0">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                        <div class="form-group">
                                            <label for="uname1">Username</label>
                                            <input type="text" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" required="" autocomplete="new-password">
                                        </div>
                                        <!-- <div class="form-group"> -->
                                          <a class="float-left" href="register.php">Register</a>
                                            <!-- </div> -->
                                        <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                                    </form>
                                </div>
                                <!--/card-block-->
                            </div>
                            <!-- /form card login -->
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </body>
</html>