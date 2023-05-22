<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - Horme</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/products.css">

    <?php 
        session_start();
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

        $conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );
        $sql_ = "SELECT * FROM `product`";
        $product_list = mysqli_query ( $conn, $sql_);
        
        
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';

        if ( $keyword != '')
        {
            if($category != '')
            {
                $filter = " WHERE (`name` LIKE '$keyword%' OR `name` LIKE '%$keyword' OR `name` LIKE '%$keyword%') AND `category` = '$category' ";
            }
            else
            {
                $filter = " WHERE `name` LIKE '$keyword%' OR `name` LIKE '%$keyword' OR `name` LIKE '%$keyword%' ";
            }


        }
        else if(isset($_GET['category']))
        {
            $filter = " WHERE `category` = '$category'";
        }
        
        else
        {
            $filter = '';
        }
        $product_list = mysqli_query ( $conn, $sql_ . $filter);

    

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

    <?php 
        While ( $one_product = mysqli_fetch_assoc($product_list)  ) { ?>  

        <div class="item">

            <div class="image">
                <img src="<?php echo $one_product['picture']; ?>" alt="picture">
            </div>

            <div class="details">
                <p class="pname"><a href="product_details.php?id=<?php echo $one_product['id'];?>"><?php echo $one_product['name']; ?></a></p>

                <p class="pdesc"><?php echo $one_product['description']; ?></p>

                <p class="pcat">Category: <?php echo $one_product['category']; ?></p>

                <p class="pprice">Price: $<?php echo $one_product['price']; ?></p>
                
            </div>


        </div>
    <?php }?>

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
</body>
</html>