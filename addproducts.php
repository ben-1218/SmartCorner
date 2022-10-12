<?php

session_start();


require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');

if(isset($_POST["submit1"]))
{

 

 $fnm = $_FILES["pimage"]["name"];
 $dir = "./productImage/".$fnm;
 $dir1 = "productImage/".$fnm;
 move_uploaded_file($_FILES["pimage"]["tmp_name"],$dir);




//  $query = "INSERT INTO tbl_products(id,product_name,product_code,product_price,product_qty,product_image,product_category,product_description,product_filter)VALUES (NULL,'$_POST[pnm]','$_POST[pcode]','$_POST[pprice]','$_POST[pqty]','$dir1','$_POST[pcategory]','$_POST[pdesc]','$_POST[pfilter]')";
//  $result = $pdo->query($query);
//  if(!$result){
//      echo"failed upload";
//  }
}

?>
<link rel="stylesheet" href="css/main.css"/>

<div class = "addpbox">
    <div class="box round first">
        <h2>Add Product</h2>
        <div class="block">
        
        <form name="form1" action="" method="post" enctype="multipart/form-data">
            <table >
                <tr>
                <td>Product Name</td>
                <td><input type="text" name="pnm"></td>
                </tr>
                <tr>
                <td>Product Code</td>
                <td><input type="text" name="pcode"></td>
                </tr>
               
                <tr>
                <td>Product Price</td>
                <td><input type="text" name="pprice"></td>
                </tr>
               
                <tr>
                <td>Product Quantity</td>
                <td><input type="text" name="pqty"></td>
                </tr>
               
                <tr>
                <td>Product Image</td>
                <td><input type="file" name="pimage"></td>
                </tr>

                <tr>
                <td>Product Category</td>
                <td>
                    <select name="pcategory">
                        <option value="" disabled selected>...</option>
                        <option value="kitchenware">Kitchenware</option>
                        <option value="lighting">Lighting</option>
                        <option value="speakers">Speakers</option>
                        <option value="bathroom">Bathroom series</option>
                        <option value="plugswitches">Plug & Switches</option>
                        <option value="electrichousehold">Electric Household</option>
                </td>
                <td>Product Filter</td>
                <td>
                    <select name="pfilter">
                        <option value="Existing Product">Existing Product</option>
                        <option value="New Arrivals">New Arrivals</option>
                        <option value="Top Sales">Top Sales</option>
                </td>
                </tr>
                <tr>
                <td>Product Description</td>
                <td>
                    <textarea cols="15" rows="10" name="pdesc"></textarea>
                </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="uploadbtn" name="submit1" value="upload"></td>
                </tr>
</form>
        </div>
    </div>
</div>


