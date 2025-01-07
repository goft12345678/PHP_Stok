<style>
    *{   
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    
    font-family: Inter;
    }
    body{
        background-color: #e8e8e8;
    }

    li, a, button {
    font-family: Inter;
    font-weight: 500;
    font-size: 32px;
    color: #FEDCB3;
    background-color: #A26F49;
    text-decoration: none;
    
    }

    header {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 10px 5%;
    background-color: #A26F49;
    
    }

    .logo {
    border-radius: 999px;
    cursor: pointer;
    margin-right: auto;
    background-color: #A26F49;
    
    }


    .nav_links {
    list-style: none;
    margin: 0px;
    }

    .nav_links li {
    display: inline-block;
    padding: 0px 70px;
    
    }


    .nav_links li a {
    transition: all 0.3s ease 0s;
    font-weight: 800;
    }

    .nav_links li a:hover {
    color:#614530;
    }
    .cat{
        order: 2;
    }

    button {
    padding: 9px 25px;
    background-color: Drgba(0,136,169,1);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
    }
    button:hover{
        background-color: rgba(0,136,169,0,8);
    }

</style>
<header>
    <img class="logo" height="50" while="50" src="img/proflie.gif" alt="logo">
    <nav>
        
        <ul class="nav_links">
            <li><a href="product_all.php">Home</a></li>
            <li><a href="product_add.php">Add PROD</a></li>
            <li><a href="pos.php">POS</a></li>

        </ul>
    </nav>  
    <img class="cta"style="background-color:#A26F49;" src="img/tann.png" height="49" while="49" alt="">
</header>

