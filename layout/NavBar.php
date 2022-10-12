<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SmartCorner</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <style>
      ul{
   
   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   background-color: #d8d8ac;
   background-image :linear-gradient(315deg, #d8d8ac 0%, #c8c85e 74%);


   }
   li{
   float:left;
   }
   li a, .dropbtn{
   display: inline-block;
   color:black;
   text-align: center;
   padding: 14px 16px;
   text-decoration: none;
   }
   li a:hover, .dropdown:hover .dropbtn{
   background-color: #8298bc;
   }
   li.dropdown{
   display: inline-block;
   }
   .dropdown-content{
   display:none;
   position:absolute;
   background-color: #234782;
   color:white;
   min-width: 16px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
   z-index: 1;
   }
   .dropdown-content a{
   display:block;
   }
   .dropdown-content a:hover{
   background-color: whitesmoke;
   color:black;
   }
   .dropdown:hover .dropdown-content{
   display:block;
   }
   .navbar >li:last-child{
   float:right;
   }

   body{background-color: #a40606;
   background-image: linear-gradient(315deg, #a40606 0%, #d98324 74%);

   }
   .cart_tbl{
   background-color:whitesmoke;
   }

</style>
   
</head>
<body>

<ul class="navbar">
   <li><a href="./dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg> Home</a></li>
   <li><a href="./products.php">Products</a></li>
   
   <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Categories</a>
      <div class="dropdown-content">
         <a href="./categories.php?page=PlugS">Plug & Switches</a>
         <a href="./categories.php?page=KitchenW">Kitchenware</a>
         <a href="./categories.php?page=Lighting">Lighting</a>
         <a href="./categories.php?page=Speakers">Speakers</a>
         <a href="./categories.php?page=ElectricH">Electric Household</a>
         <a href="./categories.php?page=BathroomS">Bathroom Series</a>
   </div></li>
   <li><a href="./cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg> Cart</a></li>

<?php if($_SESSION['user_role_id'] == 1){ //only visible to admin  ?>
   
<li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Manage Product</a>
      <div class="dropdown-content">
         <a href="./viewEditProd.php">View / Edit products</a>
         <a href="./addproducts.php">Add products</a>
   </div></li>

   <li><a class="userd" href="./UserDetails.php">Manage Userlist</a></li>

<?php } ?> 

   <li><a class="acc" href="./accPage.php">Account</a></li>
   <li><a class="Forum" href="./forum.php">Forum</a></li>
   <li><a href="./sessionLogout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Logout</a></li>
</ul>
   
