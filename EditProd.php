<?php
session_start();

require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');

$prodId = $_GET['id'];

$query="SELECT * FROM tbl_products WHERE id=$prodId";
$result = $pdo->query($query);
$row=$result->fetchAll();





?>
<style>
    .editCont h2{
  background-color: whitesmoke;
  border-radius: 7px;
  padding: 4px;
}
.editCont{margin-left: 300px; background-color: darkkhaki;width: 30%; border-radius: 6px;}
.editCont input {
  border-radius: 52px;
  background-color: blanchedalmond;
  margin: 4px;
}
.editCont textarea{
  background-color: blanchedalmond;
}
.editCont select{
  background-color: blanchedalmond;
}
.editCont .uploadbtn{
  padding: 7px;
}
.uploadbtn:hover{
  background-color: brown;
  color: white;
}
.done p{
    padding: 7px;
    background-color: brown;
    color: white;
    text-align:center;   
    text-decoration:none;
}
.done p:hover{
    background-color:black;
}
</style>
<div class="editCont">
<h2>Edit product</h2>
<div class="itemImg">
    <img src="<?php echo $row[0]['product_image'] ;?>" width="200px" height="200px"/>
</div>


<form name="formEdit" method="post" enctype="multipart/form-data">
<table >
                <tr>
                <td>Product Name</td>
                <td><input type="text" name="pnm" value="<?php echo $row[0]['product_name'];?>"></td>
                </tr>
                <tr>
                <td>Product Code</td>
                <td><input type="text" name="pcode" value="<?php echo $row[0]['product_code'] ;?>"></td>
                </tr>
               
                <tr>
                <td>Product Price</td>
                <td><input type="text" name="pprice" value="<?php echo $row[0]['product_price'] ;?>"></td>
                </tr>
               
                <tr>
                <td>Product Quantity</td>
                <td><input type="text" name="pqty" value="<?php echo $row[0]['product_qty'] ;?>"></td>
                </tr>
               
                <tr>
                <td>Product Image</td>
                <td><input type="file" name="pimage" ></td>
                </tr>

                <tr>
                <td>Product Category</td>
                <td>
                    <select name="pcategory" >
                        <option  value="<?php echo $row[0]['product_category'] ;?>"><?php echo $row[0]['product_category'] ;?></option>
                        <option value="kitchenware">Kitchenware</option>
                        <option value="lighting">Lighting</option>
                        <option value="speakers">Speakers</option>
                        <option value="bathroomseries">Bathroom series</option>
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
                    <textarea cols="15" rows="10" name="pdesc"><?php echo $row[0]['product_description'] ;?></textarea>
                </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="uploadbtn" name="submit1" value="save"></td>
                </tr>
</table>
            <a class="done" href="viewEditProd.php"><p>Done</p></a>
</form>
</div>
<?php

if (isset($_POST['submit1']))
{
    $fnm= $_FILES["pimage"]["name"];

    if($fnm==""){
        $query = "UPDATE tbl_products SET product_name='$_POST[pnm]',product_code='$_POST[pcode]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_category='$_POST[pcategory]',product_description='$_POST[pdesc]',product_filter='$_POST[pfilter]' WHERE id = $prodId";
        $result = $pdo->query($query);
    }
    else
    {
        $fnm = $_FILES["pimage"]["name"];
        $dir = "./productImage/".$fnm;
        $dir1 = "productImage/".$fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"],$dir);

        $query = "UPDATE tbl_products SET product_name='$_POST[pnm]',product_code='$_POST[pcode]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_image='$dir1',product_category='$_POST[pcategory]',product_description='$_POST[pdesc]',product_filter='$_POST[pfilter]' WHERE id = $prodId";
        $result = $pdo->query($query);

        
    }

}

?>







