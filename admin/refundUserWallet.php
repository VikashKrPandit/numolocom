<?php
    include('include/security.php');
    $slContest = $conn->query("select tc.id AS contstId,tc.fee_id,tc.status,fm.id,fm.answer_key from tbl_contest as tc LEFT JOIN  fees_master as fm ON tc.fee_id=fm.id WHERE tc.status=4 and fm.answer_key IS NULl order by tc.id desc LIMIT 1");
    if(mysqli_num_rows($slContest)>0){

        $slContestFtch =$slContest->fetch_assoc();
        $slContestFtchId= $slContestFtch['contstId'];
        $cntst_fees_id=$slContestFtch['fee_id'];
        $slParticipate = $conn->query("select user_id,win_prize,entry_fee from tbl_participants where contest_id='$slContestFtchId' and entry_fee !=0");
        if(mysqli_num_rows($slParticipate)> 0){
            $cl=array();
            while($slParticipateftch = $slParticipate->fetch_assoc()){
                $cl[]=$slParticipateftch;
                $user_id = $slParticipateftch['user_id'];
                $win_prize = $slParticipateftch['entry_fee'];
                $userFtch = $conn->query("select cur_balance from tbl_user where id='$user_id' ");
                $c =mysqli_num_rows($userFtch);

            }
            foreach($cl as $key=> $vl){
              $id=$vl['user_id'];
              $query = $conn->query("select id,cur_balance, won_balance from tbl_user where id=$id ");
              if(mysqli_num_rows($query)>0){
                while($qf = $query->fetch_assoc()){
                   if($qf['id']== $id){
                    $pBal = $vl['win_prize'];
                    $uBal = $qf['cur_balance'];
                    //$uBal2= $qf['won_balance'];
                    $cr_bal = add($pBal,$uBal);
                    //$cr_bal2 = add($pBal,$uBal2);
                   // echo "update tbl_user set cur_balance='$cr_bal' where id='$id'";
                    $conn->query("update tbl_user set cur_balance='$cr_bal' where id='$id'");
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
    header('location:create-contest.php');
    exit();
?>