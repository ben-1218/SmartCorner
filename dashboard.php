<?php

session_start();

if(!isset($_SESSION['id'],$_SESSION['user_role_id']))
{
    header('location:index.php');
    exit;
}		

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');

$query = "SELECT * FROM tbl_products WHERE product_filter= 'New Arrivals' ";
$result = $pdo->query($query);
$row = $result->fetchAll();


?>
<style>
    .banner-area{
        background-image: url(css/images/banner.png);
        background-size: cover;
        background-position: center;
        height: 250px;
        width: 100%;
        position:relative;
    }
    .NA{background-color:#d8d8ac;
    background-image:linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%);; width: 300px; text-align:center;padding:4px; border-radius:3px;
    }
    .TS{background-color:#d8d8ac;
    background-image:linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%);; width: 300px; text-align:center;padding:4px; border-radius:3px;
    clear:both;
    }
    .container{
        justify-self:center;
        display:flex;
        flex-wrap:wrap;
        float:left;
        margin:10px;
        border-radius:20px;
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
    .content{
        margin:25px;
     
    }
    .pimage:hover {
  -ms-transform: scale(1.3); /* IE 9 */
  -webkit-transform: scale(1.3); /* Safari 3-8 */
  transform: scale(1.3); 
}


</style>


<div class="banner-area">
</div>
<div class="content">
<h2 class="NA">New Arrivals</h2>



<?php foreach($row as $key=>$value){ ?>
<div class="container">
<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>"width="250px"height="250px" ></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM".$row[$key]['product_price']; ?></div>
         
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>

</div>

<?php
}
?>

<h2 class="TS" >Top Sales</h2>

<?php

$myquery = "SELECT * FROM tbl_products WHERE product_filter='Top Sales'  ";
$myresult = $pdo->query($myquery);
$myrow = $myresult->fetchAll();

foreach($myrow as $key=>$value){
?>

<div class="container">
<form method="post" action="cart.php?action=add&code=<?php echo $myrow[$key]["product_code"]; ?>&id=<?php echo $myrow[$key]['id'];?>">
			<a href="product.php?id=<?php echo $myrow[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $myrow[$key]['product_image']; ?>" width="250px" height="250px" ></div></a>
			<div class="pname"><?php echo $myrow[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM".$myrow[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>


</div>
</div>
<?php
}

    
  


 include("layout/footer.php");?>

    
