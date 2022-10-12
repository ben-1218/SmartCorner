<?php

session_start();

require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');

?>
<style>
    .pitem{
    display:flex;
    flex-wrap:wrap;
    float:left;
    margin:10px;
    border:1px solid grey;
    }
   
    .pname,.pprice{
    background-color:
    }
    .pimgbox{
	height: 155px;
	width: 250px;
	background-color: #FFF;

 }
 .headerp{
    background-color:#d8d8ac;
    background-image:linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%);; width: 300px; text-align:center;padding:4px; border-radius:3px;
 }

 .pitem{
    margin:4px;border-radius:6px;
 }
 .pimage:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
 }
 .cart-action {
    background-color: whitesmoke;
    padding:3px;
    border-radius:6px;
    }
    input{
    background-color:transparent;
    padding:3px;
    width:100px;
    }
    input:hover{
    background-color:grey;
    color:white;    
    }
    .pname,.pprice{
        background-color:#d8d8ac;
    background-image:linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%);text-align:center;padding:4px; border-radius:3px;
    }
  
    .pimage:hover {
  -ms-transform: scale(1.3); /* IE 9 */
  -webkit-transform: scale(1.3); /* Safari 3-8 */
  transform: scale(1.3); }
</style>
<?php
if(!empty($_GET['page']))
{
 switch ($_GET['page'])
 {
    case "PlugS":
        $query="SELECT * FROM tbl_products WHERE product_category='plugswitches'";
        $result=$pdo->query($query);
        $row = $result->fetchAll();
        echo "<h2 class='headerp'>Plug & Switches</h2>";
        foreach($row as $key=>$value){  ?>
            
            <div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="300px" height="300px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM ".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" />
                        
            </div>
                        
			</form>
		</div>
         
 <?php   
        }

    break;
    case "KitchenW":
    $query="SELECT * FROM tbl_products WHERE product_category='kitchenware'";
        $result=$pdo->query($query);
        $row = $result->fetchAll();
        echo"<h2 class='headerp'>Kitchenware</h2>";
        foreach($row as $key=>$value){  ?>
            
            <div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="300px" height="300px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM ".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>
		</div>
         
 <?php   
        }
    break;
    case "Lighting":
    $query="SELECT * FROM tbl_products WHERE product_category='lighting'";
        $result=$pdo->query($query);
        $row = $result->fetchAll();

        echo "<h2 class='headerp'>lighting</h2>";

        foreach($row as $key=>$value){  ?>
            
            <div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="300px" height="300px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM ".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>
		</div>
         
 <?php   
        }

    break;
    case "Speakers":
    $query="SELECT * FROM tbl_products WHERE product_category='speakers'";
        $result=$pdo->query($query);
        $row = $result->fetchAll();
        echo "<h2 class='headerp'>Speakers</h2>";

        foreach($row as $key=>$value){  ?>

            <div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="300px" height="300px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM ".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>
		</div>
         
 <?php   
        }

    break;
    case "ElectricH":
    $query="SELECT * FROM tbl_products WHERE product_category='electrichousehold'";
        $result=$pdo->query($query);
        $row = $result->fetchAll();
        echo "<h2 class='headerp'>Electric Household</h2>";

        foreach($row as $key=>$value){  ?>

            <div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="300px" height="300px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM ".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>
		</div>
         
 <?php   
        }

    break;
    case "BathroomS":
    $query="SELECT * FROM tbl_products WHERE product_category='bathroomseries'";
        $result=$pdo->query($query);
        $row = $result->fetchAll();
        echo "<h2 class='headerp'>Bathroom Series</h2>";

        foreach($row as $key=>$value){  ?>

            <div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="300px" height="300px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM ".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>
		</div>
         
 <?php   
        }

    break;}}
        ?>


 