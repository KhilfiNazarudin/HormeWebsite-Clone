<?php
$pid = isset($_POST['pid']) ? $_POST['pid'] : "";
$nqty= isset($_POST['nqty']) ? $_POST['nqty'] : "";

if ($pid != "" )
{
    $conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );

    echo $sql = "UPDATE `cart` SET `qty` ='$nqty' WHERE id ='$pid' ";

    $_result = mysqli_query($conn , $sql);

    if ($_result)
    {
        header('Location:cart.php');
    }
    else
    {
        header("Location:main.php");
    }
}?>
