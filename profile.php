<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/profile.css">
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
<main>

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
    <div class="banner">
        <img src="images/nyancat.gif" alt="profile picture">
    </div>
</div>

<div class='category'>
            <ul>
                <li><a href="profile.php?update=email">Email</a></li>
                <li><a href="profile.php?update=password">Password</a></li>
                <li><a href="profile.php?update=username">Username</a></li>
                <li><a href="profile.php?update=mobile">Mobile</a></li>
                <li><a href="profile.php?update=address">Address</a></li>
                <li><a href="profile.php?update=logout">Logout</a></li>
            </ul>
            
</div>

<div>
    <?php $item = isset($_GET['update']) ? $_GET['update'] : ''; ?>
    <form id="registerform" action="actionpage.php?action=profile&action2=<?php echo $item ?>" method="POST">

    <?php

        
        $visible = "flex";
        switch ($item)
        {
            case "email":                        
            ?>
            <fieldset style="display: <?php echo $visible ?>;">
                <legend>Update Email</legend>

                
                <div class="labels">

                    <label class="registerlabels" for="oemail">Old Email:</label><br>
                    <label class="registerlabels" for="nemail">New Email:</label><br>
                </div>

                <div class="inputs">
                    <input class="registerinputs" type="text" name="oemail" id="oemail"><br>
                    <input class="registerinputs" type="text" name="nemail" id="nemail">
                </div>

                
                
            
            </fieldset> 
            
            <fieldset class="confirmation">
                <legend>Confirm changes</legend>
                <label for="cpassword">Confirm Password</label>
                <input type="cpassword" name="cpassword" id="cpassword">
                <input type="submit" value="Update Account">  
                <?php

                    $status = isset($_GET['status']) ? $_GET['status'] :'';
                    if($status == 'pass')
                    {
                        echo "Succesfully Updated";
                    }
                    else if ($status == 'fail')
                    {   
                        echo "Failed To Update";
                    }
                ?>
                
            
            </fieldset>
                    
            <?php            
            break;
            case "password":
            ?>

            <fieldset style="display: <?php echo $visible ?>;">
                <legend>Update Password</legend>

                
                <div class="labels">

                    <label class="registerlabels" for="opw">Old Password:</label><br>
                    <label class="registerlabels" for="npw">New Password:</label><br>
                </div>

                <div class="inputs">
                    <input class="registerinputs" type="password" name="opw" id="opw"><br>
                    <input class="registerinputs" type="password" name="npw" id="npw">
                </div>
        

            </fieldset>

            <fieldset class="confirmation">
                <legend>Confirm changes</legend>
                <label for="cpassword">Confirm Password</label>
                <input type="cpassword" name="cpassword" id="cpassword">
                <input type="submit" value="Update Account">  
                <?php
                
                    $status = isset($_GET['status']) ? $_GET['status'] :'';
                    if($status == 'pass')
                    {
                        echo "Succesfully Updated";
                    }
                    else if ($status == 'fail')
                    {   
                        echo "Failed To Update";
                    }
                ?>
                
            
            </fieldset>
            
            <?php
            break;
            case "username":
            ?>

            <fieldset style="display: <?php echo $visible ?>;">
                <legend>Update Username</legend>

                
                <div class="labels">

                    <label class="registerlabels" for="ousename">Old Username:</label><br>
                    <label class="registerlabels" for="nusername">New username:</label><br>
                </div>

                <div class="inputs">
                    <input class="registerinputs" type="email" name="email" id="ousename"><br>
                    <input class="registerinputs" type="email" name="opw" id="nusername">
                </div>
        

            </fieldset>

            <fieldset class="confirmation">
                <legend>Confirm changes</legend>
                <label for="cpassword">Confirm Password</label>
                <input type="cpassword" name="cpassword" id="cpassword">
                <input type="submit" value="Update Account">  
                <?php
                
                    $status = isset($_GET['status']) ? $_GET['status'] :'';
                    if($status == 'pass')
                    {
                        echo "Succesfully Updated";
                    }
                    else if ($status == 'fail')
                    {   
                        echo "Failed To Update";
                    }
                ?>
                
            
            </fieldset>
                    
            <?php
            break;
            case "mobile":
            ?>
            <fieldset style="display: <?php echo $visible ?>;">
                <legend>Update Mobile</legend>

                
                <div class="labels">

                    <label class="registerlabels" for="ousename">Old Mobile:</label><br>
                    <label class="registerlabels" for="nusername">New Mobile:</label><br>
                </div>

                <div class="inputs">
                    <input class="registerinputs" type="email" name="email" id="ousename"><br>
                    <input class="registerinputs" type="email" name="opw" id="nusername">
                </div>
        

            </fieldset>

            <fieldset class="confirmation">
                <legend>Confirm changes</legend>
                <label for="cpassword">Confirm Password</label>
                <input type="cpassword" name="cpassword" id="cpassword">
                <input type="submit" value="Update Account">  
                <?php
                
                    $status = isset($_GET['status']) ? $_GET['status'] :'';
                    if($status == 'pass')
                    {
                        echo "Succesfully Updated";
                    }
                    else if ($status == 'fail')
                    {   
                        echo "Failed To Update";
                    }
                ?>
                
            
            </fieldset>


            <?php
            break;
            case "address":
            ?>

            <fieldset style="display: <?php echo $visible ?>;">
                <legend>Update Address</legend>

                
                <div class="labels">

                    <label class="registerlabels" for="address">New Address:</label><br>
                </div>

                <div class="inputs">
                    <textarea name="address" id="address" cols="30" rows="10"></textarea>
                </div>
        

            </fieldset>

            <fieldset class="confirmation">
                <legend>Confirm changes</legend>
                <label for="cpassword">Confirm Password</label>
                <input type="cpassword" name="cpassword" id="cpassword">
                <input type="submit" value="Update Account">  
                <?php
                
                    $status = isset($_GET['status']) ? $_GET['status'] :'';
                    if($status == 'pass')
                    {
                        echo "Succesfully Updated";
                    }
                    else if ($status == 'fail')
                    {   
                        echo "Failed To Update";
                    }
                ?>
                
            
            </fieldset>

            <?php
            break;
            case "logout":                    
            ?>

            <fieldset style="display: <?php echo $visible ?>;">
                <legend>Logout</legend>


                <input type="submit" value="Logout">

                
                
                
            </fieldset>

            <?php
            break;
        }
    
    ?>

    

    </form>
</div>




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

</main>
</body>

</html>