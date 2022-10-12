<?php
session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');





?>

<style>
 .allp{background-color:#d8d8ac;
    background-image:linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%); width: 300px; text-align:center;
    padding:4px; border-radius:3px;}

 .product-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;


 }
 .pimgbox{
	height: 155px;
	width: 250px;
	background-color: #FFF;

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
  transform: scale(1.3); 
    }
    footer{
        overflow:0;
    }
</style>

<h2 class="allp">All products</h2>

 <div class="product-container">
<?php


//product part -------

$query = "SELECT * FROM tbl_products ";
$result = $pdo->prepare($query);
$result->execute();

$row = $result->fetchAll();

foreach ($row as $key=> $value){

?>

<div class="pitem">
			<form method="post" action="cart.php?action=add&code=<?php echo $row[$key]["product_code"]; ?>&id=<?php echo $row[$key]['id'];?>">
			<a href="product.php?id=<?php echo $row[$key]['id'];?>">
            <div class="pimage"><img class="pimgbox"src="<?php echo $row[$key]['product_image']; ?>" width="250px" height="250px"></div></a>
			<div class="pname"><?php echo $row[$key]['product_name']; ?></div>
			<div class="pprice"><?php echo "RM".$row[$key]['product_price']; ?></div>
           
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" />
                        <input type="submit" name="add" value="Add to Cart" class="btnAdd" /></div>
			</form>
		</div>
        

      
 <?php   
}
?>
</div>

<?php include("layout/footer.php");?>




















