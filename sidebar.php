<?php require_once("config.php"); ?>
<head>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<!-- <body> -->

  <?php 
  if (isset($_SESSION["authen"])){
    if ($_SESSION["authen"] || $_SESSION["admin"]){
  ?>

<div id="navbar">
 
  <a href="cart.php"> 

  	<?php
     
  		$count = $_SESSION["cart_no"];
      
  		echo "Cart " . "<span class='badge badge-warning' id='count'>$count</span>";
  	?>
  </a>
  <?php 
  
  if ($_SESSION["admin"]){
  ?>
  <a href="addproduct.php">Add Product</a>
  <?php 
  }
  ?>
</div>

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

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>

