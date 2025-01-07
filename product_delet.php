<?php 
require('connect.php');
$delet=$_GET["delet"];//รับตัวแปล

$sql="DELETE FROM `deta_stock` WHERE `id`=$delet"; //คำสั่งลบ sql 


$resuli=mysqli_query($con,$sql);//ทำการรันคำสั่ง sql ใน mysql


if($resuli){
	header("location:product_all.php");//ถ้า สำเร็จ ก็กลับไปที่ index.php
	exit(0);	//ละปิดอันนี้ทิ้ง
}
else{
	echo "ลบไม่สำเร็จ";
}


?>
