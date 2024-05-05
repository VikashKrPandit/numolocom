<?php 
    
               include('include/security.php');
                $flag = array();
                $prize_master=array();
                $today = date("Y-m-d");
                //echo $currentDate;
/*                 if(isset($_GET['fee_id']) && isset($_GET['pkg_id'])){
                    $fee_id =$_GET['fee_id'];
                    $pkg_id=$_GET['pkg_id'];
                    echo "select * from fees_master where id='$fee_id' and status='2' order by id desc";
                    $queryFeeMaster ="select * from fees_master where id='$fee_id' and status='2' order by id desc";
                } */
                //echo "select * from fees_master where  status='2' order by id desc";
                $queryFeeMaster ="select * from fees_master where  status='2' order by id desc";

        	    $result = mysqli_query($conn,$queryFeeMaster);
                if(mysqli_num_rows($result)> 0){
                    $fee_row =mysqli_fetch_assoc($result);
                   // print_r($fee_row);
                    if($fee_row['status']==2 && $fee_row['answer_key'] !=NULL){
                        $fee_answerKey = $fee_row['answer_key'];
                        $pkg_id=$fee_row['pkg_id'];
                        $fee_id = $fee_row['id'];
                        $fee_price = $fee_row['price'];
                        $fetching_prizepool_master = mysqli_query($conn,"select * from prizepool_master where fees_id='$fee_id'");
                        if(mysqli_num_rows($fetching_prizepool_master)>0){
                            while($row =mysqli_fetch_array($fetching_prizepool_master)){
                                $prize_master[]=$row;    
                            }

                           // echo "<pre>";
                           // print_r($prize_master);
                        }
                        //prize 1 ticket amount exact match;
                        $perticipent_query1=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$fee_answerKey'");
                        if(mysqli_num_rows($perticipent_query1)> 0){
                            $rowCount1 =mysqli_num_rows($perticipent_query1);
                            //echo "<br/>";
                            //print_r($rowCount1);
                            $win_prize =$prize_master[0][3] / $rowCount1;
                            $rank =$prize_master[0][2];
                            for($i=0;$i<$rowCount1;$i++ ){
                            if(!empty($prize_master[0][0])){
                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize' , rank='$rank' where fees_id='$fee_id' and ticket_no='$fee_answerKey' ");
                             }
                            }

                           
                            // ticket 2
                            $perticipent_query2=mysqli_query($conn,"select MAX(ticket_no) as winner2 from tbl_participants where fees_id='$fee_id' and ticket_no < $fee_answerKey ORDER BY ticket_no DESC");
                            $fetch2 = mysqli_fetch_assoc($perticipent_query2);
                            $scndWingAmnt = $fetch2['winner2'];
                            //echo "<br/>";
                           // print($scndWingAmnt);
                            $scndWinquntity=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$scndWingAmnt'");
                            if(mysqli_num_rows($scndWinquntity) > 0){
                                $rowCount2 = mysqli_num_rows($scndWinquntity);
                                //echo "<br/>";
                                //print_r($rowCount2);
                                $win_prize2 =$prize_master[1][3] / $rowCount2;
                                $rank2=$prize_master[1][2]; 
                                for($i2=0;$i2<$rowCount2;$i2++){
                                    //echo "update tbl_participants set win_prize='$win_prize2' and rank='$rank2' where fees_id='$fee_id' and ticket_no='$scndWingAmnt'";
                                    if(!empty($prize_master[1][0])){
                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize2' , rank='$rank2' where fees_id='$fee_id' and ticket_no='$scndWingAmnt'"); 
                                    }
                                }

                            /*     while($tikf2= mysqli_fetch_assoc($scndWinquntity)){
                                    $user_id2 = $tikf2['user_id'];
                                    $won_balance2=0;
                                    $cur_balance2=0;
                                    $user_fq2 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id2'" );
                                    if(mysqli_num_rows($user_fq2)>0){
                                        while($user_f2 = mysqli_fetch_assoc($user_fq2)){
                                            $tbl_wonbal2=$user_f2['won_balance'];
                                            $tbl_curbal2 = $user_f2['cur_balance']; 
                                            $won_balance2=intval($tbl_wonbal2)+intval($scndWingAmnt); 
                                            $cur_balance2=intval($tbl_curbal2)+intval($scndWingAmnt); 
                                           // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                            mysqli_query($conn,"update tbl_user set won_balance='$won_balance2', cur_balance='$cur_balance2' where id='$user_id2'");
                                        }
                                    }
                                
                                    
                                } */
                                
                            }
                            //third ticket
                            //echo "select MAX(ticket_no) as thirdWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $scndWingAmnt ORDER BY ticket_no DESC";
                            $perticipent_query3=mysqli_query($conn,"select MAX(ticket_no) as winner3 from tbl_participants where fees_id='$fee_id' and ticket_no < $scndWingAmnt ORDER BY ticket_no DESC");
                            $fetch3 = mysqli_fetch_assoc($perticipent_query3);
                            $thirdWingAmnt = $fetch3['winner3'];
                            
                            $thirdWinquntity=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$thirdWingAmnt'");
                            if(mysqli_num_rows($thirdWinquntity) > 0){
                                $rowCount3 = mysqli_num_rows($thirdWinquntity);
                                $win_prize3 =$prize_master[2][3] / $rowCount3;
                                $rank3=$prize_master[2][2]; 
                                for($i3=0;$i3<$rowCount3;$i3++){
                                    if(!empty($prize_master[2][0])){
                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize3' , rank='$rank3' where fees_id='$fee_id' and ticket_no='$thirdWingAmnt'");
                                    } 
                                }
/*                                 while($tikf3= mysqli_fetch_assoc($thirdWinquntity)){
                                    $user_id3 = $tikf3['user_id'];
                                    $won_balance3=0;
                                    $cur_balance3=0;
                                    $user_fq3 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id3'" );
                                    if(mysqli_num_rows($user_fq3)>0){
                                        while($user_f3 = mysqli_fetch_assoc($user_fq1)){
                                            $tbl_wonbal3=$user_f3['won_balance'];
                                            $tbl_curbal3 = $user_f3['cur_balance']; 
                                            $won_balance3=$tbl_wonbal3+$thirdWingAmnt; 
                                            $cur_balance3=intval($tbl_curbal3)+intval($thirdWingAmnt); 
                                           // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                            mysqli_query($conn,"update tbl_user set won_balance='$won_balance3', cur_balance='$cur_balance3' where id='$user_id3'");
                                        }
                                    }
                                
                                    
                                } */
                                
                            }

                                  //forth ticket
                                if(!empty($prize_master[3][0])){
                                  $perticipent_query4=mysqli_query($conn,"select MAX(ticket_no) as winner4 from tbl_participants where fees_id='$fee_id' and ticket_no < $thirdWingAmnt ORDER BY ticket_no DESC");
                                  $fetch4 = mysqli_fetch_assoc($perticipent_query4);
                                  $forthWingAmnt = $fetch4['winner4'];
                                  $forthWinquntity=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$forthWingAmnt'");
                                  if(mysqli_num_rows($forthWinquntity) > 0){
                                      $rowCount4 = mysqli_num_rows($forthWinquntity);
                                      
                                      $win_prize4 =$prize_master[3][3] / $rowCount4;
                                      $rank4=$prize_master[3][2]; 
                                      for($i4=0;$i4<$rowCount4;$i4++){
                                        if(!empty($prize_master[3][0])){
                                           mysqli_query($conn,"update tbl_participants set win_prize='$win_prize4' , rank='$rank4' where fees_id='$fee_id' and ticket_no='$forthWingAmnt'"); 
                                        }
                                      }
                                   /*      while($tikf4= mysqli_fetch_assoc($forthWinquntity)){
                                            $user_id4 = $tikf4['user_id'];
                                            $won_balance4=0;
                                            $cur_balance4=0;
                                            $user_fq4 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id4'" );
                                            if(mysqli_num_rows($user_fq4)>0){
                                                while($user_f4 = mysqli_fetch_assoc($user_fq4)){
                                                    $tbl_wonbal4=$user_f4['won_balance'];
                                                    $tbl_curbal4 = $user_f4['cur_balance']; 
                                                    $won_balance4=$tbl_wonbal4+$forthWingAmnt; 
                                                    $cur_balance4=intval($tbl_curbal4)+intval($forthWingAmnt); 
                                                // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                                    mysqli_query($conn,"update tbl_user set won_balance='$won_balance4', cur_balance='$cur_balance4' where id='$user_id4'");
                                                }
                                            }
                                        
                                            
                                        } */
                                  }
                                }
                                 //5 ticket
                                if(!empty($prize_master[4][0])){
                                  $perticipent_query5=mysqli_query($conn,"select MAX(ticket_no) as winner5 from tbl_participants where fees_id='$fee_id' and ticket_no < $forthWingAmnt ORDER BY ticket_no DESC");
                                  $fetch5 = mysqli_fetch_assoc($perticipent_query5);
                                  $WingAmnt5 = $fetch5['winner5'];
                                  $Winquntity5=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt5'");
                                  if(mysqli_num_rows($Winquntity5) > 0){
                                      $rowCount5 = mysqli_num_rows($Winquntity5);
                                      
                                      $win_prize5 =$prize_master[4][3] / $rowCount5;
                                      $rank5=$prize_master[4][2]; 
                                      for($i5=0;$i5<$rowCount5;$i5++){
                                        if(!empty($prize_master[4][0])){
                                           mysqli_query($conn,"update tbl_participants set win_prize='$win_prize5' , rank='$rank4' where fees_id='$fee_id' and ticket_no='$WingAmnt5'"); 
                                        }
                                      }
/*                                       while($tikf5= mysqli_fetch_assoc($Winquntity5)){
                                        $user_id5 = $tikf5['user_id'];
                                        $won_balance5=0;
                                        $cur_balance5=0;
                                        $user_fq5 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id5'" );
                                        if(mysqli_num_rows($user_fq5)>0){
                                            while($user_f5 = mysqli_fetch_assoc($user_fq5)){
                                                $tbl_wonbal5=$user_f5['won_balance'];
                                                $tbl_curbal5 = $user_f5['cur_balance']; 
                                                $won_balance5=$tbl_wonbal5+$WingAmnt5; 
                                                $cur_balance5=intval($tbl_curbal5)+intval($WingAmnt5); 
                                            echo "update tbl_user set won_balance='$won_balance5', cur_balance='$cur_balance5' where id='$user_id5'";
                                                mysqli_query($conn,"update tbl_user set won_balance='$won_balance5', cur_balance='$cur_balance5' where id='$user_id5'");
                                            }
                                        }
                                    
                                        
                                    } */ 
                                  }
                                }

                                  //6 ticket
                                  if(!empty($prize_master[5][0])){
                                    $perticipent_query6=mysqli_query($conn,"select MAX(ticket_no) as forthWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt5 ORDER BY ticket_no DESC");
                                    $fetch6 = mysqli_fetch_assoc($perticipent_query6);
                                    $WingAmnt6 = $fetch6['forthWinnder'];
                                    $Winquntity6=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt6'");
                                    if(mysqli_num_rows($Winquntity6) > 0){
                                        $rowCount6 = mysqli_num_rows($Winquntity6);
                                        
                                        $win_prize6 =$prize_master[5][3] / $rowCount6;
                                        $rank6=$prize_master[5][2]; 
                                        for($i6=0;$i6<$rowCount6;$i6++){
                                          if(!empty($prize_master[5][0])){
                                             mysqli_query($conn,"update tbl_participants set win_prize='$win_prize6' , rank='$rank6' where fees_id='$fee_id' and ticket_no='$WingAmnt6'"); 
                                          }
                                        }
/*                                         while($tikf1= mysqli_fetch_assoc($Winquntity6)){
                                            $user_id = $tikf1['user_id'];
                                            $won_balance=0;
                                            $cur_balance=0;
                                            $user_fq1 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id'" );
                                            if(mysqli_num_rows($user_fq1)>0){
                                                while($user_f1 = mysqli_fetch_assoc($user_fq1)){
                                                    $tbl_wonbal=$user_f1['won_balance'];
                                                    $tbl_curbal = $user_f1['cur_balance']; 
                                                    $won_balance=$tbl_wonbal+$WingAmnt6; 
                                                    $cur_balance=intval($tbl_curbal)+intval($WingAmnt6); 
                                                // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                                    mysqli_query($conn,"update tbl_user set won_balance='$won_balance', cur_balance='$cur_balance' where id='$user_id'");
                                                }
                                            }
                                        
                                            
                                        }  */                                       
                                    }
                                  }
                                 //7 ticket
                                 if(!empty($prize_master[6][0])){
                                    $perticipent_query7=mysqli_query($conn,"select MAX(ticket_no) as winner7 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt6 ORDER BY ticket_no DESC");
                                    $fetch7 = mysqli_fetch_assoc($perticipent_query7);
                                    $WingAmnt7 = $fetch7['winner7'];
                                    $Winquntity7=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt7'");
                                    if(mysqli_num_rows($Winquntity7) > 0){
                                        $rowCount7 = mysqli_num_rows($Winquntity7);
                                        
                                        $win_prize7 =$prize_master[6][3] / $rowCount7;
                                        $rank7=$prize_master[6][2]; 
                                        for($i7=0;$i7<$rowCount7;$i7++){
                                          if(!empty($prize_master[6][0])){
                                             mysqli_query($conn,"update tbl_participants set win_prize='$win_prize7' , rank='$rank7' where fees_id='$fee_id' and ticket_no='$WingAmnt7'"); 
                                          }
                                        }
/*                                         while($tikf1= mysqli_fetch_assoc($Winquntity7)){
                                            $user_id = $tikf1['user_id'];
                                            $won_balance=0;
                                            $cur_balance=0;
                                            $user_fq1 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id'" );
                                            if(mysqli_num_rows($user_fq1)>0){
                                                while($user_f1 = mysqli_fetch_assoc($user_fq1)){
                                                    $tbl_wonbal=$user_f1['won_balance'];
                                                    $tbl_curbal = $user_f1['cur_balance']; 
                                                    $won_balance=$tbl_wonbal+$WingAmnt7; 
                                                    $cur_balance=intval($tbl_curbal)+intval($WingAmnt7); 
                                                // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                                    mysqli_query($conn,"update tbl_user set won_balance='$won_balance', cur_balance='$cur_balance' where id='$user_id'");
                                                }
                                            }
                                        
                                            
                                        }   */                                       
                                    }
                                  }
                                     //8 ticket
                                    if(!empty($prize_master[7][0])){
                                        $perticipent_query8=mysqli_query($conn,"select MAX(ticket_no) as winner8 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt7 ORDER BY ticket_no DESC");
                                        $fetch8 = mysqli_fetch_assoc($perticipent_query8);
                                        $WingAmnt8 = $fetch8['winner8'];
                                        $Winquntity8=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt8'");
                                        if(mysqli_num_rows($Winquntity8) > 0){
                                            $rowCount8 = mysqli_num_rows($Winquntity8);
                                            
                                            $win_prize8 =$prize_master[7][3] / $rowCount8;
                                            $rank8=$prize_master[7][2]; 
                                            for($i8=0;$i8<$rowCount8;$i8++){
                                              if(!empty($prize_master[7][0])){
                                                 mysqli_query($conn,"update tbl_participants set win_prize='$win_prize8' , rank='$rank8' where fees_id='$fee_id' and ticket_no='$WingAmnt8'"); 
                                              }
                                            } 
 /*                                            while($tikf1= mysqli_fetch_assoc($Winquntity8)){
                                                $user_id = $tikf1['user_id'];
                                                $won_balance=0;
                                                $cur_balance=0;
                                                $user_fq1 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id'" );
                                                if(mysqli_num_rows($user_fq1)>0){
                                                    while($user_f1 = mysqli_fetch_assoc($user_fq1)){
                                                        $tbl_wonbal=$user_f1['won_balance'];
                                                        $tbl_curbal = $user_f1['cur_balance']; 
                                                        $won_balance=$tbl_wonbal+$WingAmnt8; 
                                                        $cur_balance=intval($tbl_curbal)+intval($WingAmnt8); 
                                                    // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                                        mysqli_query($conn,"update tbl_user set won_balance='$won_balance', cur_balance='$cur_balance' where id='$user_id'");
                                                    }
                                                }
                                            
                                                
                                            } */
                                            
                                        }
                                    }
                                        //9 ticket
                                    if(!empty($prize_master[8][0])){
                                            $perticipent_query9=mysqli_query($conn,"select MAX(ticket_no) as winner9 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt8 ORDER BY ticket_no DESC");
                                            $fetch9 = mysqli_fetch_assoc($perticipent_query9);
                                            $WingAmnt9 = $fetch9['winner9'];
                                            $Winquntity9=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt9'");
                                            if(mysqli_num_rows($Winquntity9) > 0){
                                                $rowCount9 = mysqli_num_rows($Winquntity9);
                                                
                                                $win_prize9 =$prize_master[8][3] / $rowCount9;
                                                $rank9=$prize_master[8][2]; 
                                                for($i9=0;$i9<$rowCount9;$i9++){
                                                  if(!empty($prize_master[8][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize9' , rank='$rank9' where fees_id='$fee_id' and ticket_no='$WingAmnt9'"); 
                                                  }
                                                }
/*                                                 while($tikf1= mysqli_fetch_assoc($Winquntity9)){
                                                    $user_id = $tikf1['user_id'];
                                                    $won_balance=0;
                                                    $cur_balance=0;
                                                    $user_fq1 = mysqli_query($conn,"select won_balance,cur_balance from tbl_user where id='$user_id'" );
                                                    if(mysqli_num_rows($user_fq1)>0){
                                                        while($user_f1 = mysqli_fetch_assoc($user_fq1)){
                                                            $tbl_wonbal=$user_f1['won_balance'];
                                                            $tbl_curbal = $user_f1['cur_balance']; 
                                                            $won_balance=$tbl_wonbal+$WingAmnt9; 
                                                            $cur_balance=intval($tbl_curbal)+intval($WingAmnt9); 
                                                        // echo "update tbl_user set won_balance=$won_balance , cur_balance=$cur_balance where id='$user_id'";
                                                            mysqli_query($conn,"update tbl_user set won_balance='$won_balance', cur_balance='$cur_balance' where id='$user_id'");
                                                        }
                                                    }
                                                
                                                    
                                                }   */                                               
                                                
                                            }
                                    }


                                      //10 ticket
                                      if(!empty($prize_master[9][0])){
                                        $perticipent_query10=mysqli_query($conn,"select MAX(ticket_no) as winner10 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt9 ORDER BY ticket_no DESC");
                                        $fetch10 = mysqli_fetch_assoc($perticipent_query10);
                                        $WingAmnt10 = $fetch10['winner10'];
                                        $Winquntity10=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt10'");
                                        if(mysqli_num_rows($Winquntity10) > 0){
                                            $rowCount10 = mysqli_num_rows($Winquntity10);
                                            
                                            $win_prize10 =$prize_master[9][3] / $rowCount10;
                                            $rank10=$prize_master[9][2]; 
                                            for($i10=0;$i10<$rowCount10;$i10++){
                                              if(!empty($prize_master[9][0])){
                                                 mysqli_query($conn,"update tbl_participants set win_prize='$win_prize10' , rank='$rank10' where fees_id='$fee_id' and ticket_no='$WingAmnt10'"); 
                                              }
                                            }                                           
                                        
                                        }
                                      }
                                      //11 ticket
                                      if(!empty($prize_master[10][0])){
                                        $perticipent_query11=mysqli_query($conn,"select MAX(ticket_no) as winner11 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt10 ORDER BY ticket_no DESC");
                                        $fetch11 = mysqli_fetch_assoc($perticipent_query11);
                                        $WingAmnt11 = $fetch11['winner11'];
                                        $Winquntity11=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt11'");
                                        if(mysqli_num_rows($Winquntity11) > 0){
                                            $rowCount11 = mysqli_num_rows($Winquntity11);
                                            
                                            $win_prize11 =$prize_master[10][3] / $rowCount11;
                                            $rank11=$prize_master[10][2]; 
                                            for($i11=0;$i11<$rowCount11;$i11++){
                                              if(!empty($prize_master[10][0])){
                                                 mysqli_query($conn,"update tbl_participants set win_prize='$win_prize11' , rank='$rank11' where fees_id='$fee_id' and ticket_no='$WingAmnt11'"); 
                                              }
                                            }                                           
                                        
                                        }
                                      }
                                       //12 ticket
                                       if(!empty($prize_master[12][0])){
                                        $perticipent_query12=mysqli_query($conn,"select MAX(ticket_no) as winner12 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt11 ORDER BY ticket_no DESC");
                                        $fetch12 = mysqli_fetch_assoc($perticipent_query12);
                                        $WingAmnt12 = $fetch12['winner12'];
                                        $Winquntity12=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt12'");
                                        if(mysqli_num_rows($Winquntity12) > 0){
                                            $rowCount12 = mysqli_num_rows($Winquntity12);
                                            
                                            $win_prize12 =$prize_master[12][3] / $rowCount12;
                                            $rank12=$prize_master[12][2]; 
                                            for($i12=0;$i12<$rowCount12;$i12++){
                                              if(!empty($prize_master[12][0])){
                                                 mysqli_query($conn,"update tbl_participants set win_prize='$win_prize12' , rank='$rank12' where fees_id='$fee_id' and ticket_no='$WingAmnt12'"); 
                                              }
                                            }                                           
                                        
                                        }
 
                                   } 
                                          //13 ticket
                                          if(!empty($prize_master[12][0])){
                                            $perticipent_query13=mysqli_query($conn,"select MAX(ticket_no) as winner13 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt12 ORDER BY ticket_no DESC");
                                            $fetch13 = mysqli_fetch_assoc($perticipent_query13);
                                            $WingAmnt13 = $fetch13['winner13'];
                                            $Winquntity13=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt13'");
                                            if(mysqli_num_rows($Winquntity13) > 0){
                                                $rowCount13 = mysqli_num_rows($Winquntity13);
                                                
                                                $win_prize13 =$prize_master[12][3] / $rowCount13;
                                                $rank13=$prize_master[12][2]; 
                                                for($i13=0;$i13<$rowCount13;$i13++){
                                                  if(!empty($prize_master[12][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize13' , rank='$rank13' where fees_id='$fee_id' and ticket_no='$WingAmnt13'"); 
                                                  }
                                                }                                           
                                            
                                            }
   
                                     }
                                                                  //13 ticket
                                          if(!empty($prize_master[12][0])){
                                            $perticipent_query13=mysqli_query($conn,"select MAX(ticket_no) as winner13 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt12 ORDER BY ticket_no DESC");
                                            $fetch13 = mysqli_fetch_assoc($perticipent_query13);
                                            $WingAmnt13 = $fetch13['winner13'];
                                            $Winquntity13=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt13'");
                                            if(mysqli_num_rows($Winquntity13) > 0){
                                                $rowCount13 = mysqli_num_rows($Winquntity13);
                                                
                                                $win_prize13 =$prize_master[12][3] / $rowCount13;
                                                $rank13=$prize_master[12][2]; 
                                                for($i13=0;$i13<$rowCount13;$i13++){
                                                  if(!empty($prize_master[12][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize13' , rank='$rank13' where fees_id='$fee_id' and ticket_no='$WingAmnt13'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          } 
                                          //14 ticket
                                          if(!empty($prize_master[13][0])){
                                            $perticipent_query14=mysqli_query($conn,"select MAX(ticket_no) as winner14 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt13 ORDER BY ticket_no DESC");
                                            $fetch14 = mysqli_fetch_assoc($perticipent_query14);
                                            $WingAmnt14 = $fetch14['winner14'];
                                            $Winquntity14=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt14'");
                                            if(mysqli_num_rows($Winquntity14) > 0){
                                                $rowCount14 = mysqli_num_rows($Winquntity14);
                                                
                                                $win_prize14 =$prize_master[13][3] / $rowCount14;
                                                $rank14=$prize_master[13][2]; 
                                                for($i14=0;$i14<$rowCount14;$i14++){
                                                  if(!empty($prize_master[13][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize14' , rank='$rank14' where fees_id='$fee_id' and ticket_no='$WingAmnt14'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          }                                     
                                          //15 ticket
                                          if(!empty($prize_master[14][0])){
                                            $perticipent_query15=mysqli_query($conn,"select MAX(ticket_no) as winner15 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt14 ORDER BY ticket_no DESC");
                                            $fetch15 = mysqli_fetch_assoc($perticipent_query15);
                                            $WingAmnt15 = $fetch15['winner15'];
                                            $Winquntity15=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt15'");
                                            if(mysqli_num_rows($Winquntity15) > 0){
                                                $rowCount15 = mysqli_num_rows($Winquntity15);
                                                
                                                $win_prize15 =$prize_master[14][3] / $rowCount15;
                                                $rank15=$prize_master[14][2]; 
                                                for($i15=0;$i15<$rowCount15;$i15++){
                                                  if(!empty($prize_master[14][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize15' , rank='$rank15' where fees_id='$fee_id' and ticket_no='$WingAmnt15'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          }
                                          //16 ticket
                                          if(!empty($prize_master[15][0])){
                                            $perticipent_query16=mysqli_query($conn,"select MAX(ticket_no) as winner16 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt15 ORDER BY ticket_no DESC");
                                            $fetch16 = mysqli_fetch_assoc($perticipent_query16);
                                            $WingAmnt16 = $fetch16['winner16'];
                                            $Winquntity16=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt16'");
                                            if(mysqli_num_rows($Winquntity16) > 0){
                                                $rowCount16 = mysqli_num_rows($Winquntity16);
                                                
                                                $win_prize16 =$prize_master[15][3] / $rowCount16;
                                                $rank16=$prize_master[15][2]; 
                                                for($i16=0;$i16<$rowCount16;$i16++){
                                                  if(!empty($prize_master[15][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize16' , rank='$rank16' where fees_id='$fee_id' and ticket_no='$WingAmnt16'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          } 
                                          //17 ticket
                                          if(!empty($prize_master[16][0])){
                                            $perticipent_query17=mysqli_query($conn,"select MAX(ticket_no) as winner17 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt16 ORDER BY ticket_no DESC");
                                            $fetch17 = mysqli_fetch_assoc($perticipent_query17);
                                            $WingAmnt17 = $fetch17['winner17'];
                                            $Winquntity17=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt17'");
                                            if(mysqli_num_rows($Winquntity17) > 0){
                                                $rowCount17 = mysqli_num_rows($Winquntity17);
                                                
                                                $win_prize17 =$prize_master[16][3] / $rowCount17;
                                                $rank17=$prize_master[16][2]; 
                                                for($i17=0;$i17<$rowCount17;$i17++){
                                                  if(!empty($prize_master[16][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize17' , rank='$rank17' where fees_id='$fee_id' and ticket_no='$WingAmnt17'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          }
                                          //18 ticket
                                          if(!empty($prize_master[17][0])){
                                            $perticipent_query18=mysqli_query($conn,"select MAX(ticket_no) as winner18 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt17 ORDER BY ticket_no DESC");
                                            $fetch18 = mysqli_fetch_assoc($perticipent_query18);
                                            $WingAmnt18 = $fetch18['winner18'];
                                            $Winquntity18=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt18'");
                                            if(mysqli_num_rows($Winquntity18) > 0){
                                                $rowCount18 = mysqli_num_rows($Winquntity18);
                                                
                                                $win_prize18 =$prize_master[17][3] / $rowCount18;
                                                $rank18=$prize_master[17][2]; 
                                                for($i18=0;$i18<$rowCount18;$i18++){
                                                  if(!empty($prize_master[17][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize18' , rank='$rank18' where fees_id='$fee_id' and ticket_no='$WingAmnt18'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          }
                                          //19 ticket
                                          if(!empty($prize_master[18][0])){
                                            $perticipent_query19=mysqli_query($conn,"select MAX(ticket_no) as winner19 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt18 ORDER BY ticket_no DESC");
                                            $fetch19 = mysqli_fetch_assoc($perticipent_query19);
                                            $WingAmnt19 = $fetch19['winner19'];
                                            $Winquntity19=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt19'");
                                            if(mysqli_num_rows($Winquntity19) > 0){
                                                $rowCount19 = mysqli_num_rows($Winquntity19);
                                                
                                                $win_prize19 =$prize_master[18][3] / $rowCount19;
                                                $rank19=$prize_master[18][2]; 
                                                for($i19=0;$i19<$rowCount19;$i19++){
                                                  if(!empty($prize_master[18][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize19' , rank='$rank19' where fees_id='$fee_id' and ticket_no='$WingAmnt19'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          }
                                          //20 ticket
                                          if(!empty($prize_master[19][0])){
                                            $perticipent_query20=mysqli_query($conn,"select MAX(ticket_no) as winner20 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt19 ORDER BY ticket_no DESC");
                                            $fetch20 = mysqli_fetch_assoc($perticipent_query20);
                                            $WingAmnt20 = $fetch20['winner20'];
                                            $Winquntity20=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt20'");
                                            if(mysqli_num_rows($Winquntity20) > 0){
                                                $rowCount20 = mysqli_num_rows($Winquntity20);
                                                
                                                $win_prize20 =$prize_master[19][3] / $rowCount20;
                                                $rank20=$prize_master[19][2]; 
                                                for($i20=0;$i20<$rowCount20;$i20++){
                                                  if(!empty($prize_master[19][0])){
                                                     mysqli_query($conn,"update tbl_participants set win_prize='$win_prize20' , rank='$rank20' where fees_id='$fee_id' and ticket_no='$WingAmnt20'"); 
                                                  }
                                                }                                           
                                            
                                            }
                                          }                       
                            }
                        else {
                           // echo "no data match";
                                        //prize 1 ticket amount exact match;
                            //echo "select MAX(ticket_no) as firstWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $fee_answerKey";
                           // echo "t1 <br/>";
                            //echo "select ticket_no as firstWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $fee_answerKey ORDER BY ticket_no DESC LIMIT 1";
                            //echo "<br/>";
                            $perticipent_query1=mysqli_query($conn,"select ticket_no as winner1 from tbl_participants where fees_id='$fee_id' and ticket_no < $fee_answerKey ORDER BY ticket_no DESC LIMIT 1");
                            if(mysqli_num_rows($perticipent_query1)> 0){
                                    $rowFetch = mysqli_fetch_assoc($perticipent_query1);
                                    $rowFetchR= $rowFetch['winner1'];
                                    $rowCount1Q= mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no ='$rowFetchR' ORDER BY ticket_no DESC");
                                    if(mysqli_num_rows($rowCount1Q) > 0){
                                        $rowCount1 =mysqli_num_rows($rowCount1Q);
                                        $win_prize =$prize_master[0][3] / $rowCount1;
                                        $rank =$prize_master[0][2];
                                        for($i=0;$i<$rowCount1;$i++ ){
                                            if(!empty($prize_master[0][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize' , rank='$rank' where fees_id='$fee_id' and ticket_no='$rowFetchR' ");
                                            }
                                        }
                                    }
                               
                                    // ticket 2
                                    /* echo "t2 <br/>";
                                    echo "select MAX(ticket_no) as secondWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $rowFetchR ORDER BY ticket_no DESC";
                                    echo "<br/>"; */
                                    $perticipent_query2=mysqli_query($conn,"select ticket_no as secondWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $rowFetchR ORDER BY ticket_no DESC LIMIT 1");
                                    $fetch2 = mysqli_fetch_assoc($perticipent_query2);
                                    $scndWingAmnt = $fetch2['secondWinnder'];
                                    //echo "elseblock_2 <br/>";
                                    //print_r($scndWingAmnt);
                                    $scndWinquntity=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$scndWingAmnt'");
                                    if(mysqli_num_rows($scndWinquntity) > 0){
                                        $rowCount2 = mysqli_num_rows($scndWinquntity);
                                        $win_prize2 =$prize_master[1][3] / $rowCount2;
                                        $rank2=$prize_master[1][2]; 
                                        for($i2=0;$i2<$rowCount2;$i2++){
                                            if(!empty($prize_master[1][0])){
                                            mysqli_query($conn,"update tbl_participants set win_prize='$win_prize2' , rank='$rank2' where fees_id='$fee_id' and ticket_no='$scndWingAmnt' "); 
                                            }
                                        }
                                        
                                    }
                                    //third ticket
                                    $perticipent_query3=mysqli_query($conn,"select ticket_no as thirdWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $scndWingAmnt ORDER BY ticket_no DESC LIMIT 1");
                                    $fetch3 = mysqli_fetch_assoc($perticipent_query3);
                                    $thirdWingAmnt = $fetch3['thirdWinnder'];
                                   /*  echo "elseblock_3 <br/>";
                                    print_r($thirdWingAmnt); */
                                    $thirdWinquntity=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$thirdWingAmnt'");
                                    if(mysqli_num_rows($thirdWinquntity) > 0){
                                        $rowCount3 = mysqli_num_rows($thirdWinquntity);
                                        $win_prize3 =$prize_master[2][3] / $rowCount3;
                                        $rank3=$prize_master[2][2]; 
                                        for($i3=0;$i3<$rowCount3;$i3++){
                                            if(!empty($prize_master[2][0])){
                                            mysqli_query($conn,"update tbl_participants set win_prize='$win_prize3' , rank='$rank3' where fees_id='$fee_id' and ticket_no='$thirdWingAmnt'"); 
                                            }
                                        }
                                        
                                    }

                                        //forth ticket
                                        //echo "select MAX(ticket_no) as forthWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $thirdWingAmnt ORDER BY ticket_no DESC";
                                    if(!empty($prize_master[3][0])){
                                        $perticipent_query4=mysqli_query($conn,"select ticket_no as forthWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $thirdWingAmnt ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch4 = mysqli_fetch_assoc($perticipent_query4);
                                        $forthWingAmnt = $fetch4['forthWinnder'];
                                        $forthWinquntity=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$forthWingAmnt'");
                                        if(mysqli_num_rows($forthWinquntity) > 0){
                                            $rowCount4 = mysqli_num_rows($forthWinquntity);
                                            $win_prize4 =$prize_master[3][3] / $rowCount4;
                                            $rank4=$prize_master[3][2]; 
                                            for($i4=0;$i4<$rowCount4;$i4++){
                                                if(!empty($prize_master[3][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize4' , rank='$rank4' where fees_id='$fee_id' and ticket_no='$forthWingAmnt'"); 
                                                }
                                            }
                                            
                                        }
                                    }
                                        //5 ticket
                                        //echo "select MAX(ticket_no) as forthWinnder from tbl_participants where fees_id='$fee_id' and ticket_no < $thirdWingAmnt ORDER BY ticket_no DESC";
                                        if(!empty($prize_master[4][0])){
                                            $perticipent_query5=mysqli_query($conn,"select ticket_no as winner5 from tbl_participants where fees_id='$fee_id' and ticket_no < $forthWingAmnt ORDER BY ticket_no DESC LIMIT 1");
                                            $fetch5 = mysqli_fetch_assoc($perticipent_query5);
                                            $WingAmnt5 = $fetch5['winner5'];
                                            $Winquntity5=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt5'");
                                            if(mysqli_num_rows($Winquntity5) > 0){
                                                $rowCount5 = mysqli_num_rows($Winquntity5);
                                                $win_prize5 =$prize_master[4][3] / $rowCount5;
                                                $rank5=$prize_master[4][2]; 
                                                for($i5=0;$i5<$rowCount5;$i5++){
                                                    if(!empty($prize_master[4][0])){
                                                    mysqli_query($conn,"update tbl_participants set win_prize='$win_prize5' , rank='$rank5' where fees_id='$fee_id' and ticket_no='$WingAmnt5'"); 
                                                    }
                                                }
                                                
                                            }
                                        }
                                        //6th ticket
                                        if(!empty($prize_master[5][0])){
                                            $perticipent_query6=mysqli_query($conn,"select ticket_no as winner6 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt5 ORDER BY ticket_no DESC LIMIT 1");
                                            $fetch6 = mysqli_fetch_assoc($perticipent_query6);
                                            $WingAmnt6 = $fetch6['winner6'];
                                            $Winquntity6=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt6'");
                                            if(mysqli_num_rows($Winquntity6) > 0){
                                                $rowCount6 = mysqli_num_rows($Winquntity6);
                                                $win_prize6 =$prize_master[5][3] / $rowCount6;
                                                $rank6=$prize_master[5][2]; 
                                                for($i6=0;$i6<$rowCount6;$i6++){
                                                    if(!empty($prize_master[5][0])){
                                                    mysqli_query($conn,"update tbl_participants set win_prize='$win_prize6' , rank='$rank6' where fees_id='$fee_id' and ticket_no='$WingAmnt6'"); 
                                                    }
                                                }
                                                
                                            }
                                        }
                                        //6th ticket
                                        if(!empty($prize_master[5][0])){
                                            $perticipent_query6=mysqli_query($conn,"select ticket_no as winner6 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt5 ORDER BY ticket_no DESC LIMIT 1");
                                            $fetch6 = mysqli_fetch_assoc($perticipent_query6);
                                            $WingAmnt6 = $fetch6['winner6'];
                                            $Winquntity6=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt6'");
                                            if(mysqli_num_rows($Winquntity6) > 0){
                                                $rowCount6 = mysqli_num_rows($Winquntity6);
                                                $win_prize6 =$prize_master[5][3] / $rowCount6;
                                                $rank6=$prize_master[5][2]; 
                                                for($i6=0;$i6<$rowCount6;$i6++){
                                                    if(!empty($prize_master[5][0])){
                                                    mysqli_query($conn,"update tbl_participants set win_prize='$win_prize6' , rank='$rank6' where fees_id='$fee_id' and ticket_no='$WingAmnt6'"); 
                                                    }
                                                }
                                                
                                            }
                                        }
                                        //7th ticket
                                        if(!empty($prize_master[6][0])){
                                            $perticipent_query7=mysqli_query($conn,"select ticket_no as winner7 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt6 ORDER BY ticket_no DESC LIMIT 1");
                                            $fetch7 = mysqli_fetch_assoc($perticipent_query7);
                                            $WingAmnt7 = $fetch7['winner7'];
                                            $Winquntity7=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt7'");
                                            if(mysqli_num_rows($Winquntity7) > 0){
                                                $rowCount7 = mysqli_num_rows($Winquntity7);
                                                $win_prize7 =$prize_master[6][3] / $rowCount7;
                                                $rank7=$prize_master[6][2]; 
                                                for($i7=0;$i7<$rowCount7;$i7++){
                                                    if(!empty($prize_master[6][0])){
                                                    mysqli_query($conn,"update tbl_participants set win_prize='$win_prize7' , rank='$rank7' where fees_id='$fee_id' and ticket_no='$WingAmnt7'"); 
                                                    }
                                                }
                                                
                                            }
                                        }
                                    //8th ticket
                                    if(!empty($prize_master[7][0])){
                                        $perticipent_query8=mysqli_query($conn,"select ticket_no as winner8 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt7 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch8 = mysqli_fetch_assoc($perticipent_query8);
                                        $WingAmnt8 = $fetch8['winner8'];
                                        $Winquntity8=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt8'");
                                        if(mysqli_num_rows($Winquntity8) > 0){
                                            $rowCount8 = mysqli_num_rows($Winquntity8);
                                            $win_prize8 =$prize_master[7][3] / $rowCount8;
                                            $rank8=$prize_master[7][2]; 
                                            for($i8=0;$i8<$rowCount8;$i8++){
                                                if(!empty($prize_master[7][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize8' , rank='$rank8' where fees_id='$fee_id' and ticket_no='$WingAmnt8'"); 
                                                }
                                            }
                                            
                                        }
                                    }
                                    //9th ticket
                                    if(!empty($prize_master[8][0])){
                                        $perticipent_query9=mysqli_query($conn,"select ticket_no as winner9 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt8 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch9 = mysqli_fetch_assoc($perticipent_query9);
                                        $WingAmnt9 = $fetch9['winner9'];
                                        $Winquntity9=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt9'");
                                        if(mysqli_num_rows($Winquntity9) > 0){
                                            $rowCount9 = mysqli_num_rows($Winquntity9);
                                            $win_prize9 =$prize_master[8][3] / $rowCount9;
                                            $rank9=$prize_master[8][2]; 
                                            for($i9=0;$i9<$rowCount9;$i9++){
                                                if(!empty($prize_master[8][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize9' , rank='$rank9' where fees_id='$fee_id' and ticket_no='$WingAmnt9'"); 
                                                }
                                            }
                                            
                                        }
                                    }                                    
                                     //10th ticket
                                     if(!empty($prize_master[9][0])){
                                        $perticipent_query10=mysqli_query($conn,"select ticket_no as winner10 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt9 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch10 = mysqli_fetch_assoc($perticipent_query10);
                                        $WingAmnt10 = $fetch10['winner10'];
                                        $Winquntity10=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt10'");
                                        if(mysqli_num_rows($Winquntity10) > 0){
                                            $rowCount10 = mysqli_num_rows($Winquntity10);
                                            $win_prize10 =$prize_master[9][3] / $rowCount10;
                                            $rank10=$prize_master[9][2]; 
                                            for($i10=0;$i10<$rowCount10;$i10++){
                                                if(!empty($prize_master[9][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize10' , rank='$rank10' where fees_id='$fee_id' and ticket_no='$WingAmnt10'"); 
                                                }
                                            }
                                            
                                        }
                                    }                                  
                                      //11th ticket
                                     if(!empty($prize_master[10][0])){
                                        $perticipent_query11=mysqli_query($conn,"select ticket_no as winner11 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt10 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch11 = mysqli_fetch_assoc($perticipent_query11);
                                        $WingAmnt11 = $fetch11['winner11'];
                                        $Winquntity11=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt11'");
                                        if(mysqli_num_rows($Winquntity11) > 0){
                                            $rowCount11 = mysqli_num_rows($Winquntity11);
                                            $win_prize11 =$prize_master[10][3] / $rowCount11;
                                            $rank11=$prize_master[10][2]; 
                                            for($i11=0;$i11<$rowCount11;$i11++){
                                                if(!empty($prize_master[10][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize11' , rank='$rank11' where fees_id='$fee_id' and ticket_no='$WingAmnt11'"); 
                                                }
                                            }
                                            
                                        }
                                    }                                
                                         //12th ticket
                                         if(!empty($prize_master[11][0])){
                                            $perticipent_query12=mysqli_query($conn,"select ticket_no as winner12 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt11 ORDER BY ticket_no DESC LIMIT 1");
                                            $fetch12 = mysqli_fetch_assoc($perticipent_query12);
                                            $WingAmnt12 = $fetch12['winner12'];
                                            $Winquntity12=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt12'");
                                            if(mysqli_num_rows($Winquntity12) > 0){
                                                $rowCount12 = mysqli_num_rows($Winquntity12);
                                                $win_prize12 =$prize_master[11][3] / $rowCount12;
                                                $rank12=$prize_master[11][2]; 
                                                for($i12=0;$i12<$rowCount12;$i12++){
                                                    if(!empty($prize_master[11][0])){
                                                    mysqli_query($conn,"update tbl_participants set win_prize='$win_prize12' , rank='$rank12' where fees_id='$fee_id' and ticket_no='$WingAmnt12'"); 
                                                    }
                                                }
                                                
                                            }
                                        }                            
                               
                                         //13th ticket
                                         if(!empty($prize_master[12][0])){
                                            $perticipent_query13=mysqli_query($conn,"select ticket_no as winner13 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt12 ORDER BY ticket_no DESC LIMIT 1");
                                            $fetch13 = mysqli_fetch_assoc($perticipent_query13);
                                            $WingAmnt13 = $fetch13['winner13'];
                                            $Winquntity13=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt13'");
                                            if(mysqli_num_rows($Winquntity13) > 0){
                                                $rowCount13 = mysqli_num_rows($Winquntity13);
                                                $win_prize13 =$prize_master[12][3] / $rowCount13;
                                                $rank13=$prize_master[12][2]; 
                                                for($i13=0;$i13<$rowCount13;$i13++){
                                                    if(!empty($prize_master[12][0])){
                                                    mysqli_query($conn,"update tbl_participants set win_prize='$win_prize13' , rank='$rank13' where fees_id='$fee_id' and ticket_no='$WingAmnt13'"); 
                                                    }
                                                }
                                                
                                            }
                                        }                            
                               
                                     //14th ticket
                                     if(!empty($prize_master[13][0])){
                                        $perticipent_query14=mysqli_query($conn,"select ticket_no as winner14 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt13 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch14 = mysqli_fetch_assoc($perticipent_query14);
                                        $WingAmnt14= $fetch14['winner14'];
                                        $Winquntity14=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt14'");
                                        if(mysqli_num_rows($Winquntity14) > 0){
                                            $rowCount14 = mysqli_num_rows($Winquntity14);
                                            $win_prize14 =$prize_master[13][3] / $rowCount14;
                                            $rank14=$prize_master[13][2]; 
                                            for($i14=0;$i14<$rowCount14;$i14++){
                                                if(!empty($prize_master[13][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize14' , rank='$rank14' where fees_id='$fee_id' and ticket_no='$WingAmnt14'"); 
                                                }
                                            }
                                            
                                        }
                                    }                                
                                     //15th ticket
                                     if(!empty($prize_master[14][0])){
                                        $perticipent_query15=mysqli_query($conn,"select ticket_no as winner15 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt14 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch15 = mysqli_fetch_assoc($perticipent_query15);
                                        $WingAmnt15 = $fetch15['winner15'];
                                        $Winquntity15=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt15'");
                                        if(mysqli_num_rows($Winquntity15) > 0){
                                            $rowCount15 = mysqli_num_rows($Winquntity15);
                                            $win_prize15 =$prize_master[14][3] / $rowCount15;
                                            $rank15=$prize_master[14][2]; 
                                            for($i15=0;$i15<$rowCount15;$i15++){
                                                if(!empty($prize_master[14][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize15' , rank='$rank15' where fees_id='$fee_id' and ticket_no='$WingAmnt15'"); 
                                                }
                                            }
                                            
                                        }
                                    }                                
                                     //16th ticket
                                     if(!empty($prize_master[15][0])){
                                        $perticipent_query16=mysqli_query($conn,"select ticket_no as winner16 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt15 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch16 = mysqli_fetch_assoc($perticipent_query16);
                                        $WingAmnt16 = $fetch16['winner16'];
                                        $Winquntity16=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt16'");
                                        if(mysqli_num_rows($Winquntity16) > 0){
                                            $rowCount16= mysqli_num_rows($Winquntity16);
                                            $win_prize16 =$prize_master[15][3] / $rowCount16;
                                            $rank16=$prize_master[15][2]; 
                                            for($i16=0;$i16<$rowCount16;$i16++){
                                                if(!empty($prize_master[15][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize16' , rank='$rank16' where fees_id='$fee_id' and ticket_no='$WingAmnt16'"); 
                                                }
                                            }
                                            
                                        }
                                    } 
                                
                                     //17th ticket
                                     if(!empty($prize_master[16][0])){
                                        $perticipent_query17=mysqli_query($conn,"select ticket_no as winner17 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt16 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch17 = mysqli_fetch_assoc($perticipent_query17);
                                        $WingAmnt17 = $fetch17['winner17'];
                                        $Winquntity17=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt17'");
                                        if(mysqli_num_rows($Winquntity17) > 0){
                                            $rowCount17 = mysqli_num_rows($Winquntity17);
                                            $win_prize17 =$prize_master[16][3] / $rowCount17;
                                            $rank17=$prize_master[16][2]; 
                                            for($i17=0;$i17<$rowCount17;$i17++){
                                                if(!empty($prize_master[16][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize17' , rank='$rank17' where fees_id='$fee_id' and ticket_no='$WingAmnt17'"); 
                                                }
                                            }
                                            
                                        }
                                    }                                     

                                     //18th ticket
                                     if(!empty($prize_master[17][0])){
                                        $perticipent_query18=mysqli_query($conn,"select ticket_no as winner18 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt17 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch18 = mysqli_fetch_assoc($perticipent_query18);
                                        $WingAmnt18 = $fetch18['winner18'];
                                        $Winquntity18=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt18'");
                                        if(mysqli_num_rows($Winquntity18) > 0){
                                            $rowCount18 = mysqli_num_rows($Winquntity18);
                                            $win_prize18 =$prize_master[17][3] / $rowCount18;
                                            $rank18=$prize_master[17][2]; 
                                            for($i18=0;$i18<$rowCount18;$i18++){
                                                if(!empty($prize_master[17][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize18' , rank='$rank18' where fees_id='$fee_id' and ticket_no='$WingAmnt18'"); 
                                                }
                                            }
                                            
                                        }
                                    }
                                      //19th ticket
                                      if(!empty($prize_master[18][0])){
                                        $perticipent_query19=mysqli_query($conn,"select ticket_no as winner19 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt18 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch19 = mysqli_fetch_assoc($perticipent_query19);
                                        $WingAmnt19 = $fetch19['winner19'];
                                        $Winquntity19=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt19'");
                                        if(mysqli_num_rows($Winquntity19) > 0){
                                            $rowCount19 = mysqli_num_rows($Winquntity19);
                                            $win_prize19 =$prize_master[18][3] / $rowCount19;
                                            $rank19=$prize_master[18][2]; 
                                            for($i19=0;$i19<$rowCount19;$i19++){
                                                if(!empty($prize_master[18][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize19' , rank='$rank19' where fees_id='$fee_id' and ticket_no='$WingAmnt19'"); 
                                                }
                                            }
                                            
                                        }
                                    }                            
                                      //20th ticket
                                      if(!empty($prize_master[19][0])){
                                        $perticipent_query20=mysqli_query($conn,"select ticket_no as winner20 from tbl_participants where fees_id='$fee_id' and ticket_no < $WingAmnt19 ORDER BY ticket_no DESC LIMIT 1");
                                        $fetch20 = mysqli_fetch_assoc($perticipent_query20);
                                        $WingAmnt20 = $fetch20['winner20'];
                                        $Winquntity20=mysqli_query($conn,"select * from tbl_participants where fees_id='$fee_id' and ticket_no='$WingAmnt20'");
                                        if(mysqli_num_rows($Winquntity20) > 0){
                                            $rowCount20 = mysqli_num_rows($Winquntity20);
                                            $win_prize20 =$prize_master[19][3] / $rowCount20;
                                            $rank20=$prize_master[19][2]; 
                                            for($i20=0;$i20<$rowCount20;$i20++){
                                                if(!empty($prize_master[19][0])){
                                                mysqli_query($conn,"update tbl_participants set win_prize='$win_prize20' , rank='$rank20' where fees_id='$fee_id' and ticket_no='$WingAmnt20'"); 
                                                }
                                            }
                                            
                                        }
                                    }                            
                                    
                               
                            }
                           
                        }



                    }
                }
                else{
                    echo "no thing to display";
                }
                //header('location:create-contest.php');
                //exit();
?>