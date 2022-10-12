<?php
Session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');

if(isset($_POST['proceed'])){

    

    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $totalCost = $_POST['totalCost'];
    $phonenum = $_POST['phone'];

    foreach($_SESSION['cart_item'] as $item)
    {
        
       $code = $item['code'];
       $qty = $item['quantity'];
       $query = "UPDATE `tbl_products` SET `product_qty` = `product_qty` - $qty WHERE product_code = '$code'";
       $result= $pdo->query($query); 
    }

    $query1="INSERT INTO tbl_sales(id,username,email,fullname,phoneNum,HomeAddress,totalCost) VALUES (NULL,'$username','$email','$fullname','$phonenum','$address','$totalCost')";
    $result1=$pdo->query($query1);
    unset($_SESSION['cart_item']);
}


?>
<style>
    h2{
        text-align:center;
        
    }
   .link {
        text-decoration:none;
        background-color: brown;
        color:whitesmoke;
        border-radius:6px;
        padding:7px;
    }
    .ty{
        border:3px solid black;

    }
</style>
<div class="ty">
<h2>Thank you for choosing us!</h2>
<h2><a class="link" href="dashboard.php">Continue Shopping</a></h2>
</div>