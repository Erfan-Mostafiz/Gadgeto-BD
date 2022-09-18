<?php require_once("config.php"); ?>
<?php include("header.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Gadgeto BD</title>
</head>
<body>
<?php 
  if (isset($_SESSION["authen"])){  
    if ($_SESSION["authen"] || $_SESSION["admin"]){
      include("sidebar.php");
    } 
    else {
    }
  }
?>

	<div class="headline">
	  	<h1 style="text-transform: uppercase;">All</h1>
	  </div>

	<div class="container">
	  	 <div class="row">
	  	 	<?php

		      $sql = "SELECT * FROM `product` ORDER BY rand() ";
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
                  <?php if (isset($_SESSION["authen"])){if ($_SESSION["authen"] || $_SESSION["authen"]){ ?>
                  
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

</body>
</html>


