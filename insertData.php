<?php
//เชื่อมฐานข้อมูล
require('connect.php');


//รับค่าจากฟอม
$id=$_POST["id"];
$name=$_POST["name"];
$detial=$_POST["detial"];
$price=$_POST["price"];
$remaining=$_POST["remaining"];


$img=$_FILES['img']['name'];

$tmp=$_FILES['img']['tmp_name'];

$path = "img/".$img;

	
move_uploaded_file($tmp,'img/'.$img);
	
		


//ปริ้นดู อาเรหรือดัมดัด
//--print_r($education=$_POST["education"]) ;
//$education=implode(",",$_POST["education"]) ;//ใช่ =implode ("ตัวขั้นระหว่างข้อความ","ข้อความ");
//--echo $education;


//บันทึกข้อมูล
$sql = "INSERT INTO `deta_stock`(`id`, `id_stock`, `name_stock`, `img_stock`, `description_stock`, `price_stock`, `remaining`)
                        VALUES ('NULL','$id','$name','$img','$detial','$price','$remaining')";


//echo $sql;


$result=mysqli_query($con,$sql);//สั่งรับคำสั่งsql

if($result){
	header("location:product_all.php");
	exit(0);
}
else{
	
}
	
?>