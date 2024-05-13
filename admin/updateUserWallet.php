<?php
if(isset($_GET['fee_id'])){
    $c_fee_id=$_GET['fee_id'];

    include('include/security.php');
   // $slContest = $conn->query("select tc.id,tc.fee_id,tc.status,fm.id,fm.answer_key from tbl_contest as tc LEFT JOIN  fees_master as fm ON tc.fee_id=fm.id WHERE tc.status=4 and fm.answer_key IS NOT NULl order by tc.id desc");
   $slContest=$conn->query("select tc.id,tc.fee_id,tc.status,fm.id,fm.answer_key from tbl_contest as tc LEFT JOIN  fees_master as fm ON tc.fee_id=fm.id WHERE tc.status=4 and tc.fee_id ='$c_fee_id' and fm.answer_key IS NOT NULl order by tc.id desc");
    if(mysqli_num_rows($slContest)>0){
        
        while($slContestFtch =$slContest->fetch_assoc()){   
            //print_r($slContestFtch);
            $slContestFtchId= $slContestFtch['id'];
            echo $slContestFtchId;
            $cntst_fees_id=$slContestFtch['fee_id'];
            $slParticipate = $conn->query("select user_id,win_prize from tbl_participants where fees_id='$slContestFtchId' and win_prize !=0");
            //print_r($slParticipate);
        if(mysqli_num_rows($slParticipate)> 0){
            $cl=array();
            while($slParticipateftch = $slParticipate->fetch_assoc()){
                $cl[]=$slParticipateftch;
                $user_id = $slParticipateftch['user_id'];
                $win_prize = $slParticipateftch['win_prize'];
                $userFtch = $conn->query("select cur_balance, won_balance from tbl_user where id='$user_id' ");
                $c =mysqli_num_rows($userFtch);
                //echo "<pre>";
                //print_r($slParticipateftch);
            }
            foreach($cl as $key=> $vl){
              $id=$vl['user_id'];
              echo "select id,cur_balance, won_balance from tbl_user where id=$id";
              $query = $conn->query("select id,cur_balance, won_balance from tbl_user where id=$id");
              if(mysqli_num_rows($query)>0){
                while($qf = $query->fetch_assoc()){
                   if($qf['id']== $id){
                    $pBal = $vl['win_prize'];
                    $uBal = $qf['cur_balance'];
                    $uBal2= $qf['won_balance'];
                    $cr_bal = add($pBal,$uBal);
                    $cr_bal2 = add($pBal,$uBal2);
                    $order_id =time().$id;
                    $date=time();
                   // echo "update tbl_user set cur_balance='$cr_bal' where id='$id'";
                    $conn->query("update tbl_user set cur_balance='$cr_bal',won_balance='$cr_bal2' where id='$id'");
                    $conn->query("insert into tbl_transaction (user_id,order_id,payment_id,request_name,req_from,req_amount,remark,date) values('$id','$order_id',NULL,'Winning Amount','Wining Ammount','$pBal','#Contest Wining Amount:$slContestFtchId','$date')");
                   }
                }
              
                
              }

            }
          
        }
    }   
 }
}
    function add($partBal,$userBal){
        if($userBal!=0 ){
            return $partBal+$userBal;
        }
        else {
            $userBal=$partBal;
            return $userBal;
        }
    }
    // header('location:create-contest.php');
    // exit();
?>