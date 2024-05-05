<?php 
require('include/conn.php');

$current_time = time();

$getConQuery   = $conn->query("select id, end_time from tbl_contest where status=2");
$getConRes = $getConQuery->fetch_assoc();

if(isset($getConRes)){

    if($current_time-$getConRes['end_time'] >= 0)
    {
    	// echo"<script>alert(\"ok\");</script>";
    	$getFeesQuery = $conn->query("select id from fees_master");
    	$resTime = time();
    	$conn -> autocommit(FALSE);
    	try 
    	{
    		$conn->begin_transaction();
    		while($getFeesRes = $getFeesQuery->fetch_assoc())
    		{
    			$getPrizePool = $conn->query("select id, rank as crank, prize from prizepool_master where fees_id=".$getFeesRes['id']." order by rank asc");
    
    			while($getPrizePoolRes = $getPrizePool->fetch_assoc())
    			{
    				$participants = $conn->query("select id, user_id from tbl_participants where contest_id=".$getConRes['id']." and fees_id=".$getFeesRes['id']." and status=0 ORDER BY is_dummy DESC, RAND() LIMIT 1");
    				$participantsRes = $participants->fetch_assoc();
    				$row_cnt_parti = $participants->num_rows;
    				if($row_cnt_parti > 0)
    				{
    					$conn->query("update tbl_participants set win_prize=".$getPrizePoolRes['prize'].", `rank`=".$getPrizePoolRes['crank'].", status=1, result_time='".$resTime."', res_type=1 where id=".$participantsRes['id']. " and status=0 and fees_id=".$getFeesRes['id']);
    					$upUserWallet = $conn->query("update tbl_user set won_balance=won_balance+".$getPrizePoolRes['prize']." where id='".$participantsRes['user_id']."'");
    					$order_id = time();
    				    $tran_query = "INSERT INTO tbl_transaction (user_id, order_id, req_amount, getway_name, remark, type, date, status) 
                            VALUES (".$participantsRes['user_id'].", '$order_id', ".$getPrizePoolRes['prize'].", 'System', 'Won Draw #".$getConRes['id']."', '0', '$order_id', '1')";
                        $conn->query($tran_query);
    				}
    			}	
    		}
    		
    		$upContest = $conn->query("update tbl_contest set status=4 where id=".$getConRes['id']." and status=2");
    		$upPkg = $conn->query("update fees_master set dummy_user=0");
    		
    		$conn->commit();
    	}
    	catch (\Throwable $e) {
    	    // An exception has been thrown
    	    // We must rollback the transaction
    	    $conn->rollback();
    	    throw $e; // but the error must be handled anyway
    	}
    
    	
    }

    
}
?>