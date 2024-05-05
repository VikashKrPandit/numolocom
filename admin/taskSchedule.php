<?php
include('include/security.php');
$today = date('Y-m-d');
$ftchDt = $conn->query("select id, endDate , endTime from fees_master where status='1' and endDate between '$today' and '$today'  order by id desc ");
if(mysqli_num_rows($ftchDt) > 0){
    while($mysqFtcAssc = $ftchDt->fetch_assoc()){
      $endDate = $mysqFtcAssc['endDate'];
      $endTime=$mysqFtcAssc['endTime'];
      $id = $mysqFtcAssc['id'];
  
      print_r($mysqFtcAssc);
      if(!empty($endDate) && !empty($endTime)){
          
        $concatDateTime = $endDate." ".$endTime;
        $currentDateTime= date('Y-m-d H:i');
        $currentDateTime=$currentDateTime.":00";
        //echo $concatDateTime;
        $dbDate = new DateTime($concatDateTime);
        $currentDate =new DateTime($currentDateTime);
        if($currentDate > $dbDate){
          $fmStatUp = $conn->query("update fees_master set status='2' where id='$id'");
          if($fmStatUp){
            $ftchContstTable = $conn->query("select * from tbl_contest where status='2' and fee_id='$id'");
            if(mysqli_num_rows($ftchContstTable)> 0){
              $count = mysqli_num_rows($ftchContstTable);
              for($i=0; $i<$count; $i++){
                if($conn->query("update tbl_contest set status='4' where status='2' and fee_id='$id'")){
                  //echo "<script>window.location='testResult.php?feeid={$id}'</script>";
                }
                //header("location:testResult.php");
                //die();
              
              }
            }
          }
        } 
      }
    }


}
else {
  echo "No Data for display";
}

$conn->close();
?>