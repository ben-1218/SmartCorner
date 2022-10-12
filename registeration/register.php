<?php

require_once('../config.php');



$fullname = $username = $email = $pwd = "";

if(isset($_POST['full_name']))
  $fullname = fix_string($_POST['full_name']);
if(isset($_POST['email']))
  $email= fix_string($_POST['email']);
if(isset($_POST['username']))
  $username = fix_string($_POST['username']);
if(isset($_POST['pwd']))
  $pwd = fix_string($_POST['pwd']);

$fail  = validate_fullname($fullname);
$fail .= validate_email($email);
$fail .= validate_username($username);
$fail .= validate_pwd($pwd);


if ($fail == "")
{
  

if(isset($_POST['username']) && isset($_POST['pwd'])){
    
  //username and password sent from registeration form and sanitise
function sanitise($pdo, $str)
  {
    $str = htmlentities($str);
    return $pdo->quote($str);
  }

$myusername = sanitise($pdo,$_POST['username']);
$mypassword = sanitise($pdo,$_POST['pwd']);
$mypassword = password_hash($mypassword, PASSWORD_DEFAULT);
$email      = sanitise($pdo,$_POST['email']);
$fullName   = sanitise($pdo,$_POST['full_name']);


$tblName = "tbl_users";

// check if email or username exists
$email1 = $_POST['email'];
$sql_e = $pdo->prepare("SELECT * FROM tbl_users WHERE email = ?");
$sql_e->execute([$email1]);
$check1 = $sql_e->rowCount();

$myusername1 = $_POST['username'];
$sql_u = $pdo->prepare("SELECT * FROM tbl_users WHERE username = ?");
$sql_u->execute([$myusername1]);
$check2 = $sql_u->rowCount();

$Error = "";

if($check2 > 0 ){ 
 $Error = "Sorry this username already taken - please try again";
}
else if($check1 > 0 ){
  
  $Error = "Sorry this email already taken - please try again";
}
else if($Error == "")
{
  $query = "INSERT INTO $tblName(id,user_role_id,full_name,username, email,password) VALUES (NULL,2,$fullName,$myusername,$email,'$mypassword')";

$result = $pdo->query($query);

if(!$result){
    die('Error: '.mysqli_error());
}
header("location:registered.php");
}




}
}

echo <<<_END

<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" href="../css/style.css"/>
  <script type="text/javascript">


  function validate(form){
    fail = validateFullname(form.fullname.value)
    fail += validateUsername(form.username.value)
    fail += validateEmail(form.email.value)
    fail += validatePassword(form.pwd.value)

    if (fail == "") return true
    else{alert("fail"); return false}
   
  }
  function validateFullname(field)
  {
    return (field == "") ? "No Fullname was entered.\n" : ""
  }
  function validateUsername(field)
  {
   if (field == "") return "No Username was entered.\\n"
   else if (filed.length < 5)
      return "Username must be at least 5 characters.\\n"
   else if (/[^a-zA-Z0-9_-]/.test(field))
      return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\\n"
    return ""
  }
  function validationPassword(field){
    if (field == "") return "No Password was entered.\\n"
    else if (field.length <6)
        return "Passwords must be at least 6 characters.\\n"
    else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) || !/[0-9]/.text(field))
        return "Passwords require on each of z-z, A-Z, and 0-9.\\n"
    return ""
  }
  function validateEmail(field)
  {
    if (field == "") return "No Email ws entered.\\n"
      else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field))
      return "The Email address is invalid.\\n"
  return ""
  }

</script>
</head>
<body id="signup">
 
  <div class="sign-up-form">
    <h1> Sign Up Now</h1>
    <div ><p style="color:red">$fail</p></div>
    <div ><p style="color:red">$Error</p></div>
    
    <form method="post"  onsubmit="return validate(this)">
      <input type="text" name="username" class="inputbox" placeholder="Username" value="$username" />
      <input type="password" name="pwd" id="passwd" class="inputbox"placeholder="Your Password" value="$pwd" />
      <input type="text" name="email" class="inputbox" placeholder="Email" value = "$email"/>
      <input type="text" name="full_name"  class="inputbox" placeholder="Your Fullname" value ="$fullname"/><br>

      <button type="submit" value="submit" name="signup" class="signup-btn">Sign up</button>
      <hr>
      <p class="or">Or</p>
      <p>Already have an Account ? <a href="../index.php">Sign in</a></p>
    </form>
  </div>
</body>
</html>
_END;


function validate_fullname($field)
  {
    return ($field == "") ? "No Fullname was entered<br>": "";
  }
  function validate_username($field)
  {
   if ($field == "") return "No Username was entered<br>";
   else if (strlen($field) < 5)
      return "Username must be at least 5 characters<br>";
   else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
      return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames<br>";
    return "";
  }
  function validate_pwd($field){
    if ($field == "") return "No Password was entered<br>";
    else if (strlen($field) < 6)
        return "Passwords must be at least 6 characters<br>";
    else if (!preg_match("/[a-z]/", $field) || !preg_match("/[A-Z]/", $field) || !preg_match("/[0-9]/", $field))
        return "Passwords require 1 each of z-z, A-Z, and 0-9<br>";
    return "";
  }
  function validate_email($field)
  {
    if ($field == "") return "No Email ws entered.<br>";
    else if (!((strpos($field, ".") > 0) && (strpos($field, "@") > 0)) || !preg_match("/[0-9]/", $field)) 
        return "The Email address is invalid<br>";
  return "";
  }

  function fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities($string);
  }

  

?>