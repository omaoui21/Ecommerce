<?php 

include('includes/config.php');
if($_GET['del_id'])
{
	$id=$_GET['del_id'];
    $sql = "DELETE FROM cart WHERE p_id='$id'";
    $resultat=mysqli_query($connection,$sql);
	if($resultat)
	{
		echo "<script>window.open('cart.php','_self')</script>";
	}
		}
	
?>