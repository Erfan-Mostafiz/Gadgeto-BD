<?php require_once("config.php"); ?>
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
<head>
	<title>Gadgeto BD| <?php echo $_GET['name']; ?> </title>
    <link rel="stylesheet" type="text/css" href="css/product.css">
	<title>Gadgeto BD</title>
</head>

<body>
	<?php 
		$n = $_GET['id'];
		$sql = "SELECT * FROM `product` WHERE id=$n";
		$result=$con->query($sql);
		while($row = mysqli_fetch_assoc($result))
		{
	?>
	<div class="container" style="margin-top: 50px;">
		<div class="row">
			<div class="col-md-3" style="margin-top: 50px;">
				<img class="img-product zoom zoom:hover" src="images/<?php echo $row["image"]; ?>">
			</div>
			<div class="col-md-7 sec-back text-product">
				<strong style= "text-align: top-left;color: #1692a9;"><?php echo $row["name"]; ?></strong><br>
				<hr><hr>
				<span class="text-success" style="font-weight: 900;font-size: 30px;">
				<?php 
		          $op = $row["o_price"];
		          if($op != 0 ) { 
		        ?>
		          <span class="o_price">৳ <?php echo $row["o_price"]; ?></span> <?php } ?>
				  ৳ <?php echo $row["n_price"]; ?></span><br>
				  <?php 
				  $o = $row["o_price"];
					$n = $row["n_price"];

					if($o != 0){
						$d = 100 - (($n*100)/$o);
					
				   ?>
				  <span style="font-size: 20px;font-weight: 600;color: var(--blue);">Save upto <?php echo number_format($d); ?>%</span><br>
				<?php }else{} ?>
				<hr><hr>
				<form method="post" action="buycart.php?action=add&id=<?php echo $_GET["id"]; ?>">
				<span>Quantity: </span>
				<input type="number" style="width: 10%;text-align: center;" name="quantity" value="1">
				<span class="stock">
					<?php
						$stock = $row["stock"]; 
						if($stock>0){
							echo "# ".$stock." left in stock";
						} else {
							echo "Out of stock!";
						}
					 ?>
				</span><br>
				
				<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
              	<input type="hidden" name="hidden_price" value="<?php echo $row["n_price"]; ?>" />
              	<input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>" />
		        
             	<?php
             		$stock = $row["stock"]; 
             		if($stock>0){
             		  if(isset($_SESSION["authen"])){
             			if($_SESSION["authen"] || $_SESSION["admin"]){
  				?>		
  						<button type= "submit" class = "btnSubmit1" name="add_to_cart">Buy Now</button>
  				<?php
  						} else { ?>
  							<a href="register.php" style="color: red;font-size: 20px;font-weight: 900;display: inline-block;margin-top: 50px;">Sign in to continue</a>
  				<?php	} } else { ?>
  							<a href="register.php" style="color: red;font-size: 20px;font-weight: 900;display: inline-block;margin-top: 50px;">Sign in to continue</a>
  				<?php	}
             		} else {
             	?>
             			<p style="margin-top: 30px;font-size: 20px;color: green;">
             				Stock coming soon, stay with us!
             			</p>
             	<?php
             		}

             	?>
	
		        </form>
			</div>
		</div>

		<div class="tabContainer">
		    <div class="buttonContainer">
		        <button onclick="showPanel(0,'#eeeeee6e')">Description</button>
		        <button onclick="showPanel(1,'#eeeeee6e')">Brand</button>
		        <button onclick="showPanel(2,'#eeeeee6e')">Delivery Information</button>
		        <button onclick="showPanel(3,'#eeeeee6e')">Category</button>
		    </div>
		    <div class="tabPanel" style="text-align: left;padding: 10% 5% 5% 5%;">
		    	<p>
		    		<?php echo $row["description1"]; ?>
		    	</p>
		    	<p>
		    		<?php echo $row["description2"]; ?>
		    	</p>
		    	<p>
		    		<?php echo $row["description3"]; ?>
		    	</p>
		    </div>
		    <div class="tabPanel">
		    	<p>
		    		<?php echo $row["brand"]; ?>
		    	</p>
		    </div>
		    <div class="tabPanel">
		    	<p><span style="font-weight: 900;">Delivery Charge:</span> 100TK </p>
		    	<p>We only deliver inside Dhaka.</p>
		    	<p>Delivery outside Dhaka (coming soon)</p>
		    </div>
		    <div class="tabPanel">
		    	<p>
		    		<?php echo $row["category"]; ?>
		    	</p>
		    </div>
		</div>

		<h2>Related Products</h2>
		<hr><hr>
		
		<div class="row">
		<?php 
			$category = $row["category"];

		      $sql = "SELECT * FROM `product` WHERE category='$category' ORDER BY rand() LIMIT 4";
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
                  <span style="font-weight: 600;font-size: 20px;color: var(--pink);">Quantity: </span>
                  <input type="number"  id="quantity<?php echo $row["id"]; ?>" name="quantity" value="1" style="width: 18%;text-align: center;margin-left: 40%;font-weight: 900;">
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
	<?php
		}
	?>

	<script src="js/product.js"></script>

</body>

<?php include("contact.php") ?>
<?php include("footer.php") ?>

