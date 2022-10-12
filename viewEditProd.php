<?php

session_start();


require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');

$query = "SELECT * FROM tbl_products ORDER BY id ASC";
$result = $pdo->query($query);
$productRow = $result->fetchAll();

?>
<style>
    h2{text-align:center;}
    .tbl2 table{
        border-collapse:collapse;
    }
    tr{
        background-color:white;
    }
    th{
        background-color: whitesmoke;
        border-bottom:1px solid grey;
    }
    .bton {
        background-color:turquoise;
        padding:6px;
        border-radius:5px;
        text-decoration: none;
        color:black;
    }
    .bton:hover,.bton1:hover{
        background-color: gold;
        color:black;

    }
    .bton1 {
        background-color:red;
        padding:6px;
        border-radius:5px;
        text-decoration: none;
        color:white;
    }
    div{
        text-align:center;
        display:flex;
        justify-content:center;
       
    }
</style>

<h2>Available Products</h2>

<div>
<table name="tbl2"  cellpadding="10" cellspacing="2">
    <tr>
        <th class="pid">Product ID</th>
        <th>Product Thumbnail</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Product Price</th>
        <th>Category</th>
        <th>Available stock (QTY)</th>
        <th>Product Filter</th>
        <th>Product Description</th>
        <th>Edit Product Data</th>
        <th>Remove Product</th>
    </tr>

<?php

foreach($productRow as $key => $value){

?>


    <tr>
        <td><?php echo $productRow[$key]['id'] ;?></td>
        <td><img src="<?php echo $productRow[$key]['product_image'] ;?>" width="50px" height="40px"/></td>
        <td><?php echo $productRow[$key]['product_name'] ;?></td>
        <td><?php echo $productRow[$key]['product_code'] ;?></td>
        <td><?php echo $productRow[$key]['product_price'] ;?></td>
        <td><?php echo $productRow[$key]['product_category'] ;?></td>
        <td><?php echo $productRow[$key]['product_qty'] ;?></td>
        <td><?php echo $productRow[$key]['product_filter'] ;?></td>
        <td><?php echo $productRow[$key]['product_description'] ;?></td>
        <td><a class="bton" href="EditProd.php?id=<?php echo $productRow[$key]['id']?>">Edit</a></td>
        <td><a class="bton1" href="DeleteProduct.php?id=<?php echo $productRow[$key]['id']?>" onclick="alert('Product will be removed.')">Remove</a></td>

    </tr>


<?php }?>
</table>
</div>