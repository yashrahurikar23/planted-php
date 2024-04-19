<!DOCTYPE html>
<html>
<head>
	<title>Planted</title>
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

<body>
<?php 
  SESSION_START();
  include "lib/connection.php";
  $id=$_SESSION['userid'];
 $sql = "SELECT * FROM cart where userid='$id'";
 $result = $conn -> query ($sql);
?>
<!--nav start--->
<nav class="navbar navbar-expand-lg " style="background: #05472A;">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="d-flex flex-row align-items-center mr-4">
        <a href=""><img src="img/brand.png" class='mr-2 rounded' style="height: 48px; width: 48px;"></a>
        <h5 class="m-0 ml-4 text-white">Planted</h5>
      </div>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link bg-white rounded ml-4" style="color: #19A519;" href="index.php">Home</a>
        </li>
      </ul>
        <?php
          $total=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $total++;
            }
          }
              ?>
        <a href="cart(1).php" class='mx-2 bg-white rounded p-2 d-flex align-items-center' style="color: #19A519;text-decoration:none"><img src="img/cart.png" class="mr-2"><?php echo $total?></a>
        <?php 
        if(isset($_SESSION['auth']))
          {
            if($_SESSION['auth']==1)
            {
              // echo $_SESSION['username']; ?>
              <a href="profile.php" class='mx-2 bg-white rounded p-2' style="color: #19A519;text-decoration:none">Orders</a>
              <a href="logout.php" class='mx-2 bg-white rounded p-2' style="color: #19A519;text-decoration:none">Logout</a>
          <?php
            }
          }
        else
          {
          ?>
            <a href="login.php" class='mx-2 bg-white rounded p-2' style="color: #19A519;text-decoration:none">Login</a>
            <a href="register.php" class='mx-2 bg-white rounded p-2' style="color: #19A519;text-decoration:none">Signup</a>
          <?php
          }
        ?>
    </div>
  </div>
</nav>

<!--nav end--->