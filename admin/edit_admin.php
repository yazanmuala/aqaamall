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
	$query="UPDATE admin SET admin_email='$email',
							 admin_password='$password',
							 fullname= '$fullname'
							 WHERE admin_id = {$_GET['admin_id']}";
//perform query
	mysqli_query($conn,$query);
	
	header('location:manage_admin.php');
}

$query 	= "SELECT * FROM admin WHERE admin_id = {$_GET['admin_id']}";
$result = mysqli_query($conn,$query);
$row 	= mysqli_fetch_assoc($result);






?>

<?php include('../includes/admin_header.php')?>
<div class="main-content" >
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Update Admin</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Edit Admin</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate">
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin Email</label>
									<input id="cc-pament" name="adminemail" type="email" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['admin_email']?>">
								</div><div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin password</label>
									<input id="cc-pament" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['admin_password']?>">
								</div><div class="form-group">
									<label for="cc-payment" class="control-label mb-1">Admin Full Name</label>
									<input id="cc-pament" name="fullname" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['fullname']?>">
								</div>



								<div>
									<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
									name="submit">

									<span id="payment-button-amount">Update</span>
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