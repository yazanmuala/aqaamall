<?php

include('../includes/connection.php');
//the action will start 

if (isset($_POST['submit'])) {
	//fetch data
	$cat_name    = $_POST['cat_name'];
	$cat_images  = $_FILES['cat_images']['name'];
	$temp_images = $_FILES['cat_images']['tmp_name'];
	$path 		 = "uplode/";

	move_uploaded_file($temp_images, $path.$cat_images);
	
	 //open connection
/*	$conn = mysqli_connect("localhost","root","","aquamall");
//chech the connection
	if (!$conn) {
		die("cannot connect to server"); 	
	}*/
//create query
	$query="INSERT INTO category(cat_name , cat_image)VALUES('$cat_name' , '$cat_images')";
//perform query
	mysqli_query($conn,$query);

	header('Location:grids_admin.php');
	
	
}
?>

<?php include('../includes/admin_header.php')?>
<div class="main-content" >
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Category Admin</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Category Admin</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate" enctype="multipart/form-data" >
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1"> Category Name</label>
									<input id="cc-pament" name="cat_name" type="email" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin Images</label>
									<input id="cc-pament" name="cat_images" type="file" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div>
									<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
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
								<th>#</th>
								<th>CAT NAME</th>
								<th>IMAGES</th>
								<th>VIEW</th>
								<th>EDIT</th>
								<th>DELETE</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$query="SELECT * FROM category";
							$result=mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['cat_id']}</td>";
								echo "<td>{$row['cat_name']}</td>";
								echo "<td><img src='uplode/{$row['cat_image']}'></td>";
								echo "<td><a href='product_show.php?cat_id={$row['cat_id']}' class='btn btn-success'>View</a></td>";
								echo "<td><a href='edit_cat.php?cat_id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
								echo "<td><a href='delete_cat.php?cat_id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
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