<?php
include('db_conn.php');
?>
<?php include('heading.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="order.css">
</head>
<div class=""></div>
<div class="container">
	<h1 class="page-header text-center">O R D E R</h1>
	

	<form method="POST" action="buy.php">
		<p>Appetizer</p>
		<table class="table ">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Image</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php 
					$sql="SELECT * FROM product left JOIN category on category.cat_id=product.cat_id
							LEFT JOIN pricing on product.prod_id = pricing.prod_id order by product.cat_id
							asc,prod_name asc;";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
						
						<td class="text-center"><input type="checkbox" value="<?php echo $row['prod_id']; ?>||<?php echo $iterate; ?>" name="prod_id[]" style=""></td>
							<td><?php echo $row['cat_desc']; ?></td>
							<td><?php echo "<img src='img/" .$row['prod_img']."'>"?></td>
							<td><?php echo $row['prod_name']; ?></td>
							<td class="text-left">&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="qty_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-md-3">
				<input type="text" name="tblnum" class="form-control" placeholder="Table Number" required>
			</div>
			<div class="col-md-2" style="margin-left:5px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Order</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>

</body>
</html>
