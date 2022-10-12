<?php
session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');


if(isset($_GET['id'])){

    $query = "SELECT * FROM tbl_products WHERE id = $_GET[id]";
    $result = $pdo->query($query);
    $row = $result->fetch();


?>
<style>
   .prod_details{
       text-align:center;
   }
    .cart-action{
        background-color:transparent;
        margin:10px;
        
    }
    .product-quantity {
        background-color:white;
        width:50px;
        height:50px;

    }
    .btnAdd {
        background-color:white;
        width:100px;
        height:50px;
    }
    .btnAdd:hover{
        background-color:gold;
        color:white;
    }
    .infobox
    {
        background-color:whitesmoke;
        text-align:center;
        border-radius:20px;
    }
    .info
    {
        border-bottom:1px solid grey;
    }
    
</style>

     <div class="prod_details">
        <form method="post" action="cart.php?action=add&code=<?php echo $row["product_code"]; ?>&id=<?php echo $row['id'];?>">
        <div class="Pimg">
            <img src="<?php echo $row['product_image'] ;?>" width="300px" height="300px"/>
            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
        </div>
        <div class="infobox">
        <h2 class="info"><?php echo $row['product_name'] ?></h2>
        <h4 class="info">RM <?php echo $row['product_price'] ?></h4>
        <h4 class="info"><?php echo $row['product_description'] ?></h4>
        <h4 class="info">Stock Availability : <?php echo $row['product_qty'] ?></h4>
        </div>
</form>
    </div>



<?php

}

?>
