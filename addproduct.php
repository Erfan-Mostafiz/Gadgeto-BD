<?php require_once("config.php"); ?>
<?php include("header.php"); ?>

<?php 
  if(isset($_SESSION["admin"])){
    if($_SESSION["admin"]){
 
?>

<?php 
  
  if(isset($_POST["post"])){
    $img = $_POST["image"];
    $name = $_POST["name"];
    $oprice = $_POST["oprice"];
    $nprice = $_POST["nprice"];
    $brand = $_POST["brand"];
    $des1 = $_POST["des1"];
    $des2 = $_POST["des2"];
    $des3 = $_POST["des3"];
    $type = $_POST["type"];
    $cat = $_POST["category"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO product(image,name,o_price,n_price,brand,description1,description2,description3,type,category,stock)
          VALUES('$img', '$name', '$oprice', '$nprice', '$brand', '$des1', '$des2', '$des3', '$type', '$cat', '$stock')";
    if (mysqli_query($con, $sql)) {
            $message = "Product added!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Error: " . $sql . "<br/>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
  }
?>
<head>
  <title>Gadgeto BD | Add Product</title>
</head>
<body>
  
  <div class="container" style="padding: 2%;font-weight: 900;padding-top: 5px;">
    <h3 style="text-transform: uppercase;margin-top: 0;color: darkred;">Add your products here</h3>
    <form method="POST">
      <div class="row">
        <div class="col-sm">
          <label>Image: </label><br>
          <input style="width: 80%;" type="text" name="image">
          <p style="margin-bottom: 0;">Example: product//Laptop//Laptop1.jpg</p>
        </div>
        <div class="col-sm">
          <label>Brand: </label><br>
          <input type="text" name="brand"><br>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <label>Name: </label><br>
          <input style="width: 70%;" type="text" name="name"><br>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm">
          <label>Old Price: </label><br>
          <input type="number" name="oprice">
        </div>
        <div class="col-sm">
          <label>New Price: </label><br>
          <input type="number" name="nprice"><br>
        </div>
        <div class="col-sm">
          <label>Stock: </label><br>
          <input type="number" name="stock"><br>
        </div>
        <div class="col-sm">
          <label>Type: </label><br>
          <input type="text" name="type"><br>
        </div>
        <div class="col-sm">
          <label>Category: </label><br>
          <input type="text" name="category"><br>
        </div>
      </div>
      <div class="row">
      <div class="col-sm-12">
      <label>Description 1: </label><br>
      <textarea style="width: 50%;" class="form-control textarea" rows="1" name="des1" ></textarea>
      </div>
      <div class="col-sm-12">
      <label>Description 2: </label><br>
      <textarea style="width: 50%;" class="form-control textarea" rows="1" name="des2" ></textarea>
      </div>
      <div class="col-sm-12">
      <label>Description 3: </label><br>
      <textarea style="width: 50%;" class="form-control textarea" rows="1" name="des3"></textarea>
      </div>
      </div>
      <br>
      <button style="margin-left: 3%;" class="btn btn-danger" name="post">ADD</button>
    </form>   
  </div>

</body>

<?php 
    }
  }
 ?>

<?php include("footer.php"); ?>