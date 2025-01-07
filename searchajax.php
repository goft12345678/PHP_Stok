<?php
include("connect.php");

$name = $_POST['name'];

$sql = "SELECT * FROM `deta_stock` WHERE `id_stock` LIKE '%$name%'";
$query = mysqli_query($con, $sql);
$data = '';
while ($row = mysqli_fetch_array($query)) {
    $data .= "<div class='product-item' id='showdata'>";
    $data .= "<form class='product-item1' action='pos.php?id=".$row[0]."' method='post'>";
    $data .= "<button class='product-item1' type='submit' name='add_to_cart'>";
    $data .= "<img class='img-fluid' src='img/".$row[3]."'>";
    $data .= "<h5 class=''>".$row[1]."</h5>";
    $data .= "<h5>".$row[5]."</h5>";
    $data .= "<input type='hidden' name='img' value='".$row[3]."'> ";
    $data .= "<input type='hidden' name='name' value='".$row[1]."'> ";
    $data .= "<input type='hidden' name='price' value='".$row[5]."'> ";
    $data .= "<input type='hidden' name='quantity' value='1'> ";
    $data .= "</button> ";
    $data .= "</form> ";
    $data .= "</div>"; // ปิด div.product-item
}
echo $data;
?>
