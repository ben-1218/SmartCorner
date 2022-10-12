<?php
session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');


                error_reporting(E_ALL);
                ini_set('display_errors','On');
            
            

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            
            if(!empty($_POST["quantity"])) {
                $query = "SELECT * FROM tbl_products WHERE product_code = ? AND id = ?";
                $stmt = $pdo->prepare($query);
                $code = $_GET['code'];
                $id = $_GET['id'];
                $stmt->bindParam(1,$code);
                $stmt->bindParam(2,$id);
                $stmt ->execute();
                $rows = $stmt->fetchAll();

                
 
                //get the first data only with index [0]
                        
                            $itemArray = array($rows[0]["product_code"]=>array('name'=>$rows[0]["product_name"], 
                                         'code'=>$rows[0]["product_code"], 'quantity'=>$_POST["quantity"],
                                          'price'=>$rows[0]["product_price"], 'image'=>$rows[0]["product_image"]));

                        //  $_SESSION["cart_item"] = $itemArray;
                        // var_dump($itemArray);
                        
                
                if(!empty($_SESSION["cart_item"])) {
                                    //checking new add item with currect Cart
                    if(in_array($rows[0]["product_code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($rows[0]["product_code"] == $k) {
                                                                   //if the quantity  is empty, starting the quantity from Zero
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                                                    //if the item already in the Cart, add the quantity
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                        }
                    } 
                                    //if current item is not in the cart, add the item
                                    else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                                    //if the session is empty, start the new session.
                    $_SESSION["cart_item"] = $itemArray;
                }
            }

       
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                                            // if no more item in cart, empty the session
                        else if(empty($_SESSION["cart_item"])){
                            unset($_SESSION["cart_item"]);}
                }
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;	

        

    }
    }
    ?>
    <style>
        .cartheading{
            background-color:#d8d8ac;
            background-image:linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%);; width: 300px; text-align:center;padding:4px; border-radius:3px;
        }
        .emptyBtn{
            margin-top:30px;
            display:inline-block;
            float:right;
         
        }
        .emptyBtn a:hover{
            background-color:red;
            color:white;

        }
        .emptyBtn a{background-color:whitesmoke;
            padding: 6px;
            text-decoration: none;
            color:brown;
            border-radius:13px;}
        .headingCont{
            display:inline-block;
        }
        .cart_tbl{
            border-collapse:collapse;
        }
        .no-records{
            border:1px solid black;
            text-align:center;
        }
        .last{
            border-top:3px solid black;
        }
        th{
            background-color: gold;
        }
        .remove:hover{
            background-color:red;
        }
        .checkout a{
            background-color:whitesmoke;
            padding: 6px;
            text-decoration: none;
            color:brown;
            border-radius:13px;
        }
        .checkout{
            margin-top:30px;
            display:inline-block;
            float:right;
        }
        .checkout a:hover{
            background-color:green;
            color:white;
        }
        .no-records{
            background-color: whitesmoke;
            color:black;
        }
       
        </style>
    <body>
    <div id="shopping-cart">
    <div class="headingCont"><h2 class="cartheading"> Shopping Cart</h2>
    </div>
    <div class="emptyBtn">
    <a  href="cart.php?action=empty"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="12" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg> Empty Cart</a>
    </div>

    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
    ?>
    <!-- This table is the shopping cart.  -->	
    <table class="cart_tbl" cellpadding="10" cellspacing="1">
    <tbody>
    <tr>
    <th style="text-align:left;">Name</th>
    <th style="text-align:left;">Code</th>
    <th style="text-align:right;" width="5%">Quantity</th>
    <th style="text-align:right;" width="10%">Unit Price</th>
    <th style="text-align:right;" width="10%">Price</th>
    <th style="text-align:center;" width="10%">Remove</th>
    </tr>	
    <?php		
        foreach ($_SESSION["cart_item"] as $item){
            $item_price = $item["quantity"]*$item["price"];
            ?>
                    <tr>
                    <td><img src="<?php echo $item["image"]; ?>" width="40px" height="40px" class="itemImg" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "RM ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "RM ". number_format($item_price,2); ?></td>
                    <td class="remove"style="text-align:center;">

                                    <a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td>
                    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
            }
            ?>
    
    <tr class="last">
    <td colspan="2" align="right">Total:</td>
    <td align="right"><?php echo $total_quantity; ?></td>
    <td align="right" colspan="2"><strong><?php echo "RM ".number_format($total_price, 2); ?></strong></td>
    <td></td>
    </tr>
    </tbody>
    </table>	
    <h4 class="checkout"><a href="CheckOut.php?totalprice=<?php echo $total_price; ?>">Place Order & Check Out</a></h4>
      <?php
    } else {
    ?>
    
    <div class="no-records"><h4>Your Cart is Empty.</h4></div>
    <?php 
    }
    ?>
    </div>


   
