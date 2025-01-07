<?php
include("connect.php"); //เรียกใช้ไฟล์ .php
$sql = "SELECT * FROM `deta_stock`";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>productall</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap-4.3.1.css" rel="stylesheet">

  <style>
    h1 {
      padding-top: 30px;
    }

    main {
      margin: 0px;
    }

    table {
      border-style: solid;
      border-color: #A26F49;
    }

    th {
      background-color: #A26F49;
    }

    td {
      background-color: #FEDCB3;
    }

    img:hover {
      width: 200px;
      height: 250px;
    }
  </style>
  <style>

  </style>

</head>

<body>
  <?php include("menu.php"); //เรียกใช้ไฟล์ menu.php 
  ?>
  <h1 align="center">แสดงข้อมูลสินค้า</h1>
  <main class="container">
    <table class="table " border="1" bordercolor="#A26F49" id="myTable">
      <thead>
        <tr class="table">
          <th align="center" class="text-center">รหัสสินค้า</th>
          <th align="center" class="text-center">รูปสินค้า</th>
          <th align="center" class="text-center">ราคา</th>
          <th align="center" class="text-center">คงเหลือ</th>
          <th align="center" class="text-center">ปุ่ม</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($data = mysqli_fetch_array($result)) { ?>
          <tr>
            <td height="25" align="center" class="style5"><?php echo $data['1']; ?></td>
            <td height="25" align="center" class="style5"><img class="img-fluid " src="img/<?php echo $data['3']; ?> " width="35" height="25"></td>
            <td height="25" align="center" class="style5"><?php echo $data['5']; ?></td>
            <td height="25" align="center" class="style5"><?php echo $data['6']; ?></td>
            <td align="center" class="">
              <!--การลบข้อมูล ใช่href= วิ่งไปที่คำสั่ง delet.php ต่อ ? สร้างตัวแปร delet= (เก็บอะไรไว้) เก็บตารางช่องแรก ละ echo เก็บเอาไว้-->
              <a href="product_form.php?form=<?php echo $data['0']; ?>" type="button" class="btn btn-outline-secondary">ข้อมูลเพิ่มเติม</a>
              <a href="editData.php?edif=<?php echo $data['0']; ?>" type="button" class="btn btn-outline-secondary">แก้ไขข้อมูล</a>
              <a href="product_delet.php?delet=<?php echo $data['0']; ?>" type="button" class="btn btn-outline-danger" onclick="return confirm('คุณต้องการลบข้อมูลของ <?php echo $data['2']; ?> ใช่หรือไม่?')">ลบข้อมูล
              </a>
            </td>
          </tr> <br>
        <?php } ?>
      </tbody>
    </table>


    <a href="product_add.php">เพิ่มข้อมูล</a>
  </main>

















  <script src="js/jquery-3.3.1.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.3.1.js"></script>
  <script src="script.js"></script>
</body>

</html>