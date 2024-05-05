<?php
include('include/security.php');
if(isset($_POST['btnAddParti']))
{
	$txtFid = mysqli_real_escape_string($conn,$_POST['txtFid']);
	$txtNoParti = mysqli_real_escape_string($conn,$_POST['txtNoParti']);
	$txtFees = mysqli_real_escape_string($conn,$_POST['txtFees']);
	$getContest=mysqli_real_escape_string($conn,$_POST['getContest']);
	$txtDate = time();
	
	function generateRandomString($length = 8) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	$getLiveContest = $conn->query("select * from tbl_contest where id='$getContest' and status=2  limit 1");
	$row_cnt = $getLiveContest->num_rows;
	$liveContestRes = $getLiveContest->fetch_assoc();
	$liveContestRes=$liveContestRes['id'];
	
	if($row_cnt==0)
	{
		flash( 'fmsg', 'fmsg', 'There is no live contest', 'danger', 'TRUE' );
	    header("Location:fees-master");
	    exit();
	}
	else
	{
		$getFeesData = $conn->query("select f.*, count(p.id) as tot_parti from fees_master as f 
										left join tbl_participants as p on p.fees_id=f.id
										where f.id='$txtFid' and p.contest_id='$liveContestRes'");
		$getFeesDataRes = $getFeesData->fetch_assoc();
		$aviTicket = $getFeesDataRes['no_of_tickets'] - $getFeesDataRes['tot_parti'];
		$pkg_id=$getFeesDataRes['pkg_id'];

		if($aviTicket >= 0){
			if($txtNoParti <= $aviTicket || $aviTicket ==0){
				for($i=0;$i<$txtNoParti;$i++)
				{
					//$ticketNo = generateRandomString();
					$ticketNo = rand(10,99);
				/* 	echo  "INSERT INTO tbl_participants (contest_id, fees_id, user_id, entry_fee, date_created, ticket_no, username, is_dummy)
					SELECT $liveContestRes, $txtFid, id, $txtFees, '$txtDate', '$ticketNo', username, 1 
					FROM tbl_user
					WHERE is_dummy=1
					ORDER BY RAND()
					LIMIT 1"; */
					//die();
					$insParti = "INSERT INTO tbl_participants (contest_id, fees_id, user_id, entry_fee, date_created, ticket_no, username, is_dummy,pkg_id)
								SELECT '$liveContestRes', '$txtFid', id, '$txtFees', '$txtDate', '$ticketNo', username, 1,'$pkg_id' 
								FROM tbl_user
								WHERE is_dummy=1
								ORDER BY RAND()
								LIMIT 1";
					$conn->query($insParti);
					$conn->query("update fees_master set contest_id='$getContest' where id='$txtFid'");
				}
				flash( 'fmsg', 'fmsg', $txtNoParti.' participants added successfully.', 'success', 'TRUE' );
				header("Location:create-contest");
				//echo "UPDATE fees_master set dummy_user=1 where id=$txtFid";
				die();
				//$updateFees = $conn->query("UPDATE fees_master set dummy_user=1 where id=$txtFid");
				flash( 'fmsg', 'fmsg', $txtNoParti.' participants added successfully.', 'success', 'TRUE' );
		    header("Location:fees-master");
		    exit();

		    $conn->close();
		  }else{
				flash( 'fmsg', 'fmsg', 'Only '.$aviTicket.' slot available.', 'danger', 'TRUE' );
		    header("Location:create-contest");
		    exit();
			}
		}else{
			flash( 'fmsg', 'fmsg', 'No slot available', 'danger', 'TRUE' );
	    header("Location:create-contest");
	    exit();
		}

	}
}

?>