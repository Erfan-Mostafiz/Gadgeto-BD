<?php require_once("config.php"); ?>
<?php 
// cart handler
  	if(isset($_GET["action"])) {
    	if($_GET["action"] == "delete") {
	      	foreach($_SESSION["shopping_cart"] as $keys => $values) {
	        	
	        	if($values["item_id"] == $_GET["id"]) {
	        		$_SESSION["cart_no"] = $_SESSION["cart_no"] - 1;
	          		unset($_SESSION["shopping_cart"][$keys]);
	          		echo '<script>window.location="cart.php"</script>';
	        	}
	      	}
    	}
  	}

?>