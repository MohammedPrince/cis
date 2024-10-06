<?php
include("include/functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:00:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <title>Certificat Information System</title>

    <link rel="icon"
        type="image"
        href="include/dist/img/fu.png">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet"
        href="include/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet"
        href="include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet"
        href="include/dist/css/adminlte.min2167.css?v=3.2.0">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake"
            src="include/dist/img/fu.png"
            alt="Future University Logo"
            height="250"
            width="250">
    </div>

</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <?php
      if(isset($_POST['submit'])){
        $username =   mysqli_real_escape_string($conn, $_POST['username']);
        $password =  mysqli_real_escape_string($conn,$_POST['password']);

        $login = Login($username,$password);

         if($login==1){
            echo $alert = alerts(4,"Invalid Username or Password!");
        }
    
      }
      
    ?>


        <form action="index.php"
            method="POST">

            <div class="card card-outline card-primary">
                <span class="input-group-icon text-center"><img src="include/dist/img/fu.png"
                        width="65"
                        height="65"
                        alt=""></span>
                <div class="card-header text-center">
                    <a href="#"
                        class="h5">Certificat Information System</a>
                    <?php 
                // if(isset($_SESSION["user_id"])){

                //     echo $_SESSION["user_id"];
                // }
                
                ?>
                </div>

                <div class="card-body ">

                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <input type="text"
                                name="username"
                                required
                                class="form-control"
                                placeholder="Username">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password"
                            name="password"
                            placeholder="Password"
                            class="form-control"
                            id="exampleInputPassword1">

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                name="submit"
                                class="btn btn-primary btn-block">Log In</button>
                        </div>
                    </div>

        </form>

        <br>
        <!-- <p class="mb-1"><a href="forgot_password.php">I forgot my password</a></p> -->

        <script src="include/plugins/jquery/jquery.min.js"></script>

        <script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="include/dist/js/adminlte.min2167.js?v=3.2.0"></script>
</body>

</html>