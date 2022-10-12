<?php
session_start();

require_once('config.php');
require_once('sessionTimeout.php');
include('layout/NavBar.php');


error_reporting(E_ALL);
ini_set('display_errors','On');


?>

<script type="text/javascript">
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"addComment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
  
   } 
  })
 });

  load_comment();
 setInterval(function(){
    $('#display_comment').load("fetch_comment.php").fadeIn("slow");
 }, 1000);

 

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });


 
});
</script>

<style>
   .container{  
   margin: auto;
   width: 60%;
   border: 5px solid grey;
   padding: 10px;
    background-color:whitesmoke;
   }
   #display_comment{
      background-color:transparent;
   }
   .commentbox{
      background-color: #63a4ff;
   background-image: linear-gradient(315deg, #63a4ff 0%, #83eaf1 74%);
      margin:9px;
      border-radius:10px;
      width: 50%
   }
   .commentheader{
      background-color:darkgreen;
      color:whitesmoke;
   }
   .commentbox2{
      background-color: #f9ea8f;
   background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);
      border-radius:10px;
      width: 50%
   }
  .form-group{
     width:400px;
  }
  .form-input1, .form-input2{
   width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #1c87c9;
      outline: none;
  }
  #submit{
     padding:6px;
     background-color:lightblue;
  }
  .reply {
   padding:6px;
  }
  
</style>




<div class="container">
   <h2>Discussion Forum</h2>
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-input1" placeholder="Enter Name" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-input2" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="subBtn" value="Submit" />
     
    </div>
   </form>

   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>

</div>