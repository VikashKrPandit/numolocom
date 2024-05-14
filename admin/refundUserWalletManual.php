<?php
if(isset($_GET['fee_id'])){
    $fee_id = $_GET['fee_id'];
    print_r($fee_id);
    //die();
    include('include/security.php');

    $slContest = $conn->query("select tc.id AS contstId,tc.fee_id,tc.status,fm.id,fm.answer_key from tbl_contest as tc LEFT JOIN  fees_master as fm ON tc.fee_id=fm.id WHERE tc.status=4 and fm.id='$fee_id' AND fm.answer_key IS NOT NULl order by tc.id desc LIMIT 1");
    if(mysqli_num_rows($slContest)>0){

        $slContestFtch =$slContest->fetch_assoc();
        $slContestFtchId= $slContestFtch['contstId'];
        $cntst_fees_id=$slContestFtch['fee_id'];
        echo $slContestFtchId;
        $slParticipate = $conn->query("select user_id,win_prize,entry_fee from tbl_participants where contest_id='$slContestFtchId' and entry_fee !=0");
        if(mysqli_num_rows($slParticipate)> 0){
            $cl=array();
            while($slParticipateftch = $slParticipate->fetch_assoc()){
                $cl[]=$slParticipateftch;
                $user_id = $slParticipateftch['user_id'];
                $entry_fee = $slParticipateftch['entry_fee'];
                echo $user_id;
                $userFtch = $conn->query("select cur_balance from tbl_user where id='$user_id' and is_dummy!=1");
                $c =mysqli_num_rows($userFtch);

            }
            foreach($cl as $key=> $vl){
                print_r($vl);
                //die();
              $id=$vl['user_id'];
              $query = $conn->query("select id,cur_balance, won_balance from tbl_user where id=$id and is_dummy!=1");
              if(mysqli_num_rows($query)>0){
                while($qf = $query->fetch_assoc()){
                   if($qf['id']== $id){
                    $entry_fee = $vl['entry_fee'];
                    $uBal = $qf['cur_balance'];
                    //$uBal2= $qf['won_balance'];
                    $cr_bal = add($entry_fee,$uBal);
                    $order_id =time().$id;
                    $date=time();
                    $status = 1;
                    $type =0;
                    $conn->query("update tbl_user set cur_balance='$cr_bal' where id='$id' and is_dummy!=1");
                    $conn->query("insert into tbl_transaction (user_id,order_id,payment_id,request_name,type,status,req_from,req_amount,remark,date) values('$id','$order_id',NULL,'refund','$type','$status','refund','$entry_fee','Contest Refund:$slContestFtchId','$date')");
                   }
                }
              
                
              }

            }
          
        }   
    }
}

    function add($entry_fee,$uBal){
        if(!empty($entry_fee) ){
            return $uBal+$entry_fee;
        }
        else {
            $uBal=$entry_fee;
            return $entry_fee;
        }
    }
    //header('location:create-contest.php');
   // exit();
?>