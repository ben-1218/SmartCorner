<?php

session_start();


require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');

$prod_id = $_GET['id'];

$query = "DELETE FROM tbl_products where id = $prod_id";
$result = $pdo->query($query);


?>
<script type="text/javascript">
    window.location = "viewEditProd.php";
    
</script>