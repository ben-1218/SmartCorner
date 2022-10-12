<?php
$host = 'localhost';
$db = 'webproject';         
$user = 'ben';         
$pass =  'mypasswd';      
$chrs = 'utf8mb4'; 
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";
$opts =
[
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try
    {
      $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (\PDOException $e)
    {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

function getUserRoleById($id){
  global $pdo;

  $query = "select user_role from tbl_user_role where id = ".$id;

  $rs = $pdo->query($query);
  $row = $rs->fetch();

  return $row['user_role'];
  
}






?>