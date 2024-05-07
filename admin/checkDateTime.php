<?php
    include('include/security.php');

    if(isset($_POST['questionId']) && isset($_POST['endDateGame']) && isset($_POST['endTimeGame'])){
        
      $questionId=  htmlspecialchars(mysqli_real_escape_string($conn,$_POST['questionId']), ENT_QUOTES, 'UTF-8');
      $endDateGame=  htmlspecialchars(mysqli_real_escape_string($conn,$_POST['endDateGame']), ENT_QUOTES, 'UTF-8');
      $endTimeGame=  htmlspecialchars(mysqli_real_escape_string($conn,$_POST['endTimeGame']), ENT_QUOTES, 'UTF-8');
      $endTimeGame=$endTimeGame.":00";
      if($conn->query("update fees_master set endDate='$endDateGame',endTime='$endTimeGame' where id='$questionId' OR parent_id='$questionId'")){
        $response['status']=200;
        return json_encode($response);
      }     
      else{
        $response['status']=400;
        return json_encode($response);
      }
    }
?>