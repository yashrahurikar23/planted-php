<?php
 include'header.php';
 include'lib/connection.php';

 $sql = "SELECT * FROM product";
 $result = $conn -> query ($sql);

 if(isset($_POST['add_to_cart'])){

if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']!=1)
   {
       header("location:login.php");
   }
}
else
{
   header("location:login.php");
}
  $user_id=$_POST['user_id'];;
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_id = $_POST['product_id'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_id'  && userid='$user_id'");

  if(mysqli_num_rows($select_cart) > 0){
    echo $message[] = 'product already added to cart';

  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price) VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price')");
   echo $message[] = 'product added to cart succesfully';
   header('location:index.php');
  }

}

?>



<!--banner start-->
<div class="banner">
<div class="container-fluid">
  <div class="row landing-banner">
    <div class="col-md-6">
        <div class="banner-text">
          <p class="bt1">Welcome To Planted</p>
          <p class="bt4">Welcome to Green Haven: Where Nature Meets Home! Explore our lush selection of plants to bring life and serenity into your space. Shop now and cultivate your personal oasis!</p>
        </div>
    </div>
    <div class="col-md-6">
    </div>
  </div>
</div>
</div>

<!--banner end-->


<!---top sell start---->

<section>
  <div style="background-color: #D8FFD8;">
    <div class="container">
      <div class="row bg-white">
        <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-md-4">
                <form class="m-2 card"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                      <img src="img/<?php echo $row['imgname']; ?>" >
                    <div>
                      <div>
                        <div class="d-flex flex-column p-2">
                          <div class="p-2 d-flex justify-content-between align-items-center">
                            <h6><?php echo $row["name"] ?></h6> 
                            <span><?php echo $row["Price"] ?></span> 
                          </div>
                          <input type="submit" class="btn btn btn-success" value="Add to cart" name="add_to_cart">
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'];?>" >
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"> 
                        <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['Price']; ?>">              
                      </div>
                    </div>
                </form>
              </div>
            <?php 
          }
          } 
            else 
            echo "0 results";
        ?>
      </div>
    </div>
  </div>
</section>


<!---top sell end---->


<!---logo start--->

<!-- <div class="logo5">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
  
      </div>
      <div class="col-md-2 text-center">
        <img src="img/logo1.png">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/logo2.png">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/logo3.png">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/logo4.png">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/logo5.png">
      </div>
      <div class="col-md-1">
  
      </div>
    </div>
  </div>
</div> -->



<!---logo end--->

<!---welcome start--->

<div class="welcome">
  <!-- <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <span class="welcometitle">Welcome to Lawyers Pro</span>
        <img src="img/titleful.png">
        <img src="img/titleline.png" class="titleline">

        <div class="row" id="wel1">
          <div class="col-md-2 col-lg-2 col-2">
            <img src="img/w1.png" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">24x7 online free support</h6>
            <p class="wp">There are many variations of passages Lorem Ipsum available<br>
            but they are many variations </p>
          </div>   
        </div>

         <div class="row" id="wel2">
          <div class="col-md-2 col-lg-2 col-2">
            <img src="img/w1.png" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">24x7 online free support</h6>
            <p class="wp">There are many variations of passages Lorem Ipsum available<br>
            but they are many variations </p>
          </div>   
        </div>

        <div class="row" id="wel2">
          <div class="col-md-2 col-lg-2 col-2">
            <img src="img/w1.png" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">24x7 online free support</h6>
            <p class="wp">There are many variations of passages Lorem Ipsum available<br>
            but they are many variations </p>
          </div>   
        </div>

      </div>
      <div class="col-md-12 col-lg-6 col-sm-12">
        <img src="img/comment.png" class="img-fluid">
      </div>
    </div>
  </div>
</div> -->



<!---welcome end--->



<?php
 include'footer.php';
?>

