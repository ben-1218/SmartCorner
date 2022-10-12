<?php
session_start();

if(isset($_SESSION['username'])){

    $un = $_SESSION['username'];
    
    if(isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity'] > 600))
    {
        destroy_session_and_data();
        $smsg= "Session for Account -> $un has expired. You have been inactive for 10mins <br> Please <a class='lbtn' href='index.php'>Login</a> again.";
         
    }
}
$_SESSION['lastActivity'] = time();

function destroy_session_and_data()
{
    unset($_SESSION['username']);
    $_SESSION = array();
    setcookie(session_name(),'',time()-2592000,'/');
    session_destroy();
}

?>
<style>
    h3{
        background-color:white; color: red;
    }
    a.lbtn{
        text-decoration:none;
        background: green;
        border-radius: 3px;
    }
</style>
<h3><?php echo "$smsg"; ?></h3>