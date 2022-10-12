<?php

session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');


?>
<style>
    h1{border-bottom:1px solid grey;}
    form {
      padding: 25px;
      margin: 25px;
      box-shadow: 0 2px 5px #f5f5f5; 
      background: #f5f5f5; 
      }
      input, textarea {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #1c87c9;
      outline: none;
      }
      input::placeholder {
      color: #666;
      }
      button {
      width: 100%;
      padding: 10px;
      border: none;
      background: #1c87c9; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      button:hover {
      background: #2371a0;
      }    
      .readonly{
          background-color: darkorange;
          width:30%;
      }
      
</style>
<div>
<form method="post" action ="PaySucceed.php">
        <h1>Bill To</h1>
        <div class="info">
        <div class="readonly">
          <p>Total Cost</p>
          <input  type="text" name="totalCost" value="RM <?php echo $_GET['totalprice']; ?>" readonly>
          <p>Shipping method - FREE</p>
          <input  type="text" name="Shipping" value="SmartExpress" readonly>
            </div>
          <p>Username</p>
          <input  type="text" name="username" value="<?php echo $_SESSION['username'];?>">
          <p>Email</p>
          <input type="text" name="email"  value="<?php echo $_SESSION['email'];?>">        
          <p>Full Name</p>
          <input type="text" name="fullname" value="<?php echo $_SESSION['full_name'];?>">
          <p>Phone Number</p>
          <input type="text" name="phone">
        </div>
        <p>Address</p>
        <div>
          <textarea name="address" rows="4" ></textarea>
        </div>
        <button type="submit" name="proceed">Proceed</button>
      </form>

</div>