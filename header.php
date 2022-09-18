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

 

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    

	<title>Gadgeto BD</title>

</head>
<body>

<!-- Navbar Starts -->
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 <div class="container">
	  <a class="navbar-brand" href="index.php">Gadgeto BD</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse " id="navbarSupportedContent">
	    <ul class="ml-auto navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link nav-color" href="index.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link nav-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Brands
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item nav-color" href="selected.php?brands=<?php echo "Asus"; ?>">Asus</a>
	          <a class="dropdown-item nav-color" href="selected.php?brands=<?php echo "Dell"; ?>">Dell</a>
	          <a class="dropdown-item nav-color" href="selected.php?brands=<?php echo "HP"; ?>">HP</a>
	          <a class="dropdown-item nav-color" href="selected.php?brands=<?php echo "Acer"; ?>">Acer</a>
	          <a class="dropdown-item nav-color" href="selected.php?brands=<?php echo "Ryzen"; ?>">Ryzen</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item nav-color" href="all.php">All</a>
	        </div>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link nav-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Type
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item nav-color" href="selected.php?type=<?php echo "Hardware"; ?>">Hardware</a>
	          <a class="dropdown-item nav-color" href="selected.php?type=<?php echo "Software"; ?>">Software</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item nav-color" href="all.php">All</a>
	        </div>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link nav-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Catagories
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item nav-color" href="selected.php?category=<?php echo "Laptop"; ?>">Laptop</a>
	          <a class="dropdown-item nav-color" href="selected.php?category=<?php echo "Desktop"; ?>">Desktop</a>
	          <a class="dropdown-item nav-color" href="selected.php?category=<?php echo "Headphone"; ?>">Headphone</a>
	          <a class="dropdown-item nav-color" href="selected.php?category=<?php echo "Keyboard"; ?>">Keyboard</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item nav-color" href="all.php">All</a>
	        </div>
	      </li>
	      <li class="nav-item dropdown">
	      	<?php
	      	   if (isset($_SESSION["authen"] )){
	        	if ($_SESSION["authen"] || $_SESSION["admin"]){
	        		$username = $_SESSION["username"];

	        	
	        ?>		
	        		<a class="nav-link nav-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			         <?php echo $username; ?>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin: 0;padding: 0;">
			          
	          		  <div class="dropdown-divider" style="margin: 0;"></div>
			          <form method="post" action="register.php"><button type="submit"class="nav-link nav-color" style="border: 0;background: #f8f9fa;text-align: center;width: 100%;" name="logout">Logout</button>
	        		  </form>
			        </div>
	        <?php 
	        	} else { ?>
	        		<a class="nav-link nav-color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Login
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item nav-color" href="register.php">Sign In</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item nav-color" href="register.php">Sign Up</a>
			        </div>
	        <?php } } ?>
	      </li>
	    </ul>
			<form class="my-2 form-inline my-lg-0" method="POST" action="search.php">
			<input class="form-control mr-sm-2" type="search" name="query" placeholder="Search here" aria-label="Search">
			<button class="my-2 btn btn-outline-success my-sm-0" type="submit" name="search" data-toggle="tooltip" data-placement="left" >Search</button>
	    </form>
	  </div>
	 </div>
	</nav>

	<!--Navbar Ends -->

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
