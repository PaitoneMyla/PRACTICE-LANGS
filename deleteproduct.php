<?php
	include('db_conn.php');

	$id = $_GET['product'];

	$sql="delete from product where prod_id='$id'";
	$conn->query($sql);

	header('location:product.php');
?>