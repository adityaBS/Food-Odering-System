<?php
    include_once 'connect.php';
?>



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
	  <div class="container">
<?php
  include "nav.php";

  if(isset($_SESSION['valid'])!=true){
  	echo "<h3>Please login or sign up first.</h3>";
  }
  else{

	$sql = "SELECT * FROM cart WHERE username = '$_SESSION[username]'" ;
	$result = mysqli_query($conn,$sql);
?> 
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Food Cart</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location.href = 'index.php'">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<?php
					$total=0;
					while($row = mysqli_fetch_array($result)){
					?>
					<div class="row">
						<div class="col-xs-2">
							<?php
							$a = mysqli_query($conn,"SELECT * FROM menu WHERE item = '$row[item]'");
							$b = mysqli_fetch_assoc($a);
							$image = $b['image'];
							echo '<img src="data:images/jpeg;base64,'.base64_encode($image).'" height="120" width="120" />';
							?>
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php echo "$row[item]"; ?></strong></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6>Rs <strong><?php echo "$row[price]"; ?> <span class="text-muted">&nbsp; x &nbsp;</span><?php echo "$row[quantity]"; ?></strong></h6>
							</div>
						</div>
					</div>
					<hr>
					<?php
					$total=$total+($row['price']*$row['quantity']);
					}
					?>
					
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total: <strong><?php echo "$total"; ?>.00</strong> RS</h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block" onclick="window.location.href = 'payment.php'">
								Checkout
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>
  </body>

</html>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/sign_up.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/half-slider.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
    <link href="assets/css/profile.css" rel="stylesheet">