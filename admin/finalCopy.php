<?php
include('include/security.php');
$data = array();
//echo "select * from fees_master order by id desc";
$feeMaster = $conn->query("select * from fees_master where status=1  order by id desc");
if(mysqli_num_rows($feeMaster)> 0){
    $count = mysqli_num_rows($feeMaster);
    //print_r($count);
    $parent_id =[];
    
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
        $check_status=$fM['check_status'];
        $sold_status =$fM['sold_count'];
        echo "<pre>"; print_r($parent_id);
        // echo "<br> sold status";
          //print_r($fM['sold_count']); 
         //getCopyTable($conn,$status,$fm,$pkg_id,$price,$question,$answer_key,$no_of_winners,$no_of_tickets,$created_date,$modify_date,$tbl_packages_status,$parent_id);
        getCopyTable($conn,$data,$created_date,$modify_date,$count,$check_status,$sold_status);
   }
   
   

}
function getCopyTable($conn,$data,$created_date,$modify_date,$count,$check_status,$sold_status){
     echo "<pre>";
    print_r($sold_status);
    foreach($data as $key =>$datas){
       
        $id = $datas['id'];
        $no_of_tickets = $datas['no_of_tickets'];
        $sold_status =$datas['sold_count'];
       
        //print_r($datas);
          

        $peti = $conn->query("select count(id) as fee_count from tbl_participants where fees_id='$id'");
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
             $conn->query("update fees_master set sold_count= '$fee_count' where id=$parent_id");
            setAnswer($conn,$no_of_tickets,$pPool,$created_date,$modify_date, $fee_count,$userId, $pkg_id,$price,$question,$answer_key,$no_of_winners,$status,$tbl_packages_status,$parent_id,$count,$check_status,$sold_status);
        }
       // break;
    //}
   
    }

}

function setAnswer($conn,$no_of_tickets,$pPool,$created_date,$modify_date, $fee_count,$userId, $pkg_id,$price,$question,$answer_key,$no_of_winners,$status,$tbl_packages_status,$parent_id,$count,$check_status,$sold_status){
    if((int)$no_of_tickets >= (int)$sold_status || $check_status == 0){
        //print_r($userId);
    for($i=0; $i<1; $i++){
            //echo "insert into fees_master (pkg_id,price,question,answer_key,no_of_winners,no_of_tickets,created_date,modify_date,status,tbl_packages_status,parent_id ) VALUES('$pkg_id','$price',' $question',' $answer_key','$no_of_winners','$no_of_tickets','$created_date','$modify_date','$status',' $tbl_packages_status','$parent_id')";
           $conn->query("update fees_master set check_status=1 where id=$parent_id");
            $conn->query("insert into fees_master (pkg_id,price,question,answer_key,no_of_winners,no_of_tickets,created_date,modify_date,status,tbl_packages_status,parent_id ) VALUES('$pkg_id',' $price',' $question',' $answer_key','$no_of_winners','$no_of_tickets','$created_date',' $modify_date','$status',' $tbl_packages_status','$parent_id')");
            
            $last_insert_id = mysqli_insert_id($conn);
            
            if(mysqli_num_rows($pPool)>0){
                while($pf = $pPool->fetch_assoc()){
                    //echo "dfdfd";
                    //print_r($pf);
                    $fees_id = $pf['fees_id'];
                    $rank =$pf['rank'];
                    $prize = $pf['prize'];
                    //echo "insert into fees_master (fees_id,rank,prize,parent_id) VALUES('$last_insert_id',' $rank',' $prize','$fees_id')";
                  $conn->query("insert into prizepool_master (fees_id,rank,prize,parent_id) VALUES('$last_insert_id',' $rank',' $prize','$fees_id')");
                 // $linsertQp=mysqli_insert_id($conn);
                  
                  $contest = $conn->query("select * from tbl_contest where fees_id='$id'");
                  if(mysqli_num_rows($contest)>0){
                      while($contestD = $contest->fetch_assoc()){
                          $start_time= $contestD['start_time'];
                          $end_time = $contestD['end_time'];
                          $status=2;
                          $added_by=$contestD['added_by'];
                          $pkg_id=$contestD['pkg_id'];
                          $fee_id= $last_insert_id;
                          $conn->query("insert into tbl_contest (start_time,end_time,status,added_by,pkg_id,fee_id) VALUES('$start_time',' $end_time',' $status','$added_by','$pkg_id','$fee_id')");
                      }
                  }
                  
                }
            } 
    
    }
    }
}
?>