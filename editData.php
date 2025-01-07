<?php
require('connect.php');
$edif = $_GET["edif"];

$sql = "SELECT * FROM deta_stock WHERE id = $edif"; //"SELECT * FROM week1 WHERE id = $edif" เรียกข้อมูล มาใส่

$re = mysqli_query($con, $sql); //เรียกจากsql

$row = mysqli_fetch_array($re); //มาเก็บไว้ในตัวแปร$row ในรูปแบบarray

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $row[1]; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">

    <style>
        h1 {
            padding-top: 30px;
        }

        main {
            background-color: #fff;
            padding: 15px;
            margin: 0px;
            border-radius: 9px;
        }

        body {
            display: grid;

            gap: 30px;
            /* ระยะห่างระหว่างแถว */
            text-align: center;
        }

        table {
            width: 100%;
            /* ตั้งค่าความกว้างของตาราง */
            border-collapse: collapse;
            /* ลดระยะห่างระหว่างเซลล์ */
            background-color: #fff;
        }

        th {
            background-color: #dcdcdc;
            border: 5px solid #fff;
        }

        td {
            height: 50px;
            /* ตั้งค่าความสูงของเซลล์ */
            /* border: 1px solid #ddd;  กำหนดเส้นขอบ */
            padding: 8px;
            /* กำหนดระยะห่างภายในเซลล์ */
            text-align: left;
            /* ตำแหน่งข้อความภายในเซลล์ */
        }

        .controls {
            text-align: right;
        }
    </style>

</head>

<body>
    <?php include("menu.php"); //เรียกใช้ไฟล์ menu.php 
    ?>
    <h1 align="center">แสดงข้อมูล<?php echo $row[1]; ?></h1>
    <main class="container">
        <form action="postEditStudent.php" method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <td colspan="4"><input name="id_name" id="id_name" type="text" value="<?php echo $row[1]; ?>" /></td>
                        <input type="hidden" value="<?php echo $row[0]; ?>" name="id">
                        <td class="controls">เปิดปิด ลบสินค้านี้ </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th rowspan="1">รูป</th>
                        <td colspan="5"><img src="img/<?php echo $row[3]; ?>" alt="" width="300" height="250"></td>

                    </tr>
                    <tr>

                        <th>ชื่อสินค้า</th>
                        <td colspan="5"><input name="name" id="name" type="text" value="<?php echo $row[2]; ?>" /></td>

                    </tr>
                    <tr>
                        <tH>คำอธิบาย</tH>
                        <td colspan="5"><input name="detial" id="detial" type="text" value="<?php echo $row[4]; ?>" /></td>

                    </tr>
                    <tr>
                        <th colspan="6">สินค้าทั้งหมด</th>
                    </tr>
                    <tr>
                        <th>ราคา </th>
                        <td colspan="5"><input name="price" id="price" type="number" value="<?php echo $row[5]; ?>" /></td>

                    </tr>
                    <tr>
                        <th>สินค้าทั้งหมด</th>
                        <td colspan="4"><input name="remaining" id="remaining" type="number" value="<?php echo $row[6]; ?>" /></td>
                        <th>สินค้าทั้งหมด</th>
                    </tr>

                </tbody>
            </table>




            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger"><br>
            <a href="product_add.php">เพิ่มข้อมูล</a>
        </form>
    </main>
















    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
</body>

</html>