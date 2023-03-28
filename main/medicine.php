<?php
include('../dist/includes/dbcon.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/04368148c9.js" crossorigin="anonymous"></script>
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
            <!-- <a href="services.html">services</a> -->
            <a href="#footer" id="footer">about us</a>
            <a href="services.html">Services</a>
            
            
        </nav>

        <div class="icons">
            <div id="menubar" class="fas fa-bars"></div>
            <a href="medicine.php">Browse Medicine</a>
            <div id="menubar" class="fas fa-bars"></div>
            <a href ="prescribed.html">Prescribed Medication</a>
            <div id="menubar" class="fas fa-bars"></div>
            <a href ="login.html">LOGIN</a>

           
        </div>

        <!--Shopping  Cart-->
        <div class="cart-box">
        <div class="cart-icon">
          <i class="fas fa-cart-arrow-down fa-2x"></i>
        </div>
        <div class="whole-cart-window hide">
          <h2>Shopping Cart</h2>
          <div class="cart-wrapper">
   
          </div>
          <div class="subtotal">Subtotal: $0.00</div>
         <div> <a href="payment.html" class="checkout"> Checkout  </a></div>
          <!-- <div class="view-cart">View Cart</div> -->
        </div>
      </div>
         
    </header> 

    <div class="container">

        <div class="header1">
            <h1> Medical products</h1>
        </div>

        <div class="card-wrapper">
        <?php
        
        $sql = "SELECT * FROM product WHERE cat_id = 14";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){

?>
            <!--Item 1-->
        <div data-id="1" class="card-item">
        <img  src="../dist/uploads/<?php echo $row['prod_pic'];?>">
                <div class="details">
                  <h3></h3>
                  <p>
                    <span><?php echo$row['prod_name'];?><br> </span>
                    
                    <span class="price">Price: <?php echo$row['prod_price'];?></span>
                    
                    <span class="add-to-cart-btn">Add To Cart</span>
                  </p>
                </div>
                
              </div>
              
              <?php } ?>
            
<!--Item 2-->
        <!-- <div data-id="2" class="card-item">
            <img src="images/Item2.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>holistic way  way collagen <br> (900ml) </span>
                

                <span class="price">Price: $15.50</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div> -->

          <!--Item 3-->
        <!-- <div data-id="3" class="card-item">
            <img src="images/Item3.webp" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Pure Boost immune Mutivitamin <br> (Combo Pack) </span>
                

                <span class="price">Price: $20.99</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div> -->

          <!--Item 4-->
        <!-- <div data-id="4" class="card-item"> -->
            <!-- <img src="images/Item4.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Goli Super Furuits  gummies <br> (30 tablets) </span>
                

                <span class="price">Price: $3.59</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div> --> 

         <!--Item 5-->
        <!-- <div data-id="5" class="card-item">
            <img src="images/Item5.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>healing Herbs Cough syrup <br> (100ml) </span>
                

                <span class="price">Price: $0.59</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

        <!--Item 6-->
        <!-- <div data-id="6" class="card-item">
            <img src="images/Item6.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>healing Herbs Cough syrup <br> (Each) </span>
                

                <span class="price">Price: $1.15</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

          <!--Item 7-->
        <!-- <div data-id="7" class="card-item">
            <img src="images/Item7.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>BYO Care Surgical masks <br> (30 Masks) </span>
                

                <span class="price">Price: $5.79</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

          <!--Item 8-->
        <!-- <div data-id="8" class="card-item">
            <img src="images/Item8.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Surgical Caps <br> (Each) </span>
                

                <span class="price">Price: $0.75</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

          <!-- <div class="header1">
            <h1> Animal Care</h1>
        </div> -->

        <!--Item 9-->
        <!-- <div data-id="9" class="card-item">
            <img src="images/Item9.jpeg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Pedigree <br> (400g) </span>
                

                <span class="price">Price: $6.63</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

          <!--Item 10-->
        <!-- <div data-id="10" class="card-item">
            <img src="images/Item10.webp" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Good Boy Training Pads <br> (30 Pads) </span>
                

                <span class="price">Price: $5.99</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

        <!--Item 11-->
        <!-- <div data-id="11" class="card-item">
            <img src="images/Item11.png" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Wagg Meaty Goodness <br> (2kg) </span>
                

                <span class="price">Price: $3.82</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>
            </div>
          </div>  -->

          <!--Item 12-->
        <!-- <div data-id="11" class="card-item">
            <img src="images/Item12.jpg" />
            <div class="details">
              <h3></h3>
              <p>
                <span>Sulfodene Ointment for dogs <br> (56.7g) </span>
                

                <span class="price">Price: $2.46</span>
                
                <span class="add-to-cart-btn">Add To Cart</span>
              </p>     
            </div> 
          </div>  -->

          <!------------------------------------------------------------------>
          
        </div>

        
      
    </div>

    
    <script src="script3.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/main.js"></script>
    
</body>

</html>

