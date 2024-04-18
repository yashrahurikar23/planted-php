<?php

include "lib/connection.php";
$result = null;
  if (isset($_POST['u_submit'])) 
  {
    $f_name=$_POST['u_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    $cpass=md5($_POST['c_pass']);

    if ($pass==$cpass) 
    {
         $insertSql = "INSERT INTO users(f_name ,l_name, email, pass) VALUES ('$f_name', '$l_name','$email', '$pass')";

         if ($conn -> query ($insertSql)) 
         {
            $result="Account Open success";
            header("location:login.php");
         }
         else
         {
             die($conn -> error);
         }
    }
    else
    {
      $result="Password Not Match";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fashion</title>
	<meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Anik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif;-->
    <link rel="favicon" type="text/css" href="#favicon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                <?php echo $result;  ?>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="u_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="l_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="c_pass">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="u_submit">Register Account</button>
                            

                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    </div>


</body>

</html>