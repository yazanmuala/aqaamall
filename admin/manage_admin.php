<?php

include('../includes/connection.php');
//the action will start 

if (isset($_POST['submit'])) {
	//fetch data
	$email    = $_POST['adminemail'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	 //open connection
/*	$conn = mysqli_connect("localhost","root","","aquamall");
//chech the connection
	if (!$conn) {
		die("cannot connect to server"); 	
	}*/
//create query
	$query="INSERT INTO admin(admin_email,admin_password,fullname)VALUES('$email','$password','$fullname')";
//perform query
	mysqli_query($conn,$query);

	header('Location:manage_admin.php');
	
	
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
							<form action="" method="post" novalidate="novalidate" >
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin Email</label>
									<input id="cc-pament" name="adminemail" type="email" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin password</label>
									<input id="cc-pament" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin Full Name</label>
									<input id="cc-pament" name="fullname" type="text" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								



								<div>
									<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
									name="submit">

									<span id="payment-button-amount">Save a</span>
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
								<th>Admin Email</th>
								<th>FullName</th>
								<th>Edit</th>
								<th class="text-right">Delete</th>


							</tr>
						</thead>
						<tbody>
							<?php 
							$query="SELECT * FROM admin";
							$result=mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['admin_id']}</td>";
								echo "<td>{$row['admin_email']}</td>";
								echo "<td>{$row['fullname']}</td>";
								echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-warning'>Edit</a></td>";
								echo "<td><a href='delete_admin.php?admin_id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
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