<?php
include('include/security.php');
$data = array();
//echo "select * from fees_master order by id desc";
$feeMaster = $conn->query("select * from fees_master where status=1 and copy_status=0 order by id desc");
if(mysqli_num_rows($feeMaster)> 0){
    $count = mysqli_num_rows($feeMaster);
    print_r($count);
   while($fM = $feeMaster->fetch_assoc()){
    //echo "<pre>";
       // print_r($fM);
       $data[]=$fM;
        $cDataTime= date("Y-m-d h:i:s");
        $fm = $fM['id'];
        $pkg_id  = $fM['pkg_id'];
        $price  = $fM['price'];
        $question = $fM['question'];
        $answer_key = $fM['answer_key'];
        $no_of_winners = $fM['no_of_winners'];
        $no_of_tickets = $fM['no_of_tickets'];
        $created_date = $cDataTime;
        $modify_date = $cDataTime;
        $status = $fM['status'];
        $tbl_packages_status = $fM['tbl_packages_status'];
        $parent_id = $fM['id'];
        $copy_status=$fM['copy_status'];
         //getCopyTable($conn,$status,$fm,$pkg_id,$price,$question,$answer_key,$no_of_winners,$no_of_tickets,$created_date,$modify_date,$tbl_packages_status,$parent_id);
         
   }
   getCopyTable($conn,$data,$created_date,$modify_date,$count);

}
function getCopyTable($conn,$data,$created_date,$modify_date,$count){
    $num =0;
   // echo "<pre>";
    //print_r($data);
    foreach($data as $key =>$datas){
         echo "<br>";
        $num = mb_strlen($key);
        $num+=$num;
        print_r($key);
    //if(!$key > $count){
       
       
        $id = $datas['id'];
        $no_of_tickets = $datas['no_of_tickets'];

        $peti = $conn->query("select user_id ,count(id) as fee_count from tbl_participants where fees_id='$id'");
        $pPool = $conn->query("select *  from prizepool_master where fees_id='$id'");
        if(mysqli_num_rows($peti)> 0){
            $fee_count= mysqli_num_rows($peti);
           // print_r($fee_count);
            $count2 = $peti->fetch_assoc();
            $fee_count = $count2['fee_count'];
            $userId = $count2['user_id'];
            //$fm = $datas['id'];
            $pkg_id  = $datas['pkg_id'];
            $price  = $datas['price'];
            $question = $datas['question'];
            $answer_key = $datas['answer_key'];
            $no_of_winners = $datas['no_of_winners'];
            $status = $datas['status'];
            $tbl_packages_status = $datas['tbl_packages_status'];
            $parent_id = $datas['id'];

            //echo "<pre>";
            //print_r($fee_count);
            setAnswer($conn,$no_of_tickets,$pPool,$created_date,$modify_date, $fee_count,$userId, $pkg_id,$price,$question,$answer_key,$no_of_winners,$status,$tbl_packages_status,$parent_id,$count,$id);
        }
       // break;
    //}
   
    }

}

function setAnswer($conn,$no_of_tickets,$pPool,$created_date,$modify_date, $fee_count,$userId, $pkg_id,$price,$question,$answer_key,$no_of_winners,$status,$tbl_packages_status,$parent_id,$count,$id){
    //$getContst = getContst($conn,$pkg_id,$id);
//echo "<pre>";
//print_r($getContst[0]);
    $qContst = $conn->query("select * from tbl_contest where pkg_id='$pkg_id'and fee_id='$id' order by id desc ");
    $fcontst = $qContst->fetch_assoc(); 
    echo "<pre>";
    print_r($fcontst);
    if($fee_count >= $no_of_tickets){
       
        $conn->query("update fees_master set copy_status=1 where status=1 and id='$id'");
        //print_r($userId);
    for($i=0;$i<1; $i++){
            //echo "insert into fees_master (pkg_id,price,question,answer_key,no_of_winners,no_of_tickets,created_date,modify_date,status,tbl_packages_status,parent_id ) VALUES('$pkg_id','$price',' $question',' $answer_key','$no_of_winners','$no_of_tickets','$created_date','$modify_date','$status',' $tbl_packages_status','$parent_id')";
            $conn->query("insert into fees_master (pkg_id,price,question,answer_key,no_of_winners,no_of_tickets,created_date,modify_date,status,tbl_packages_status,parent_id ) VALUES('$pkg_id',' $price',' $question',' $answer_key','$no_of_winners','$no_of_tickets','$created_date',' $modify_date','$status',' $tbl_packages_status','$parent_id')");
            $last_insert_id = mysqli_insert_id($conn);
            $conn->query("insert into tbl_contest (start_time,end_time,status,added_by,man_result_flag,auto_result_flag,pkg_id,fee_id ) VALUES(".$fcontst['start_time'].",".$fcontst['end_time'].",'2',".$fcontst['added_by'].",".$fcontst['man_result_flag'].",".$fcontst['auto_result_flag'].",".$fcontst['pkg_id'].",'$last_insert_id')");
            if(mysqli_num_rows($pPool)>0){
                while($pf = $pPool->fetch_assoc()){
                    //echo "dfdfd";
                    //print_r($pf);
                    $fees_id = $pf['fees_id'];
                    $rank =$pf['rank'];
                    $prize = $pf['prize'];
                    //echo "insert into fees_master (fees_id,rank,prize,parent_id) VALUES('$last_insert_id',' $rank',' $prize','$fees_id')";
                  $conn->query("insert into prizepool_master (fees_id,rank,prize,parent_id) VALUES('$last_insert_id',' $rank',' $prize','$fees_id')");
                }
            } 
    
    }
    }
}/* 
function getContst($conn,$pkg_id,$id){
    //echo "select * from tbl_contest where pkg_id='$pkg_id'and fee_id='$id' order by id desc ";
    $contst_array= array();
    $qContst = $conn->query("select * from tbl_contest where pkg_id='$pkg_id'and fee_id='$id' order by id desc ");
    while($fContst =$qContst->fetch_assoc() ){
        $contst_array[]=$fContst;
    }
    return $contst_array;
} */
?>