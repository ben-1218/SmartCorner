<?php
require_once('config.php');

$error = '';
$comment_name = '';
$comment_content = '';

if(empty($_POST["comment_name"]))
{
 $error .= '<p class="errM">Name is required</p>';
}
else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="errM">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = " INSERT INTO tbl_forum(parentComId, comment, sender) VALUES (:parentComId, :comment,:sender )";

 $statement = $pdo->prepare($query);
 $statement->execute(
    array(
        ':parentComId' => $_POST['comment_id'],
        ':comment'    => $comment_content,
        ':sender' => $comment_name
       )
 );



}
$data = array(
    'error'  => $error
   );
   
   echo json_encode($data);
   


?>