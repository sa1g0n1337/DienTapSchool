<?php

include("config.php");
session_start();
$error = "";
if (isset($login_session)) {
    header("location:index.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['fullname']) && !empty($_POST['fullname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone'])) {


            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $sql = "SELECT * FROM users WHERE username = '$username'";

            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // $active = $row['active'];

            $count = mysqli_num_rows($result);


            // If result matched $myusername and $mypassword, table row must be 1 row

            if ($count == 1) {
                $error = "<div class='alert alert-danger' role='alert'>
                <strong>Username is already exist</strong>
              </div>";
            } else {
                $query = "INSERT INTO users (username, password, fullname, email, phone, teacher) VALUES ('$username','$password','$fullname','$email','$phone',false)";
                $result = mysqli_query($db, $query);
                if ($result) {
                    $error = "<div class='alert alert-success' role='alert'>
          <strong>Successfully registered. Please move to <a href='login.php'>login page</a> to login</strong>
           </div>";

                } else {
                    $error = "<div class='alert alert-danger' role='alert'>
          <strong>Error</strong>
          </div>";
                }
            }
        }
    } else {
        $error = "<div class='alert alert-danger' role='alert'>
          <strong>please complete all field</strong>
          </div>";
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
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate=""
                                  action="register.php" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="username"
                                           id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="password"
                                           name="password" required="" autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="fullname"
                                           required="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="email"
                                           required="">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="phone"
                                           required="">
                                </div>
                                <?php echo $error; ?>
                                <a class="float-left" href="login.php">Login</a>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin"
                                        value="register">Register
                                </button>
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