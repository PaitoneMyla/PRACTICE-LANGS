<?php 
include_once "db_conn.php";

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Dessert</title>
	<link rel="stylesheet" type="text/css" href="#">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-2 mt-3">
				
			</div>
			<div class="col-10">
				<?php 
					$sql = "SELECT pr.prod_image,pr.prod_name, p.price 
							FROM product as pr
							JOIN pricing as p
							ON pr.prod_id = p.prod_id
							WHERE cat_id = 2;";
					$stmt=mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)){
							echo "Statement Failed.";
							exit();
						}

						mysqli_stmt_execute($stmt);
						$resultData = mysqli_stmt_get_result($stmt);
						$arr=array(); 
						while($row = mysqli_fetch_assoc($resultData)){
							array_push($arr,$row);
						}?>
<table>
						<?php
						foreach($arr as $key => $val){
							echo "<tr>";
							echo "<td>";
							echo "<td>" ."<img src='img/" .$val['prod_image']."'> </td>";
							echo "<td>" . $val['prod_name']. "</td>";
							echo "<td>" . $val['price'] . "</td>";
							echo "</tr>";
						}
				 ?>
				 	
</table>
			</div>
		</div>
		
	</div>

</body>
</html>