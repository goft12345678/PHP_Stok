<?php
require('connect.php');

$id = $_POST["id"];
$id_name=$_POST["id_name"];
$name = $_POST["name"];
$detial = $_POST["detial"];
$price = $_POST["price"];
$remaining = $_POST["remaining"];
$sql = "UPDATE `deta_stock` SET `id`=$id,`id_stock`='$id_name',`name_stock`='$name',`description_stock`='$detial',`price_stock`='$price',`remaining`='$remaining' WHERE id = '$id'";



$re=mysqli_query($con,$sql);
echo $sql;
if($re){
	header("location:product_all.php");
	exit(0);
}else{
	echo "ไม่สำเร็จ";
}

?>