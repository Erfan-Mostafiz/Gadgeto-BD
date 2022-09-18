<?php require_once("config.php"); ?>
<?php include("header.php"); ?>
  <?php 
  if (isset($_SESSION["authen"])){
    if ($_SESSION["authen"] || $_SESSION["admin"]){
        $email = $_SESSION["reg_email"];
  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Gadgeto BD | Delivery Info</title>
</head>
<body>
    <?php if ($_SESSION["authen"] || $_SESSION["admin"]){ ?>
    <h3 style="margin-top: 10px;color: #dc3545;font-size:25px;">We will contact with you soon in this email: <span style="color: #007bff;"><?php $email = $_SESSION["reg_email"]; echo "<br>".$email; ?></span></h3>
   


<?php
    
    if(isset($_POST["checkout"])){
        $total = $_POST["total"];
        date_default_timezone_set("Asia/Dhaka");
        $today = date("h:i:a  |  d-m-Y");
        $user = $_SESSION["username"];
        $d_id = $user . $today;
        $d_id = md5($d_id);
        $email = $_SESSION["reg_email"];

?>
        <div class="container">
            <div class="table-responsive shadow p-3 mb-5 bg-white rounded" style="margin-bottom: 20px;"> 
                <table class="table table-bordered">
                    <tr>
                        <th><p style="font-weight: 900;">Delivery No.: <span style="color: red;"><?php echo $d_id; ?></span></p></th>
                        <th colspan="2"></th>
                        
                        <th>Price</th>
                    </tr>


<?php
        

                


                $sql = "INSERT INTO orders (d_id, email, p_date, total)
                            VALUES ('$d_id', '$email', '$today', '$total') ";
                mysqli_query($con,$sql);

               
        }
        unset($_SESSION["shopping_cart"]); //clearing cart
        $_SESSION["cart_no"] = 0;
    

    
    }
else {
  ?>
  <h1 style="margin-top: 200px;color: red;text-align: center;"> You are not logged in! </h1>
  <?php
  }
 ?>
                    <tr>
                        <td></td>
                        <td colspan="2">Total</td>
                        <td style="color: red;font-weight: 900;">TK <?php echo $total; ?></td>
                    </tr>
                </table>
            </div>
        </div>

 </body>
</html>

  <?php
  } 
  else {
  ?>
  <h1 style="margin-top: 200px;text-align: center;"> <a style="color: red;" href="register.php">Login to continue</a> </h1>
  <?php
  }} else {
  ?>
  <h1 style="margin-top: 200px;text-align: center;"> <a style="color: red;" href="register.php">Login to continue</a> </h1>
  <?php
  }
  ?>

 <?php include("footer.php") ?>