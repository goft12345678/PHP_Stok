<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello</title>
    
    <style>
        *{   
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: Inter;
        }
        body {
            background-image: url('img/0_1.webp');
            background-size: cover; /* ปรับขนาดรูปภาพให้เต็มพื้นที่ */
            background-position:center; /* ตำแหน่งรูปภาพในพื้นที่ */
            background-repeat: no-repeat; /* ไม่ให้รูปภาพซ้ำ */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* ทำให้ส่วนของ body มีความสูงเท่ากับ viewport */
        }
        button {
            padding: 19px 45px;
            background-color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }
        button:hover{
            background-color: #FF5733;
        }
        a{
            color: #000;
        }
    </style>
</head>
<body>
<a  href="product_all.php"><button > เข้าสู่หน้าเว็ป </button> </a>  
</body>
</html>
