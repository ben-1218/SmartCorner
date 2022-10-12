<?php
session_start();

require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');


$query="SELECT * FROM tbl_users ORDER BY id ASC";
$result = $pdo->query($query);
$row = $result->fetchAll();

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

<div>
<table name="tbl3"  cellpadding="10" cellspacing="2">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Username</th>

        <th>Remove</th>
        
    </tr>

<?php

foreach($row as $key => $value){

?>


    <tr>
        <td><?php echo $row[$key]['id'] ;?></td>
        <td><?php echo $row[$key]['full_name'] ;?></td>
        <td><?php echo $row[$key]['username'] ;?></td>
    
        <td><a class="bton1" href="EditUser.php?action=remove&id=<?php echo $row[$key]['id']?>" onclick="alert('Selected User will be removed.\n *Except Admin')">Remove</a></td>

    </tr>


<?php }?>
</table>
</div>

<?php include("layout/footer.php");?>





