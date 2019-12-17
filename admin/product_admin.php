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
	$query="INSERT INTO product(product_name,product_price,product_desc,cat_id,product_image)VALUES('$product_name','$product_price','$product_desc','$cat_id','$pro_images')";
	
//perform query
	mysqli_query($conn,$query);
	header('Location:product_admin.php');
}



?>

<?php include('../includes/admin_header.php')?>
<div class="main-content">
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
							<form action="" method="post" novalidate="novalidate" enctype="multipart/form-data" >
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
												echo "<option value='{$row['cat_id']}'>
												{$row['cat_name']}</option>";
											}
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
		<div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
						<thead>
							<tr>
								
								<th>Product Name</th>
								<th>Product Pricr</th>
								<th>Product Decreption</th>
								<th>Category Name</th>
								<th>Product image</th>
								<th>Edit</th>
								<th>Delete</th>


							</tr>
						</thead>
						<tbody>
							<?php 
							$query="SELECT * FROM product
							INNER JOIN category ON 
							category.cat_id=product.cat_id";
							$result=mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								
								echo "<td>{$row['product_name']}</td>";
								echo "<td>{$row['product_price']}</td>";
								echo "<td>{$row['product_desc']}</td>";
								echo "<td>{$row['cat_name']}</td>";
								echo "<td><img src='uplode/{$row['product_image']}'></td>";
								echo "<td><a href='edit_product.php?product_id={$row['product_id']}&cat_id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
								echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include('../includes/admin_footer.php')?>