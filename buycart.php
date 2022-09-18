<?php require_once("config.php"); ?>
<!-- Inserting Selected Items into the cart -->
<?php  
	if(isset($_POST["add_to_cart"])){

    	if(isset($_SESSION["shopping_cart"])) {
      		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
      		
      		if(!in_array($_GET["id"], $item_array_id)) {
        		$count = count($_SESSION["shopping_cart"]);
        		$_SESSION["cart_no"] = $count + 1;
		        $item_array = array(
		          'item_id'     =>  $_GET["id"],
		          'item_name'     =>  $_POST["hidden_name"],
		          'item_price'    =>  $_POST["hidden_price"],
		          'item_img'    =>  $_POST["hidden_img"],
		          'item_quantity'   =>  $_POST["quantity"]
		        );
        		array_push($_SESSION['shopping_cart'], $item_array);
      		}
      		else {
        		echo '<script>alert("Item Already Added")</script>';
      		}
    	}
    	else {
      
	      $item_array = array(
	        'item_id'     =>  $_GET["id"],
	        'item_name'     =>  $_POST["hidden_name"],
	        'item_price'    =>  $_POST["hidden_price"],
	        'item_img'    =>  $_POST["hidden_img"],
	        'item_quantity'   =>  $_POST["quantity"]
	      );
      	  $_SESSION["shopping_cart"][0] = $item_array;
      	  $_SESSION["cart_no"] = 1;
    	}
  	}

  	header("refresh:0; url=cart.php");
?>