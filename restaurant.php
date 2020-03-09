<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foodie</title>

    
  </head>

  <body>
<?php
include "nav.php";
?>

    <header>
 <div class="carousel-inner" role="listbox">
          <?php
          $rid = intval($_GET['id']);
          $sql= "SELECT * FROM restaurant WHERE sl = ".$rid."";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
          $image = $row['image'];
          
          ?>
          <div class="carousel-item active">
            <?php
            echo '<img src="data:images/jpeg;base64,'.base64_encode($image).'" height="" width="100%" />';
            ?>
            <div class="carousel-caption d-none d-md-block">
              <h3></h3>
              <p></p>
            </div>
          </div>
        </div>
    </header>

 
    <div class="col-md-3"></div>


    <div class="col-md-3">

<?php
    include_once 'connect.php';
    $id = intval($_GET['id']);
    $sql = 'SELECT * FROM restaurant WHERE sl = '.$id.' ';
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $restaurant = $row['name'];
?>    

    <section class="py-5">
      <div class="container">
        <h1><?php echo "$restaurant"; ?></h1>

        </div></section>      
    <br>


<form method="POST" action="process.php">
<div class="container">
  <h2>Popular Products</h2>
  <div class="row">
    <div class="col-xs-8">
      <div class="panel panel-info">
        
        <div class="panel-body">
<?php
$sql = "SELECT * FROM menu WHERE restaurant = '$restaurant'" ;
$result = mysqli_query($conn,$sql);
$n=0;
while($row = mysqli_fetch_array($result)){
  echo '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" height="100" width="100" />';
?>
  <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-4"><h4 class="product-name"><strong><?php echo "$row[item]"; ?></strong></h4></div>
            <div class="col-xs-6">
              <div class="col-xs-6 text-right"><h6><strong>RS <?php echo "$row[price]"; ?>.00 <span class="text-muted"></span></strong></h6></div>
              <div class="col-xs-6 text-right"><h6><strong>Quantity <input type="number" name="quantity[]" min="1" max="10" value="1"><span class="text-muted"></span></strong></h6></div>
              <div class="col-xs-6 text-right"><h6><strong><span class="text-muted"></span></strong></h6></div>

              <div class="col-xs-6 text-right">
                
                    <input type="checkbox" name="ordered_item[]" value="<?php echo "".$row['sl']."x".$n.""; ?>">
                
              </div>
            </div>
          </div>
          <hr>
          <?php
          $n++;  
}
?>
        </div>
        <div class="panel-footer">
          <div class="row text-center">
            
            <div class="col-xs-3">
              <button name="order" type="submit" class="btn btn-success btn-block">
                Proceed
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</form>


</body>
</html>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/half-slider.css" rel="stylesheet">
<link href="assets/css/index.css" rel="stylesheet">
