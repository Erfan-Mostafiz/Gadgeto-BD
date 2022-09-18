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
  if ($_SESSION["authen"] || $_SESSION["authen"]){
    include("sidebar.php");
  } 
  else {
  }
}
?>
	<div class="headline">
	  	<h1 style="">Showing results for "<b><?php echo $_POST['query']; ?></b>"</h1>
	  </div>

	<div class="container">
	  	 <div class="row">
	  	 	<?php
	  	 		$query = $_POST['query']; 
			    // gets value sent over search form
			    $min_length = 2;
			    // you can set minimum length of the query if you want
			    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
			        $query = htmlspecialchars($query); 
			        // changes characters used in html to their equivalents, for example: < to &gt;
			        $query = mysqli_real_escape_string($con,$query);
			        // makes sure nobody uses SQL injection 
			        $sql = "SELECT * FROM product
			            WHERE (`name` LIKE '%".$query."%') ORDER BY rand()" or  die(mysql_error());
			        $raw_results = mysqli_query($con,$sql);
			        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
		        while($row = mysqli_fetch_assoc($raw_results))
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
                    <input type="hidden" name="hidden_stk" id="hidden_stk<?php echo $row["id"]; ?>" value="<?php echo $row["stock"]; ?>" />
              		  <input type="hidden" name="hidden_img" id="hidden_img<?php echo $row["id"]; ?>" value="<?php echo $row["image"]; ?>" />
                    <p class="rslt" id="result<?php echo $row["id"]; ?>"></p>
					    <?php
                $stock = $row["stock"]; 
                if($stock>0){
              ?>
		              <input id="<?php echo $row["id"]; ?>" type="button" value="Add to Cart"  style="margin-top: 5px;" class="butn btn-primary add_to_cart" />
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
                <a href="login.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
              <?php
              }} else{
                ?>
                <a href="login.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
              <?php
              }
              ?>

		            </div>
		          </form>
        
		        </div>
		    <?php
		        }
		       }else{ // if there is no matching rows do following
		    ?>
		    	<h5 style="margin-top: 20px;">No results found for <span style="font-weight: 900;">"<?php echo $query; ?>"</span></h5>
		    <?php            
			   }
			   } else{ // if query length is less than minimum
			   	  echo "<h5>Your search query is expected to be more than 1 letter</h5>";      
			   }
		     ?>

	  	 </div>
	  </div>

</body>
</html>


<?php include("contact.php"); ?>
<?php include("footer.php"); ?>