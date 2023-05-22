<?php
session_start();
$username = isset($_SESSION['shopuser']) ? $_SESSION['shopuser'] : '';
$conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );	


//ADD TO CART PHP
$pname = $_POST['pname'];
$pcost = $_POST['pcost'];
$pimg = $_POST['pimg'];


$sql_ = "INSERT INTO `cart` (cname, ccost, cimage, username) VALUES ('$pname' , '$pcost', '$pimg', '$username' )" ;


if($username != "")
{
    $result = mysqli_query($conn , $sql_);

    if($result)
    {
        echo "Add to cart succesfully";
        // alert("Add to cart succesfully");
        header("Location:index.php");
    }
    else
    {
        echo "Failed to add to cart";
        echo $sql_;
        header("Location:main.php");
    }
}
else
{
    echo "Login Failed";
    //header("Location:login.php?fail=3");
}

?>