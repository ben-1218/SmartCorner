<?php

session_start();

require_once('config.php');

if(isset($_POST['signIn']))
{
  if(isset($_POST['username']) && isset($_POST['pwd'])){
  
    $un_bar = sanitise($pdo,$_POST['username']);
    $pw_bar = sanitise($pdo,$_POST['pwd']);
    $query   = "SELECT * FROM tbl_users WHERE username=$un_bar";
    $result  = $pdo->query($query);
  
    if (!$result->rowCount()) {$errorM2 = "*Please sign up if you don't have an account";}
  
    $row = $result->fetch();
    $pw  = $row["password"];

  
    if (password_verify($pw_bar,$pw))
    {
      unset($row['password']);
      $_SESSION = $row;
      header("location:dashboard.php");
     
    }
    else { $errorM = "*Invalid username/password combination";
  }}

  //call back from dasjhboard.php when seesion died. 
  if(!isset($_SESSION['username']))
  {
    $errorM3 = "Login required to access dashboard";
  }  


}
function sanitise($pdo, $str)
  {
    $str = htmlentities($str);
    return $pdo->quote($str);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<style>
    body{background-image:url(./css/images/SmartCorner.png);}
    form
    { 
    width: 500px;
    box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.3);
    background: rgba(0,0,0,0.7);
    padding: 20px;
    margin: 3% auto 0;
    text-align: center;
    margin-top: 250px;
    }
    form h1{color:white;}
    .inputbox{margin-bottom: 40px;
          background: transparent;
          color: #fff;
          outline : none;
          border:none;
          border-bottom: 1px solid #fff;
          padding-top:10px;
          padding-bottom: 5px;
          width: 90%;
          }
    .btn{margin: 40px auto 20px;
        width: 80%;
        display:block;
        outline:none;
        padding: 10px 0;
        border: 1px solid #fff;
        cursor: pointer;
        background:transparent;
        color: #fff;
        font-size: 16px;
      text-decoration: none;}
    .btn:hover{
      background:whitesmoke;
      color:black;
    }
    span{color:red;
        font-weight:bold;
    padding: 1px;}

</style>
<body>
  
    <form action="index.php" method="post">
      <h1>Login Here</h1>
      <?php echo "<span>$errorM<br></span>";?>
      <?php echo "<span>$errorM2</span>";?>
      <input class="inputbox" name="username" type="text" placeholder="Username"/><br>
      <input class="inputbox" name="pwd" type="password" placeholder="Password"/>
      <?php echo "<span>$errorM3</span>";?>
      <input class="btn" name="signIn" type="submit" value="Sign In"/>
      <p><a class="btn" href="./registeration/register.php">Sign up</a></p>
    </form>
  
</body>
</html>