<?php

include('../includes/connection.php');
//the action will start 



?>

<?php include('../includes/admin_header.php')?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
			
		<div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
						<thead>
							<tr>
								
								<th>Product Name</th>
								<th>Product Price</th>
								<th>Product Decreption</th>
								<th>Category Name</th>
								<th>Product image</th>
								


							</tr>
						</thead>
						<tbody>
							<?php 
							$query="SELECT * FROM product
							INNER JOIN category ON 
							category.cat_id=product.cat_id";
							$result=mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								
								if($_GET['cat_id']==$row['cat_id']){
								echo "<tr>";
								echo "<td>{$row['product_name']}</td>";
								echo "<td>{$row['product_price']}</td>";
								echo "<td>{$row['product_desc']}</td>";
								echo "<td>{$row['cat_name']}</td>";
								echo "<td><img src='uplode/{$row['product_image']}'></td>";
								echo "</tr>";
							}
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