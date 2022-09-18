<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Gadgeto BD</title>

</head>
<body>

  <?php require_once("header.php"); ?>
  <?php 
    if (isset($_SESSION["authen"])){  
      if ($_SESSION["authen"] || $_SESSION["admin"]){
        include("sidebar.php");
      } 
      else {
      }
    }
  ?>

	<!-- Slideshow -->

	<div class="container">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>Gaming PC</h5>
		        <p>Find your dream PC</p>
		      </div>
		    </div>
		    <div class="carousel-item">
		      <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>Laptop Collection</h5>
		        <p>We offer the best laptops</p>
		      </div>
		    </div>
		    <div class="carousel-item">
		      <img src="https://cdn.pixabay.com/photo/2018/09/17/14/27/headphones-3683983_960_720.jpg" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>Premium Headphones</h5>
		        <p>We offer the best headphones</p>
		      </div>
		    </div>
        <div class="carousel-item">
		      <img src="https://blog.superfast-it.com/hubfs/Microsoft%20Office%20365%20applications%20and%20their%20uses%20copy.jpg" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>Software Licences</h5>
		        <p>We provide software license for your creative needs</p>
		      </div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>

	 


	  <div class="headline">
	  	<div class="pic">
	  		<img src="images/laptopLogo.png">
	  	</div>
	  	<h1>Best Quality Gadgets</h1>
	  </div>

	  <div class="container panjabi">
	  	 <div class="row">
        <?php 
          $sql = "SELECT * FROM `product` WHERE category='Laptop'  OR category='desktop' OR category='headphone' ORDER BY rand() ";
            $result=$con->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
        ?>		
		    	 <a href="product.php?id=<?php echo $row["id"]; ?>&name=<?php echo $row["name"]; ?>">
		     	 <div class="col-sm-3">      
		          <form id="form" name="form" >
		            <div class="card card-body" style="">
		              <img class="card-img-top img-responsive" src="images/<?php echo $row["image"]; ?>" /><br />

                  <?php 
                    $o = $row["o_price"];
                    $n = $row["n_price"];
                    if ($o !=0 ){
                      $d = 100 - (($n*100)/$o);
                  ?>
                      <span class="onsale">-<?php echo number_format($d); ?>%</span>
                  <?php } else {} ?>

		              <h4 class="text-info"><?php echo $row["name"]; ?></h4>

		          	  <h4 class="text-success" style="font-weight: 600;"> 
		          	  	<?php 
		          	  		$op = $row["o_price"];
		          	  		if($op != 0 ) { 
		          	  	?>
		          	  	<span class="o_price">৳ <?php echo $row["o_price"]; ?></span> <?php } ?>  ৳ <?php echo $row["n_price"]; ?>
		          	  </h4></a>
                    <?php if (isset($_SESSION["authen"])){
                      if ($_SESSION["authen"] || $_SESSION["admin"]){ ?>
                  
                  
                    <?php
                      $stock = $row["stock"]; 
                      if($stock>0){ ?>
                        <span style="color: red;font-weight: 900;margin-top: 5px;">
                        <?php echo "# ".$stock." left in stock"; ?>
                      </span><br><?php
                      } else { ?>
                        <span class="stck">Out of stock</span>
                      <?php
                      }
                     ?>
                  

		              <input type="hidden" name="id" id="id<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" />
                  <input type="hidden" name="hidden_name" id="hidden_name<?php echo $row["id"]; ?>" value="<?php echo $row["name"]; ?>" />
                  <input type="hidden" name="hidden_price" id="hidden_price<?php echo $row["id"]; ?>" value="<?php echo $row["n_price"]; ?>" />
                  <input type="hidden" name="hidden_stk" id="hidden_stk<?php echo $row["id"]; ?>" value="<?php echo $row["stock"]; ?>" />
                  <input type="hidden" name="hidden_img" id="hidden_img<?php echo $row["id"]; ?>" value="<?php echo $row["image"]; ?>" />
                  <p class="rslt" id="result<?php echo $row["id"]; ?>"></p>
                  <?php
                    $stock = $row["stock"]; 
                    if($stock>0){
                  ?>
                      
                  <?php
                    } else {
                  ?>
                      <p style="font-size: 15px;color: green;font-weight: 900;margin-top: 10px;">
                        Stock coming soon, stay with us!
                      </p>
                  <?php
                    }
                  } else {
                  ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }} else{
                    ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }
                  ?>

		            </div>
		          </form>
        
		        </div>
		    <?php
		        }
		     ?>
        
	  	 </div>
	  </div>

	  <div class="headline" style="position: relative;" data-aos="fade-up" data-aos-duration="1000">
	  	<div class="pic2">
	  		<img src="images/phone.png">
	  	</div>
	  	<h1>Call our hotline number for enquiry </h1> <a href=""><p>01620000000</p></a>
	  </div>

        <div class="container Dresses">
       <div class="row">
        <?php 
          $sql = "SELECT * FROM `product` WHERE category='Laptop' OR category='Desktop' OR category='Operating System' OR category='Adobe Softwares' ORDER BY rand() ";
            $result=$con->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
        ?>    
           <a href="product.php?id=<?php echo $row["id"]; ?>&name=<?php echo $row["name"]; ?>">
           <div class="col-sm-3">      
              <form id="form" name="form">
                <div class="card card-body" style="">
                  <img class="card-img-top img-responsive" src="images/<?php echo $row["image"]; ?>" /><br />

                  <?php 

                    $o = $row["o_price"];
                    $n = $row["n_price"];
                    if ($o !=0 ){
                      $d = 100 - (($n*100)/$o);
                  ?>
                      <span class="onsale">-<?php echo number_format($d); ?>%</span>
                  <?php } else {} ?>

                  <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                  <h4 class="text-success" style="font-weight: 600;"> 
                    <?php 
                      $op = $row["o_price"];
                      if($op != 0 ) { 
                    ?>
                    <span class="o_price">৳ <?php echo $row["o_price"]; ?></span> <?php } ?>  ৳ <?php echo $row["n_price"]; ?>
                  </h4></a>
                  <?php if (isset($_SESSION["authen"])){if ($_SESSION["authen"] || $_SESSION["admin"]){ ?>
                  
                    <?php
                      $stock = $row["stock"]; 
                      if($stock>0){ ?>
                        <span style="color: red;font-weight: 900;margin-top: 5px;">
                        <?php echo "# ".$stock." left in stock"; ?>
                      </span><br><?php
                      } else { ?>
                        <span class="stck">Out of stock</span>
                    <?php
                      }
                    ?>
                  

                  <input type="hidden" name="id" id="id<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" />
                  <input type="hidden" name="hidden_name" id="hidden_name<?php echo $row["id"]; ?>" value="<?php echo $row["name"]; ?>" />
                  <input type="hidden" name="hidden_price" id="hidden_price<?php echo $row["id"]; ?>" value="<?php echo $row["n_price"]; ?>" />
                  <input type="hidden" name="hidden_stk" id="hidden_stk<?php echo $row["id"]; ?>" value="<?php echo $row["stock"]; ?>" />
                  <input type="hidden" name="hidden_img" id="hidden_img<?php echo $row["id"]; ?>" value="<?php echo $row["image"]; ?>" />
                  <p class="rslt" id="result<?php echo $row["id"]; ?>"></p>
                  <?php
                    $stock = $row["stock"]; 
                    if($stock>0){
                  ?>
                      
                  <?php
                    } else {
                  ?>
                      <p style="font-size: 15px;color: green;font-weight: 900;margin-top: 10px;">
                        Stock coming soon, stay with us!
                      </p>
                  <?php
                    }
                  } else {
                  ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }} else{
                    ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }
                  ?>

                </div>
              </form>
            </div>
        <?php
            }
         ?>
        
       </div>
    </div>
    

	  <section class="contact">
	  	<div class="container-fluid">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-sm">
	  					<h3>Gadgeto BD</h3><br><br>
	  					<p>Uttara, Dhaka</p>
	  					<p>01xxxxxxxxx</p>
	  					<p>Email: gadgetobd@gmail.com</p>
	  				</div>
	  				<div class="col-sm" style="text-align: center;">
	  					<h3 style="text-align: center;">conect with us:</h3>
	  					<ul>
		  					<li><a href=""><i style="color: blue;" class="fab fa-facebook"></i></a></li>
		  					<li><a href=""><i style="color: red;" class="fab fa-instagram"></i></a></li>
		  					<li><a href=""><i style="color: #08f308;" class="fab fa-whatsapp"></i></a></li>
	  					</ul>
	  				</div>
	  			</div>
	  		</div>
	  	</div>


	  </section>

	  <footer>
	  	<p>© All rights reserved by Gadgeto BD   |   Designed, Developed & Maintained by <a href="#" target="_blank">Gadgeto BD IT</a></p>
	  </footer>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>