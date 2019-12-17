<?php
	include('includes/public_header.php');

	
	$query  = "SELECT * FROM product WHERE product_id={$_GET['product_id']}";
    $result = mysqli_query($conn,$query);
    $row    = mysqli_fetch_assoc($result);
    if (isset($_POST['addtocart'])) {
    	$_SESSION['product_id'][] = $_GET['product_id'];
        $prodid=$_GET['product_id'];
        echo "<script>window.top.location='single_product.php?product_id=$prodid'</script>";
    }
   
?>


    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
 
            	<?php
            	echo "<img src='admin/uplode/{$row['product_image']}' alt=''>";
            	?>
                
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
        	<?php
        	echo "<span>mango</span>
            <h2 >{$row['product_name']}</h2>
            <p class='product-price'><span class='old-price'>300$</span>{$row['product_price']}$</p>
            <p class='product-desc'>{$row['product_desc']}</p>";
        	?>
            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
            
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

  <?php
  		include('includes/public_footer.php');
  ?>