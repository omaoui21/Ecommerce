
<?php 
    include('includes/functions.php');
	if(isset($_GET['c_id']))
	{
		$customer_id=$_GET['c_id'];

	}
	$ip_add=getRealIpUser();
	$status="Pending";
	$invoice_no=mt_rand();
	$select_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($connection,$select_cart);
	while($row_cart=mysqli_fetch_array($run_cart))
	{
		$pro_id=$row_cart['p_id'];
		$pro_qty=$row_cart['qte'];
		$pro_size=$row_cart['size'];
		$get_products="select * from products where product_id='$pro_id'";
		$run_products=mysqli_query($connection,$get_products);
		while($row_products=mysqli_fetch_array($run_products))
		{
         $sub_total=$row_products['product_price']*$pro_qty;
		 $insert_customer_order="INSERT INTO customer_orders(customer_id, due_amount, invoice_on, qty, size, order_date, order_status,product_id) VALUES ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status','$pro_id')";
		$run_customer_order=mysqli_query($connection,$insert_customer_order);
		$delete_cart="delete from cart where ip_add='$ip_add'";
		$run_delete=mysqli_query($connection,$delete_cart);
		echo" <script>alert('Your Order has been submitted, Thanks ')</script>";
		echo" <script>window.open('myaccount.php','_self')</script>";
		}

	}
 ?>
