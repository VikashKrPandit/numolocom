<fieldset>
    <form action="" method="post">
    <input type="text" name='id' placeholder="id"><br>
    <input type="text" name='request_name' placeholder="request_name"><br>
    <input type="text" name='req_from' placeholder="req_from"><br>
    <input type="text" name='req_amount' placeholder="req_amount"><br>
    <input type="text" name='getway_name' placeholder="getway_name"><br>
    <input type="text" name='ifsc_code' placeholder="ifsc_code"><br>
    <input type="submit" name="submit">
    </form>
</fieldset>

<?php
$conn = mysqli_connect("localhost","root","","numolo_web_admin");
             if(isset($_POST['submit']) && isset($_POST['request_name']) && isset($_POST['id'])) {
                print_r($_POST);
                //die();
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $request_name = mysqli_real_escape_string($conn, $_POST['request_name']);
                $req_from = mysqli_real_escape_string($conn, $_POST['req_from']);
                $req_amount = mysqli_real_escape_string($conn, $_POST['req_amount']);
                $getway_name = mysqli_real_escape_string($conn, $_POST['getway_name']);
                $ifsc_code = mysqli_real_escape_string($conn,$_POST['ifsc_code']);
                        
                $current_time = time();
                $order_id = $current_time.$id;
                
                $sql = "Select id from tbl_transaction WHERE user_id = '$id' AND is_withdraw = '1' AND type = '0' AND status = '0'";
                $res = mysqli_query($conn, $sql);
                $num_res = mysqli_num_rows($res);
                
                if ($num_res == 0) {    
                    $qry = "SELECT cur_balance, won_balance, acc_status FROM tbl_user WHERE id = '$id'"; 
                    $userdata = mysqli_fetch_array(mysqli_query($conn,$qry));
                    $dep_balance = $userdata['cur_balance'];
                    $won_balance = $userdata['won_balance'];
                    $acc_status = $userdata['acc_status'];
                    $tot_balance = $dep_balance + $won_balance;
                    
                    if ($acc_status == '0') {
                        $set['result'][] = array('msg' => "oops! You haven't submit bank details or not approved yet.",'success'=>'0');
						header( 'Content-Type: application/json; charset=utf-8' );
						echo $json = json_encode($set);
                    }
                    else if ($won_balance >= $req_amount) {
                        mysqli_autocommit($conn, false);
                        $flag = true;
                        
                        $new_won_balance = $won_balance - $req_amount;

                        $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, request_name, req_from, req_amount, getway_name, remark, type, date, status, is_withdraw,ifsc_code) 
                        VALUES ('$id', '$order_id', '$request_name', '$req_from', '$req_amount', '$getway_name', 'Withdraw Requested', '0', '$current_time', '0', '1','$ifsc_code')";
                    
                        $sql2 = "UPDATE tbl_user SET won_balance = '$new_won_balance' WHERE id = '$id'";    
                        
                        $result = mysqli_query($conn, $sql1);
                        if (!$result) {
                            $flag = false;
                            echo "Error details: " . mysqli_error($conn) . ".";
                        }
                        
                        $result = mysqli_query($conn, $sql2);
                        if (!$result) {
                            $flag = false;
                            echo "Error details: " . mysqli_error($conn) . ".";
                        }
    
                        if ($flag) {
                            mysqli_commit($conn);
                            $set['result'][] = array('msg' => "Withdraw Requested!", 'success'=>'1');
        				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                        } else {
                            mysqli_rollback($conn);
                            $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
        				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                        }
                    } else {
						$set['result'][] = array('msg' => "oops! You don't have enough winning balance to redeem.",'success'=>'0');
						echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
					}
                }
                else {
                    $set['result'][] = array('msg' => "Oops! You can't send new withdraw request until old one review.",'success'=>'0');
                    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                }
            } else if(isset($_POST['payment_id']) && isset($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);
                $req_amount = mysqli_real_escape_string($conn, $_POST['req_amount']);
                $getway_name = mysqli_real_escape_string($conn, $_POST['getway_name']);
                $current_time = time();
                $order_id = $current_time.$id;
                $ifsc_code = mysqli_real_escape_string($conn,$_POST['ifsc_code']);
                
                mysqli_autocommit($conn, false);
                $flag = true;
                        
                $sql0 = "SELECT cur_balance FROM tbl_user WHERE id = '$id'"; 
                $userdata = mysqli_fetch_array(mysqli_query($conn,$sql0));
                $dep_balance = $userdata['cur_balance'];
                $new_dep_balance = $dep_balance + $req_amount;
                
                $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, payment_id, req_amount, getway_name, remark, type, date, status, is_withdraw,ifsc_code) 
                VALUES ('$id', '$order_id', '$payment_id', '$req_amount', '$getway_name', 'Deposited', '1', '$current_time', '1', '0','$ifsc_code')";
            
                $sql2 = "UPDATE tbl_user SET cur_balance = '$new_dep_balance' WHERE id = '$id'";    
                
                $result = mysqli_query($conn, $sql1);
                if (!$result) {
                    $flag = false;
                    echo "Error details: " . mysqli_error($conn) . ".";
                }
                
                $result = mysqli_query($conn, $sql2);
                if (!$result) {
                    $flag = false;
                    echo "Error details: " . mysqli_error($conn) . ".";
                }

                if ($flag) {
                    mysqli_commit($conn);
                    $set['result'][] = array('msg' => "Deposit Successful!", 'success'=>'1');
				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                } else {
                    mysqli_rollback($conn);
                    $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                }
            } else {
                $respon = array( 'success' => '0', 'msg' => 'Forbidden, Data Key is Required!');
                //$this->response($this->json($respon), 404);
            }


?>