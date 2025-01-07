<?php
session_start();

include("connect.php"); //เรียกใช้ไฟล์ .php

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "id");
        if (!in_array($_GET['id'], $session_array_id)) {
            $session_array = array(
                'id' => $_GET['id'],
                "name" => $_POST['name'],
                "img" => $_POST['img'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']
            );

            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'id' => $_GET['id'],
            "name" => $_POST['name'],
            "img" => $_POST['img'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity']
        );

        $_SESSION['cart'][] = $session_array;
    }
}
$output = '';
$sql = "SELECT * FROM `deta_stock`";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: Inter;
        }

        .container {
            display: flex;
        }

        .left-content {
            border: 1px solid #7320FF;
            /*   สีขอบ */
            flex: 3;
            /* สัดส่วนของ content ซ้าย */
            background-color: #F3ECFF;
            padding: 20px;
        }

        .right-content {
            border: 1px solid #7320FF;
            /*   สีขอบ */
            flex: 1;
            /* สัดส่วนของ content ขวา */
            background-color: #e0e0e0;
            padding: 20px;
        }

        .product-container {

            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-item {
            flex: 0 0 30%;
            /* ขนาดของแถวสินค้าในแต่ละแถว */
            margin-bottom: 20px;
            text-align: center;
        }

        .img-fluid {
            width: 90%;
            height: 60%;
            margin-bottom: 10px;
        }

        /* CSS ของขอบรูป */
        .product-item {
            border: 1px solid #7320FF;
            /*   สีขอบ */
            border-radius: 5px;
            /* มุมขอบโค้ง */
            padding: 5px;
            /* ระยะห่างของขอบ */
            transition: transform 0.3s;
            /* เอฟเฟกต์เมื่อ hover */
            background: #D2B8FF;
        }

        .product-item1 {

            border-radius: 5px;
            /* มุมขอบโค้ง */
            width: 100%;
            height: 100%;
            background: #D2B8FF;
        }

        .product-item img {
            border: 5px solid #BD96FF;
            /*   สีขอบ */
            border-radius: 5px;
            /* มุมขอบโค้ง */

        }

        /* เมื่อ hover ขอบของรูป */
        .product-item:hover {
            transform: scale(1.1);
            /* ขยายขนาดรูป */
        }

        h5 {
            color: black;
        }
    </style>
</head>

<?php include("menu.php"); //เรียกใช้ไฟล์ menu.php 
?>

<body>
    <div class="container">
        <div class="left-content">
            <input type="text" class="form-control" id="getName" autocomplete="off" placeholder="Search.....">
            <h1 align="center">แสดงข้อมูลสินค้า</h1>

            <div class="product-container" id="showdata">
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <form class="product-item" action="pos.php?id=<?=$data['0']; ?>" method="post">
                        <button class="product-item1" type="submit" name="add_to_cart">
                            <img class="img-fluid" src="img/<?php echo $data['3']; ?>">
                            <h5 class=""><?php echo $data['1']; ?></h5>
                            <h5><?php echo $data['5']; ?></h5>
                            <input type="hidden" name="img" value="<?= $data['3'] ?>">
                            <input type="hidden" name="name" value="<?= $data['1'] ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="price" value="<?= $data['5'] ?>">
                        </button>
                    </form>
                <?php } ?>
            </div>

            <div calss="" id="searchresult"></div>

        </div>
        <div class="right-content">
            <h2>รายการสินค้าในตะกร้า</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>รูปสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>ลบ</th>
                        <th>จำนวน</th>
                        <th>เพิ่ม</th>
                        <th>รวม</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        echo "<tr>
                <td><img src='img/{$value['img']}' class='img-fluid' width='50'></td>
                <td>{$value['name']}</td>
                <td>{$value['price']}</td>
                <td>
                    <form method='post' action='pos.php?action=reduce_quantity&id={$value['id']}'>
                        <button class='btn btn-primary' type='submit'>-</button>
                    </form>
                </td>
                <td>{$value['quantity']}</td>
                <td>
                    <form method='post' action='pos.php?action=add_quantity&id={$value['id']}'>
                        <button class='btn btn-primary' type='submit'>+</button>
                    </form>
                </td>
                <td>$" . number_format($value['price'] * $value['quantity']) . "</td>
                <td>
                    <form method='post' action='pos.php?action=remove&id={$value['id']}'>
                        <button class='btn btn-danger' type='submit'>ลบ</button>
                    </form>
                </td>
            </tr>";
        $total += $value['quantity'] * $value['price'];
    }
    echo "<tr>
            <td colspan='4'></td>
            <td><b>ยอดรวม</b></td>
            <td colspan='2'>จำนวนสินค้า: $total</td>
            <td>
                <form method='post' action='pos.php?action=clearall'>
                    <button class='btn btn-warning' type='submit'>Clear</button>
                </form>
            </td>
        </tr>";
} else {
    echo "<tr><td colspan='5'>ไม่มีสินค้าในตะกร้า</td></tr>";
}
?>

                </tbody>
            </table>
        </div>

    </div>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "clearall") {
            unset($_SESSION['cart']);
        } elseif ($_GET['action'] == "remove" && isset($_GET['id'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
    if ($_GET['action'] == "add_quantity" && isset($_GET['id'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                $_SESSION['cart'][$key]['quantity'] += 1;
            }
        }
    } elseif ($_GET['action'] == "reduce_quantity" && isset($_GET['id'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                if ($_SESSION['cart'][$key]['quantity'] > 1) {
                    $_SESSION['cart'][$key]['quantity'] -= 1;
                }
            }
        }
    }
    
    ?>



    <script>
        $(document).ready(function() {
            -$('#getName').on("keyup", function() {
                var getName = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'searchajax.php',
                    data: {
                        name: getName
                    },
                    success: function(response) {
                        $("#showdata").html(response);
                    }
                });
            });
        });
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
    <script src="script.js"></script>
</body>

</html>