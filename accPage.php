<?php
session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');

?>
<style>
    table{
        background-color:black;
        color:white;
        text-align:center;
        clear:both;
    }
    .container{
        display:flex;
        justify-content:center;
    }
    .header{
        display:flex;
        justify-content:center;
    }
</style>
<div class="header">
<h2>You are now logged in as <?php echo getUserRoleById($_SESSION['user_role_id']);?></h2>
    <?php if($_SESSION['user_role_id']==1){?>
    <h2 style="color:white;background-color:red;">-*You have all the access to this website.</h2>
<?php } ?>
 </div>

<div class="container">
<table border="1" cellspacing="5" cellpadding="5">
        <tr>
        <th>Username</th>
        <th>Fullname</th>
        <th>Email</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION['username'] ;?></td>
            <td><?php echo $_SESSION['full_name'] ;?></td>
            <td><?php echo $_SESSION['email'] ;?></td>
        </tr>
    </table>
</div>



<?php  
include("layout/footer.php");?>