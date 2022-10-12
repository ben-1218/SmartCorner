<?php
session_start();

require_once('config.php');
include "./layout/NavBar.php";
require_once('sessionTimeout.php');


if($_GET['id'] != 1){

$user_id = $_GET['id'];
$query = "DELETE FROM tbl_users where id = $user_id";
$result = $pdo->query($query);  

}
?>
<script type="text/javascript">
    window.location = "UserDetails.php";
    
</script>











