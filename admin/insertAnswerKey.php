<?php
    include('include/security.php');

    if(isset($_POST['questionId']) && isset($_POST['ans_key'])){
        
      $questionId=  htmlspecialchars(mysqli_real_escape_string($conn,$_POST['questionId']), ENT_QUOTES, 'UTF-8');
      $answer_key=  htmlspecialchars(mysqli_real_escape_string($conn,$_POST['ans_key']), ENT_QUOTES, 'UTF-8');

      if($conn->query("update fees_master set answer_key='$answer_key' where id='$questionId' OR parent_id='$questionId'")){
        $response['status']=200;
        return json_encode($response);
      }     
      else{
        $response['status']=400;
        return json_encode($response);
      }
    }
?>