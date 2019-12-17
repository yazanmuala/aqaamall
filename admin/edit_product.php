<?php

include('../includes/connection.php');
//the action will start 

if (isset($_POST['submit'])) {
	//fetch data
	$product_name    = $_POST['product_name'];
	$product_price   = $_POST['product_price'];
	$product_desc    = $_POST['product_desc'];
	$cat_id          = $_POST['cat_id'];

	$pro_images  = $_FILES['pro_images']['name'];
	$temp_images = $_FILES['pro_images']['tmp_name'];
	$path 		 = "uplode/";

	move_uploaded_file($temp_images, $path.$pro_images);
	 //open connection
/*	$conn = mysqli_connect("localhost","root","","aquamall");
//chech the connection
	if (!$conn) {
		die("cannot connect to server"); 	
	}*/
//create query
	if ($_FILES['pro_images']['error']==0) {
		$query="UPDATE product SET product_name  = '$product_name',
								product_price = '$product_price',
								product_desc = '$product_desc',
								cat_id = '$cat_id',
								product_image = '$pro_images'
							 WHERE product_id = {$_GET['product_id']}";
		
	}else{

		$query="UPDATE product SET product_name  = '$product_name',
								product_price = '$product_price',
								product_desc = '$product_desc',
								cat_id = '$cat_id'
							 WHERE product_id = {$_GET['product_id']}";
	}
//perform query
	mysqli_query($conn,$query);
	header('Location:product_admin.php');
}



?>

<?php include('../includes/admin_header.php')?>
<div class="main-content" >
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Create Admin</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">New Admin</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Product Name</label>
									<input id="cc-pament" name="product_name" type="email" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Product Price</label>
									<input id="cc-pament" name="product_price" type="text" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Product Decription</label>
									<input id="cc-pament" name="product_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="row form-group">
									<div class="col col-md-3">
										<label for="select" class=" form-control-label">Select Category</label>
									</div>
									<div class="col-12 col-md-9">
										<select  id="select" class="form-control" name="cat_id" required >
											<?php
											$query="SELECT * FROM category";
											$result=mysqli_query($conn,$query);
											while ($row =mysqli_fetch_assoc($result)) {
												if($_GET['cat_id']==$row['cat_id']){
													echo "<option selected value='{$row['cat_id']}'>
												{$row['cat_name']}</option>";

											}else{
												echo "<option value='{$row['cat_id']}'>
												{$row['cat_name']}</option>";
											}}
											  ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin Images</label>
									<input id="cc-pament" name="pro_images" type="file" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div>
									<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
									name="submit">

									<span id="payment-button-amount">Add Product</span>
									<span id="payment-button-sending" style="display:none;">Sending…</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include('../includes/admin_footer.php')?>