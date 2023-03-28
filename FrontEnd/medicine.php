<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Page</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/png" href="images/logo.png"/>
    <link rel="icon" type="image/png" href="images/logo.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<body>

    <header class="header">
        <a href="index.html"> <img src="images/logo1.png" id="logo" alt=""></a>
       

        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="services.html">services</a>
            <a href="#footer" id="footer">about us</a>
            
            
        </nav>

        <div class="icons">
            <div id="menubar" class="fas fa-bars"></div>
            <a href="medicine.html">Browse Medicine</a>

            <div id="menubar" class="fas fa-bars"></div>
            <a href ="prescribed.html">Prescribed Medication</a>
            <div id="menubar" class="fas fa-bars"></div>
            <a href ="login.html">LOGIN</a>

           
        </div>
    </header> 
    <?php
    include('../dist/includes/dbcon.php');
    ?>



    <div class="container">

        <div class="header1">
            <h1> Medical products</h1>
        </div>

        <div class="products">
        <?php
$sql = "SELECT * FROM `product`";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){

?>
            <div class="product">
                <div class="image">
               <img style="width:320px;height:240px" src="../dist/uploads/<?php echo $row['prod_pic'];?>">
                </div>
                <div class="namePrice">
                    <h3><?php echo$row['prod_name'];?></h3>
                    <span>  RS:<?php echo$row['prod_price'];?></span>
                </div>
                <p><?php echo$row['prod_desc'];?></p>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="bay">
                    <button> Buy now </button>
                </div>
            </div>

            <?php } ?>

         
        </div>
      
    </div>
    
    <script src="js/all.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
