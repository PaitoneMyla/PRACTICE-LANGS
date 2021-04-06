<?php
	include('db_conn.php');

	$id=$_GET['product'];

	$pname=$_POST['prod_name'];
	$category=$_POST['category'];
	$price=$_POST['price'];

	$sql="select * from product where prod_id='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}

	$sql="update product set prod_name='$pname', cat_id='$category', price='$price', photo='$location' where prod_id='$id'";
	$conn->query($sql);

	header('location:product.php');
?>