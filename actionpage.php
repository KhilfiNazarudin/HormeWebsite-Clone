<?php

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo $action;
switch($action)
{
	case "login":
		

		session_start();
		//LOGIN PHP

		$u = isset($_POST['username']) ? $_POST['username'] : '' ;   // name of the input field is ’username’
		$p = isset($_POST['password']) ? $_POST['password']: '' ;
		
		$conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );	

		echo $u;
		echo $p;

		$sql = "SELECT * FROM `userinfo` WHERE `name` = '$u' AND `pass`='$p'  " ; 
		$search_result = mysqli_query($conn , $sql);    // search table NOW!

		// Return the number of rows in search result
		$userfound = mysqli_num_rows($search_result);
		echo $userfound;

		if($userfound >= 1)    
			{
				// User record is found in the userinfo table
				session_start();
				$_SESSION['shopuser'] = $u;
				header("Location:index.php");  	// go to main.php


			}
			else     
			{
				// User record is NOT found in the userinfo table
				header("Location:login.php?state=nouser");  	// go back to login page
			}

	break;
	
	case "addtocart":
		session_start();
		$username = isset($_SESSION['shopuser']) ? $_SESSION['shopuser'] : '';
		$conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );
		//ADD TO CART PHP
		$pname = $_POST['pname'];
		$pcost = $_POST['pcost'];
		$pimg = $_POST['pimg'];


		$sql_ = "INSERT INTO `cart` (cname, ccost, cimage, username) VALUES ('$pname' , '$pcost', '$pimg', '$username' )" ;


		
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
				
			}
		
		
	break;

	case "updatecart":
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
		}
	break;

	case "profile":
		$conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );
		$action2 = isset($_GET['action2']) ? $_GET['action2'] : "";
		switch($action2)
		{
			case "email":

				$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
				$nemail = isset($_POST['nemail']) ? $_POST['nemail'] : '';
				$oemail = isset($_POST['oemail']) ? $_POST['oemail'] : '';
				if($cpassword != '' )
				{
					$search_email = "SELECT * FROM `userinfo` WHERE `email` = '$oemail' ";
					if(mysqli_num_rows(mysqli_query($conn,$search_email)) >= 1)
					{
						$update = "UPDATE `userinfo` SET `email`= '$nemail'
						WHERE `email` = '$oemail'";
						mysqli_query($conn,$update);
						header("Location:profile.php?status=pass&update=$action2");
					}
					else
					{
						header("Location:profile.php?status=fail&update=$action2");

					}
				}
				else
				{
					header("Location:profile.php?status=fail&update=$action2");
				} 
			break;

			case "password":
				$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
				$npw = isset($_POST['npw']) ? $_POST['npw'] : '';
				$opw = isset($_POST['opw']) ? $_POST['opw'] : '';
				if($cpassword != '' )
				{
					$search_opw = "SELECT * FROM `userinfo` WHERE `pass` = '$opw' ";
					if(mysqli_num_rows(mysqli_query($conn,$search_opw)) >= 1)
					{
						$update = "UPDATE `userinfo` SET `pass`= '$npw'
						WHERE `pass` = '$opw'";
						mysqli_query($conn,$update);
						header("Location:profile.php?status=pass&update=$action2");
					}
					else
					{
						header("Location:profile.php?status=fail&update=$action2");

					}
				}
				else
				{
					
					header("Location:profile.php?status=fail&update=$action2");
				} 
			break;

			case "username":
				$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
				$npw = isset($_POST['npw']) ? $_POST['npw'] : '';
				$opw = isset($_POST['opw']) ? $_POST['opw'] : '';
				if($cpassword != '' )
				{
					$search_opw = "SELECT * FROM `userinfo` WHERE `pass` = '$opw' ";
					if(mysqli_num_rows(mysqli_query($conn,$search_opw)) >= 1)
					{
						$update = "UPDATE `userinfo` SET `pass`= '$npw'
						WHERE `pass` = '$opw'";
						mysqli_query($conn,$update);
						header("Location:profile.php?status=pass&update=$action2");
					}
					else
					{
						header("Location:profile.php?status=fail&update=$action2");

					}
				}
				else
				{
					
					header("Location:profile.php?status=fail&update=$action2");
				}
			break;

			case "mobile":
			break;

			case "address":
			break;

			case "logout":
				session_start();
				session_destroy();
				echo "logged out";
			break;

		}
	break;

	case "register":
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
		$picture = isset($_FILES['picture']) ? $_FILES['picture'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$picturename = $picture['name'];
		echo "pass ";
		echo $email . $username . $address . $mobile . $picturename . $password;	

		$conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );	
		$target = 'images/profile_pictures/' . $username .'_' .$picturename;

		$insertion = "INSERT INTO `userinfo`
		(`name`, `pass`, `email`, `mobile`, `address`,`picture`)
		VALUES 
		('$username','$password','$email','$mobile','$address','$picturename')";
		mysqli_query($conn,$insertion);
		move_uploaded_file($picture['tmp_name'],$target);
		header("Location:login.php?state=registered");


	break;

	case "checkout":
		session_start();
		$username = isset($_SESSION['shopuser']) ? $_SESSION['shopuser'] : '';
		$conn = mysqli_connect("localhost", "root", "","l2_khilfi_database" );
		$filter = " WHERE `username` = '$username'";

		if($username == '')
		{
			header("Location:login.php?state=cart");
		}
		else
		{	
			$orderid = 0;
			$getorderid = "SELECT `orderid` FROM `transact` ORDER BY `orderid` DESC LIMIT 1";
			$order  = mysqli_fetch_assoc(mysqli_query($conn,$getorderid));
			$orderid = intval($order['orderid'] + 1);			
			$insertid = "UPDATE `cart` SET `orderid`= '$orderid'";
			mysqli_query($conn , $insertid);
			$insertion = "INSERT INTO `transact` (`orderid`,`cname`, `ccost`, `qty`, `cimage`, `username`, `dated`)
			SELECT `orderid`,`cname`, `ccost`, `qty`, `cimage`, `username`, `dated` FROM `cart`" .$filter;
			mysqli_query($conn,$insertion);
			$removal ="DELETE FROM `cart`" .$filter;
			mysqli_query($conn,$removal);
		}
		
	break;
}
	

?>