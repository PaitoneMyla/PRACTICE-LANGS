<?php
	include('db_conn.php');
	if(isset($_POST['prod_id'])){
 
		$tblnum=$_POST['tblnum'];
		$sql="insert into admin (tblnum, date) values ('$tblnum', NOW())";
		$conn->query($sql);
		$pid=$conn->insert_id;
 
		$total=0;
 
		foreach($_POST['prod_id'] as $product):
		$proinfo=explode("||",$product);
		$productid=$proinfo[0];
		$iterate=$proinfo[1];
		$sql="select * from pricing where prod_id='$productid'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();
 
		if (isset($_POST['qty_'.$iterate])){
			$subt=$row['price']*$_POST['qty_'.$iterate];
			$total+=$subt;

			$sql="insert into orders (admin_id, prod_id, qty) values ('$pid', '$productid', '".$_POST['qty_'.$iterate]."')";
			$conn->query($sql);
		}
		endforeach;
 		
 		$sql="update admin set total_amount='$total' where admin_id='$pid'";
 		$conn->query($sql);
		header('location:sales.php');		
	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='order.php';
		</script>
		<?php
	}
?>