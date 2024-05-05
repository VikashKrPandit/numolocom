<?php 
require('conn.php');
session_start();

date_default_timezone_set('Asia/Kolkata');

if(isset($_SESSION['user'])&isset($_SESSION['userId']))
{
  $user = $_SESSION['user'];
  $userId = $_SESSION['userId'];
  $session_id=session_id();

  $query   = $conn->query("select * from tbl_user_master where uname='{$user}' and user_id='{$userId}' and del='0' and is_verify ='1' and account_status='1'"); 
  
  if($res = $query->fetch_assoc())
  {
    $user = $res['uname']; 
    $userId = $res['user_id'];
  }
  else
  {
    header("Location:login");
  }
}
else
{
  if(isset($_COOKIE['user']))
  {
    $user= $_COOKIE['user'];
    $userId= $_COOKIE['userId'];
  }
  else
  {
    header("Location:login");
  }
}


function flash($type = '', $name = '', $message = '', $class = '', $dismiss = '' )
{
  //We can only do something if name exists
  if($type)
  {   
      //No message, create it
      if($message && empty($_SESSION[$type][$name]))
      { 
          $_SESSION[$type][$name]['message'] = $message;
          $_SESSION[$type][$name]['class'] = $class;
          $_SESSION[$type][$name]['dismiss'] = $dismiss;
      }
      //Message exists, display it
      else if(isset($_SESSION[$type]) && empty($message))
      {
          foreach($_SESSION[$type] as $name=>$array) {
              echo '<div role="alert" class="alert alert-'.$_SESSION[$type][$name]['class'].'">'.$_SESSION[$type][$name]['message'].'</div>';
          }
          unset($_SESSION[$type]);

      }
  }
}

// get app details
$appDetQuery   = $conn->query("select * from tbl_app_details where id=1"); 
$appDetRes = $appDetQuery->fetch_assoc();

?>