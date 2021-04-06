<?php
	include('db_conn.php');

	$pname=$_POST['prod_name'];
	$price=$_POST['price'];
	$category=$_POST['category'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into product (prod_name, cat_id, price, img) values ('$pname', '$category', '$price', '$location')";
	$conn->query($sql);

	header('location:product.php');

?>