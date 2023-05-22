<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">

    <?php

    session_start();

    $item = isset($_GET['p']) ? $_GET['p'] : 'new';
    $conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );
    $filter = " WHERE specials = '$item' ";
    $sql_ = "SELECT * FROM `product`" . $filter;
    $product_list = mysqli_query ( $conn, $sql_);
    $username = isset($_SESSION['shopuser']) ? $_SESSION['shopuser'] : '';

    //echo $_SESSION['shopuser'];

    if($username  == '')
    {
        $login = 'no';
    }
    else
    {
        $login = 'yes';
    }

    //echo $login;


    ?>


    
</head>
<body>
    

        
        <header>
                    <section class="main-header"> 
                    <div id="logo"><a href="index.php">
                        <img src="images/horme/hormelogo.png" alt="logo">
            
                    </a>
                    </div>
                
                
                    <div id="searchbar">
                        <form id="search" action="products.php" method="get">
                          
                        <div class="select">
                            <select id="select" name="category" id="category">
                                
                                <option selected='selected' value="Drills">Drills</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Chemicals">Chemicals</option>
                                
                            </select>

                        </div>

                        <div class="keyword">
                            <input id="input" type="text" id="keyword" name="keyword" placeholder="Enter search keyword">

                        </div>

                        <div class="btn">
                        <input id="input"type="submit" value="Search">

                        </div>
                        
                        </form>
            
                        <div class="navigation"> 
                            <nav>
                            <ul><li><a href="index.php">Home</a></li>
                                <li><a href="aboutus.php">About Us</a></li>
                                <li><a href="products.php">Product</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                    
                <div class = "personal">
                        <div class="icon">
                            <a href="cart.php">
                                <div style="display: flex;"> 
                                    <img src="images/nav/NicePng_cart-icon-png_2317299.png" alt="cart">
                                    
                                        Cart
                                </div>     
                            </a>
                        </div>
                    <div class="line"></div>
                        <div class="icon">

                        <?php switch ($login)
                        {
                            case "yes":
                                ?>
                                <a href="profile.php" id="profile">
                                    <div>
                                        <img src="images/nav/NicePng_individual-icon-png_3729331.png" alt="individual">
                                    </div>
                                    <div>
                                        Hello <br><?php echo $_SESSION['shopuser'];?>
                                    </div>

                                </a>
                            <?php break;
                            case "no":
                                ?>
                                <a href="login.php">
                                    <div>
                                        <img src="images/nav/NicePng_individual-icon-png_3729331.png" alt="individual">
                                    </div>
                                    <div>
                                        Login
                                    </div>
                                </a>
                            
                            <?php break;
                            
                        }?>

                                

                                
                        
                    </div>
                </div>
                </section>
        
           
                
            
           
            
            
        </header>

    <div>
        <a href="index.php">
            <div class="banner">
                <img src="images/horme/hormebanner.jpg" alt="banner">
            </div>
        </a>        
    </div>

    <section>

        <div class="selection">
            <div><a href="index.php?p=featured">Featured</a></div>
            <div><a href="index.php?p=bestseller">BestSeller</a></div>
            <div><a href="index.php?p=new">New</a></div> 
        </div> 
        
        

        <?php

            
            $visible = "grid";
            switch ($item)
            {
            case "featured":
                
                ?>
                    <div style="display: <?php echo $visible; ?>;" class="grid-container">

                                <?php While ( $one_product= mysqli_fetch_assoc($product_list)  ) { ?>
                                    
                                    <div class="grid-items">
                                        <div class="image">
                                            <img src="<?php echo $one_product['picture']; ?>" alt="">
                                        </div>
                                        <div class="productdesc">
                                            <a class="productname" href="product_details.php?id=<?php echo $one_product['id'] ?>"><h4><?php echo $one_product['name']; ?></h4></a> 
                                            <br>
                                            <p class="productpara">
                                                <?php echo $one_product['description']; ?>
                                            </p>
                                            
                                            <br>
                                            <p class="productprice">Price:$<?php echo $one_product['price']; ?></p>
                                        </div>
                                    </div>
    
                                <?php } ?>

                            <!-- <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/product2.jpg" alt="">
                                </div>

                                <div class="productdesc">
                                    <a href=""><h4>DEWALT HD 5KG ANTI-VIBRATION BREAKER 17MM HEX D25811K</h4></a>
                                    
                                    <br>
                                    <p class="productpara">
                                        Ideal for light demolition, surface or preparation chiselling grooves, channels openings etc in brick, masonry and light concrete.

                                        Demolition application in concrete and stone
                                        
                                        Electronic speed and impact energy control for use in delicate/lighter materials
                                    </p>
                                
                                    <br>
                                    <p>Price</p>
                                </div>


                                </div>

                                <div class="grid-items">
                                    <div class="image">
                                        <img src="images/products/product3.jpg" alt="">
                                    </div>

                                    <div class="productdesc">
                                        <a href=""><h4>DEWALT 13MM (1/2") IMPACT DRILL, 650W, DWD024</h4></a>
                                        
                                        <br>
                                        <p class="productpara">
                                            L
                                            Lock on button gives the user the option to keep the machine continually running when doing repetitive operations

                                        </p>
                                    
                                        <br>
                                        <p>Price</p>
                                    </div>

                                </div>

                                <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/product4.jpg" alt="">
                                </div>

                                <div class="productdesc">
                                    <a href=""><h4>DEWALT 22MM (7/8") SDS+ ROTARY HAMMER, 710W, D25033K</h4></a>
                                    
                                    <br>
                                    <p class="productpara">
                                        Ideal for drilling anchor and fixing holes into concrete and masonry from 4 to 22 mm in diameter

                                        Rotation-stop for light chiselling applications in brick, soft masonry and occasionally concrete

                                        Impact-stop for drilling in wood, steel, ceramic and screwdriving applications
                                    </p>
                                
                                    <br>
                                    <p>Price</p>
                                </div>
                            </div> -->

                            

                    </div>
                    
            <?php
            break;
            case "bestseller":
            ?>

                    <div style="display: <?php echo $visible; ?>;" class="grid-container">

                                  <?php While ( $one_product= mysqli_fetch_assoc($product_list)  ) { ?>
                                    
                                    <div class="grid-items">
                                        <div class="image">
                                            <img src="<?php echo $one_product['picture']; ?>" alt="">
                                        </div>
                                        <div class="productdesc">
                                            <a class="productname" href="product_details.php?id=<?php echo $one_product['id'] ?>"><h4><?php echo $one_product['name']; ?></h4></a> 
                                            <br>
                                            <p class="productpara">
                                                <?php echo $one_product['description']; ?>
                                            </p>
                                            
                                            <br>
                                            <p class="productprice">Price:$<?php echo $one_product['price']; ?></p>
                                        </div>
                                    </div>
    
                                <?php } ?>

                            <!-- <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/product2.jpg" alt="">
                                </div>

                                <div class="productdesc">
                                    <a href=""><h4>DEWALT HD 5KG ANTI-VIBRATION BREAKER 17MM HEX D25811K</h4></a>
                                    
                                    <br>
                                    <p class="productpara">
                                        Ideal for light demolition, surface or preparation chiselling grooves, channels openings etc in brick, masonry and light concrete.

                                        Demolition application in concrete and stone
                                        
                                        Electronic speed and impact energy control for use in delicate/lighter materials
                                    </p>
                                
                                    <br>
                                    <p>Price</p>
                                </div>


                                </div>

                                <div class="grid-items">
                                    <div class="image">
                                        <img src="images/products/product3.jpg" alt="">
                                    </div>

                                    <div class="productdesc">
                                        <a href=""><h4>DEWALT 13MM (1/2") IMPACT DRILL, 650W, DWD024</h4></a>
                                        
                                        <br>
                                        <p class="productpara">
                                            L
                                            Lock on button gives the user the option to keep the machine continually running when doing repetitive operations

                                        </p>
                                    
                                        <br>
                                        <p>Price</p>
                                    </div>

                                </div>

                                <div class="grid-items">
                                    <div class="image">
                                        <img src="images/products/product4.jpg" alt="">
                                    </div>

                                    <div class="productdesc">
                                        <a href=""><h4>DEWALT 22MM (7/8") SDS+ ROTARY HAMMER, 710W, D25033K</h4></a>
                                        
                                        <br>
                                        <p class="productpara">
                                            Ideal for drilling anchor and fixing holes into concrete and masonry from 4 to 22 mm in diameter

                                            Rotation-stop for light chiselling applications in brick, soft masonry and occasionally concrete

                                            Impact-stop for drilling in wood, steel, ceramic and screwdriving applications
                                        </p>
                                    
                                        <br>
                                        <p>Price</p>
                                </div>
                            </div> -->

                            

                    </div>

                        <!-- <div class="grid-items">
                            <div class="image">
                                <img src="images/products/doorbell.jpg" alt="doorbell">
                            </div>
                            <div class="productdesc">
                                <a href=""><h4>SOUNDTECH DIGITAL WIRELESS DOORBELL DD-103</h4></a> 
                                <br>
                                <p class="productpara">
                                Wireless design

                                Wasy to install

                                Strong anti-interference system

                                Low power consumption

                                Weatherproof touch sensor transmitter with led indicator

                                5 levels of volume control - higher, high, medium, low and mute

                                Polyphony sound : 52

                                Distance coverage : up to 50 meters

                                Battery : 3 x aa (not included)
                                </p>
                                
                                <br>
                                <p>Price</p>
                            </div>
                        </div>

                        <div class="grid-items">
                            <div class="image">
                                <img src="images/products/multimeter.jpg" alt="multimeter">
                            </div>

                            <div class="productdesc">
                                <a href=""><h4>SANWA DIGITAL MULTIMETER CD800A</h4></a>
                                
                                <br>
                                <p class="productpara">
                                Capacitance measurement

                                Not suitable for measurement of condensers with large leak current.

                                Frequency measurement (AC sine wave only)

                                Data hold / Range hold

                                Relative value

                                Auto power off (30min.) (cancelable)

                                Low power ohm (input voltage 0.4V) at continuity range                            
                                <br>
                                <p>Price</p>
                            </div>


                        </div>

                        <div class="grid-items">
                            <div class="image">
                                <img src="images/products/batterycharger.jpg" alt="batterycharger">
                            </div>

                            <div class="productdesc">
                                <a href=""><h4>INGCO 12V 2HR BATTERY CHARGER FCLI12071</h4></a>
                                
                                <br>
                                <p class="productpara">
                                Charge volts: 220V-240V~50/60Hz

                                Charging time:2Hr charger

                                Packed by color box
                                </p>
                            
                                <br>
                                <p>Price</p>
                            </div>

                        </div>

                        <div class="grid-items">
                            <div class="image">
                                <img src="images/products/electricadapter.jpg" alt="electricadapter">
                            </div>

                            <div class="productdesc">
                                <a href=""><h4>MASTERPLUG RCD ADAPTOR 13A (30MA)</h4></a>
                                
                                <br>
                                <p class="productpara">
                                Added protection against electric shock.

                                Non-Latching Operation

                                13A Max Load

                                30mA Trip Current

                                40m/sec Trip Speed
                            </p>
                            
                                <br>
                                <p>Price</p>
                            </div>
                        </div> -->

                    </div>

            
            <?php
            break;
            case "new":
            ?>
                    <div style="display: <?php echo $visible; ?>;" class="grid-container">


                                <?php While ( $one_product= mysqli_fetch_assoc($product_list)  ) { ?>
                                    
                                    <div class="grid-items">
                                        <div class="image">
                                            <img src="<?php echo $one_product['picture']; ?>" alt="">
                                        </div>
                                        <div class="productdesc">
                                            <a class="productname" href="product_details.php?id=<?php echo $one_product['id'] ?>"><h4><?php echo $one_product['name']; ?></h4></a> 
                                            <br>
                                            <p class="productpara">
                                                <?php echo $one_product['description']; ?>
                                            </p>
                                            
                                            <br>
                                            <p class="productprice">Price:$<?php echo $one_product['price']; ?></p>
                                        </div>
                                    </div>
    
                                <?php } ?>

                            <!-- <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/chem1.jpg" alt="chem1">
                                </div>
                                <div class="productdesc">
                                    <a href=""><h4>303 ULTRA CONCENTRATED CAR WASH BOTTLE 18OZ/532ML</h4></a> 
                                    <br>
                                    <p class="productpara">
                                    Leaves a clean, streak free shine.

                                    pH neutral – won’t strip wax or coatings.

                                    Ultra-Concentrated (Use only 1oz. to 5 gallons of water)

                                    High foam formula.

                                    Provides a deep gloss finish

                                    Great bubble gum scent. Made in the U.S.A.
                                    </p>
                                    
                                    <br>
                                    <p>Price</p>
                                </div>
                            </div>

                            <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/chem2.jpg" alt="chem2">
                                </div>

                                <div class="productdesc">
                                    <a href=""><h4>CL FUNGUS CLEANER 4L WATER BASED FUNGUS & ALGAE REMOVER</h4></a>
                                    
                                    <br>
                                    <p class="productpara">
                                    CL-FUNGUS CLEANER is an inorganic water based fungus and algae remover.

                                    Upon contact, the fungus cleaner will dissolve and kill the fungus and algae.

                                    CL-Fungus Cleaner has no effect on the substrate being treated and it is also non-toxic.
                                        
                                    </p>
                                
                                    <br>
                                    <p>Price</p>
                                </div>


                            </div>

                            <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/chem3.jpg" alt="chem3">
                                </div>

                                <div class="productdesc">
                                    <a href=""><h4>THREEBOND SUPER CLEANER-TB6602T</h4></a>
                                    
                                    <br>
                                    <p class="productpara">
                                    THREEBOND SUPER CLEANER-TB6602T

                                        It is an effective detergent generally used for most industrial application.

                                        It removes grease, oil, dust, adhesive, pigment and foreign material.

                                        It can also be used on metal mould, which can be applied to cleaning mould during maintence, repairing or changing material.
                                                            </p>
                                
                                    <br>
                                    <p>Price</p>
                                </div>

                            </div>

                            <div class="grid-items">
                                <div class="image">
                                    <img src="images/products/chem4.jpg" alt="chem4">
                                </div>

                                <div class="productdesc">
                                    <a href=""><h4>WD40 3-IN-ONE® PROFESSIONAL AIR CONDITIONER CLEANER 331ML (SUMMER)</h4></a>
                                    
                                    <br>
                                    <p class="productpara">
                                    3-In-One Professional Air-Conditioner Clearner is a water based cleaning agent which dissolves grease, dirt, fungi, mold and other build-up from the cooling coils of your air-conditioners.

                                    After cleaning and fresher air from your air-condioner will cool faster, thus saving electricity.

                                    You will also experience cleaner and fresher air from your air-conditioner.


                                    </p>
                                
                                    <br>
                                    <p>Price</p>
                                </div>
                            </div> -->

                    </div>
            <?php
            break;
            ?>

            <?php
            
            }
                
        ?>


        <!-- <div class="grid-container">

            <div class="grid-items">
                <div class="image">
                    <img src="images/products/product1.jpg" alt="">
                </div>
                <div class="productdesc">
                    <a href=""><h4>DEWALT 18V 4.0AH XR BRUSHLESS HAMMER DRILL DRIVER DCD796M2</h4></a> 
                     <br>
                     <p class="productpara">
                         The DEWALT DCD796 XR Brushless Compact Hammer Drill Driver has an ultra compact, lightWeight design that makes it perfect for use in confined spaces.

                        The two speed all metal transmission provides increased runtime and longer tool life with drill driver and hammer features for multiple applications
                     </p>
                    
                     <br>
                     <p>Price</p>
                 </div>
            </div>

            <div class="grid-items">
                <div class="image">
                    <img src="images/products/product2.jpg" alt="">
                </div>

                <div class="productdesc">
                    <a href=""><h4>DEWALT HD 5KG ANTI-VIBRATION BREAKER 17MM HEX D25811K</h4></a>
                    
                    <br>
                    <p class="productpara">
                        Ideal for light demolition, surface or preparation chiselling grooves, channels openings etc in brick, masonry and light concrete.

                        Demolition application in concrete and stone
                        
                        Electronic speed and impact energy control for use in delicate/lighter materials
                    </p>
                   
                    <br>
                    <p>Price</p>
                </div>


            </div>

            <div class="grid-items">
                <div class="image">
                    <img src="images/products/product3.jpg" alt="">
                </div>

                <div class="productdesc">
                    <a href=""><h4>DEWALT 13MM (1/2") IMPACT DRILL, 650W, DWD024</h4></a>
                    
                    <br>
                    <p class="productpara">
                        L
                        Lock on button gives the user the option to keep the machine continually running when doing repetitive operations
       
                    </p>
                   
                    <br>
                    <p>Price</p>
                </div>

            </div>

            <div class="grid-items">
                <div class="image">
                    <img src="images/products/product4.jpg" alt="">
                </div>

                <div class="productdesc">
                    <a href=""><h4>DEWALT 22MM (7/8") SDS+ ROTARY HAMMER, 710W, D25033K</h4></a>
                    
                    <br>
                    <p class="productpara">
                        Ideal for drilling anchor and fixing holes into concrete and masonry from 4 to 22 mm in diameter

                        Rotation-stop for light chiselling applications in brick, soft masonry and occasionally concrete

                        Impact-stop for drilling in wood, steel, ceramic and screwdriving applications
                    </p>
                   
                    <br>
                    <p>Price</p>
                </div>
            </div>

        </div>  -->

    </section>



    <footer class="footer">
        <div class="footer1">
            <a href="index.html"><img src="images/horme/hormelogo.png" alt="logo">
                <img class='qr' src="images/horme/hormeqr.png" alt="qr">
            </a>
            </div>

        <div class="footer-container">
        <div class="footer2">
            <ul>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="locate.html">Locate Us</a></li>
            </ul>
        </div>

        <div class="footer3">
            <ul>
                <li><a href="contact.html">Contact Us</a></li>
                <!-- <li><a href="contact.h">FAQ</a></li> -->
                <li><a href="orders.html">Orders</a></li>
            </ul>
        </div>

        <div class="footer4">
            <ul>
                <li><a href="https://www.instagram.com/horme.sg/?hl=en">Instagram</a></li>
                <li><a href="https://www.facebook.com/HormeHardware/">Facebook</a></li>                
                <li><a href="https://twitter.com/horme_sg?lang=en">Twitter</a></li>
            </ul>
        </div>
        </div>

        <div class="footer5">
            <p>1 Ubi Crescent <br>Number One Building <br> Singapore 408563 </p>
            <img class='qr' src="images/horme/hormeqr.png" alt="qr">
        </div>

    </footer>



    <script src="js/"></script>

</body>
</html>