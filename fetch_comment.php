<?php
require_once('config.php');

$query = "SELECT * FROM tbl_forum WHERE parentComId = '0' ORDER BY comment_id DESC";

$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

$output= '';

foreach($result as $row)
{
    $output .= '
    <div class="commentbox">
    <div class="commentheader">By ( <b>'.$row["sender"].'</b>) on (<i>'.$row["date"].')</i></div>
    <div class="commentmain">'.$row["comment"].'</div>
    <div class="replybtn align="right"><button type="button" class="replybtn" id="'.$row["comment_id"].'">Reply</button></div>
    </div>
    ';
    $output .= get_reply($pdo , $row["comment_id"]);
}
echo $output;

function get_reply($pdo, $parent_id = 0, $marginleft = 0)
{
 $query = "SELECT * FROM tbl_forum WHERE parentComId = '".$parent_id."'";
 $output = '';
 $stmt = $pdo->prepare($query);
 $stmt->execute();
 $result = $stmt->fetchAll();
 $count = $stmt->rowCount();
 
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 50;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="commentbox2" style="margin-left:'.$marginleft.'px">
    <div class="commentheader">By ( <b>'.$row["sender"].'</b>) on (<i>'.$row["date"].')</i></div>
    <div class="commentmain">'.$row["comment"].'</div>
    <div class="replybtn" align="right"><button type="button"  class="reply" id="'.$row["comment_id"].'">Reply</button></div>
   </div>
   ';
   $output .= get_reply($pdo, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>

