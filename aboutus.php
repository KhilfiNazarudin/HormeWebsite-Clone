<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us page</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/aboutus.css">

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

    <section id="section-content">
        <div id="heading">About Us</div>

        <div id="para1">
            <p>
                Horme Hardware is the largest Home Improvement & DIY hardware supplier in Singapore with over 100,000 SKU covering 21 categories. There are currently 4 trade centres at Ubi, Changi, Buroh and Woodlands. The Ubi outlet is also Singapore's largest DIY hardware store standing at 10,000 square feet. Horme Hardware is an authorised supplier for the government sector in GeBiz covering "Domestic Equipment & Supplies" and "Hardware & Tools" with S8 financial grade. 
            </p>  
            <br>

            <p>
                Other than the government sector, we also serve engineering, construction, hospitality, facilities management and end consumers. Horme Hardware holds a BizSafe Level 4 certification under WSH Council BizSafe programme too, in line with the company's emphasis on Safety.

                ｢Ingco By Horme｣ located at 345 Changi Road is the 1st concept store by Horme Hardware with the help from Ingco Singapore. Managed by Horme Changi Team which is in close proximity. 
            
            </p>
                
        </div>

        <div id="heading2">History,Values & Mission</div>

        

        <div id="content">

            <div style="width: 40%;">

                <div class="paragraphs">
                    <p>
                        Our History
                    </p>
                    <br>
                    
                        <p>                        Horme Hardware Pte Ltd evolved from the restructuring of household brand Homely Hardware Pte Ltd. Though new in name, the amazing team in Horme Hardware has come a long way to where we are today, from a humble DIY hardware store to one of the largest Home Improvement & DIY hardware chain in Singapore. 
                        </p>
                        <br>
                        <p>                       Seeing the potential in the digital space, Horme Hardware started the ecommerce platform in 2013 and become one of the first to bring their brick-and-motar business online in the hardware trade. Today, Horme Hardware Online has successful become the Singapore's favourite home improvement site with over 200K monthly visitors.
                        </p>
                    
                </div>

                <div class="paragraphs">
                    <p>
                        Our vision
                    </p>
                    <br>
                    <p>
                        Become Asia's leading integrated provider of home improvement, DIY hardware, and logistics connecting all local markets.                    </p>
                </div>
            </div>

            <div style="width: 40%;">
            
                <div class="paragraphs">
                    <p>
                        Our mission
                    </p>
                    <br>
                    <p>
                        To create valuable alliances and rewarding collaborations with our business partners through innovative solutions, and be the biggest one-stop DIY hardware & General Supplies Online megamall.
                    </p>
                </div>

                

                <div class="paragraphs">
                    <p>
                        Our core values
                    </p>
                    <br>
                    <p>
                        <b>H</b>onesty: Treating everyone fairly, genuinely and sincerely
                        <br><br>
                        <b>O</b>ownership: Responsible for one's duties to the best effort.
                        <br><br>
                        <b>R</b>eliability: Availability of information and support.
                        <br><br>
                        <b>M</b>itigation: Safety and risks management.
                        <br><br>
                        <b>E</b>fficiency: Fastest and leanest solutions.

                    </p>
                </div>
            
            </div>

            

        

        </div>

        <div id="content2" ">
            <img src="images/horme/Horme_Def.jpg" alt="">
        </div>

        <div class="paragraphs2">
            <p>
                Our History
            </p>
            <br>
            
                <p>                        Horme Hardware Pte Ltd evolved from the restructuring of household brand Homely Hardware Pte Ltd. Though new in name, the amazing team in Horme Hardware has come a long way to where we are today, from a humble DIY hardware store to one of the largest Home Improvement & DIY hardware chain in Singapore. 
                </p>
                <br>
                <p>                       Seeing the potential in the digital space, Horme Hardware started the ecommerce platform in 2013 and become one of the first to bring their brick-and-motar business online in the hardware trade. Today, Horme Hardware Online has successful become the Singapore's favourite home improvement site with over 200K monthly visitors.
                </p>
            
        </div>

        <div class="paragraphs2">
            <p>
                Our vision
            </p>
            <br>
            <p>
                Become Asia's leading integrated provider of home improvement, DIY hardware, and logistics connecting all local markets.                    </p>
        </div>

        <div class="paragraphs2">
            <p>
                Our mission
            </p>
            <br>
            <p>
                To create valuable alliances and rewarding collaborations with our business partners through innovative solutions, and be the biggest one-stop DIY hardware & General Supplies Online megamall.
            </p>
        </div>

        

        <div class="paragraphs2">
            <p>
                Our core values
            </p>
            <br>
            <p>
                <b>H</b>onesty: Treating everyone fairly, genuinely and sincerely
                <br><br>
                <b>O</b>ownership: Responsible for one's duties to the best effort.
                <br><br>
                <b>R</b>eliability: Availability of information and support.
                <br><br>
                <b>M</b>itigation: Safety and risks management.
                <br><br>
                <b>E</b>fficiency: Fastest and leanest solutions.

            </p>
        </div>

    </div>




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
    
</body>
</html>