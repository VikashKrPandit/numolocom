<?php
    require_once("Rest.inc.php");
    require_once("db.php");
    
    date_default_timezone_set("Asia/Kolkata");
    
    class functions extends REST {
        private $mysqli = NULL;
        private $db = NULL;
        
        public function __construct($db) {
            parent::__construct();
            $this->db = $db;
            $this->mysqli = $db->mysqli;
        }

    	public function checkConnection() {
    		if (mysqli_ping($this->mysqli)) {
                $respon = array(
                    'status' => 'ok', 'database' => 'connected'
                );
                $this->response($this->json($respon), 200);
    		} else {
                $respon = array(
                    'status' => 'failed', 'database' => 'not connected'
                );
                $this->response($this->json($respon), 404);
    		}
    	}
    	
    	
    	
        public function userRegister() {
            include "../admin/include/conn.php";
            
            if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']){
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
                echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                if(isset($_POST['referer'])) {
                    $device_id = mysqli_real_escape_string($conn, $_POST['device_id']);
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
                    $country_code = mysqli_real_escape_string($conn, $_POST['country_code']);
                    $phone_no = mysqli_real_escape_string($conn, $_POST['mobile']);
                    $referer = mysqli_real_escape_string($conn, $_POST['referer']);
                    $fcmToken = mysqli_real_escape_string($conn, $_POST['fcm_token']);
                    
                    $qry1 = "SELECT id FROM tbl_user WHERE username = '$username' OR mobile = '$phone_no'";
                    $sel1 = mysqli_query($conn, $qry1);
                    
                    $qry2 = "SELECT id FROM tbl_user WHERE device_id = '$device_id'";
                    $sel2 = mysqli_query($conn, $qry2);
                
                    if(mysqli_num_rows($sel1) > 0) {
                        $set['result'][]=array('msg' => "Username, email or mobile already used!", 'success'=>'0');
                        echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    } 
                    else if(mysqli_num_rows($sel2) > 2) {
                        $set['result'][]=array('msg' => "Please login with existing account. Multipal account not allowd!", 'success'=>'0');
                        echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    } 
                    else {
                        $qry3 = "SELECT id FROM tbl_user WHERE refer = '$referer'"; 
                        $sel3 = mysqli_query($conn, $qry3);
                        
                        if(mysqli_num_rows($sel3) > 0) {
                            mysqli_autocommit($conn, false);
                            $flag = true;
                    
                            $today = date("Y-m-d"); 
                            $date_created = date("Y-m-d h:i:s");
                            $current_time = time();
                             
                            $sql0 = "SELECT share_prize, download_prize FROM tbl_app_details WHERE id = '1'";
                            $sel0 = mysqli_query($conn, $sql0);
                            $row0 = mysqli_fetch_assoc($sel0);
                            $refer_bonus = $row0['share_prize'];
                            $referer_bonus = $row0['download_prize'];
                            
                            $qry_refered="SELECT id, cur_balance, bonus_balance, refered FROM tbl_user WHERE refer='$referer'";
                            $total_refered = mysqli_fetch_array(mysqli_query($conn,$qry_refered));
                            $id = $total_refered['id'];
                            $total = $total_refered['refered']+1;   
                            $bonus_balance = $total_refered['bonus_balance'];
                            $new_bonus_balance = $bonus_balance + $refer_bonus;
                           
                            $order_id = $id.$current_time;
                            
                            $sql1 = "INSERT INTO tbl_user (device_id, name, username, email, password, country_code, mobile, status, is_block, bonus_balance, refer, referer, created_date, fcm_token)
                                VALUES ('$device_id', '$name', '$username', '$email', '$password', '$country_code', '$phone_no', '1', '0', '$referer_bonus', '$username', '$referer', '$date_created', '$fcmToken')";
                                
                            $sql2 = "UPDATE tbl_user SET bonus_balance = '$new_bonus_balance', refered = '$total' WHERE refer = '$referer'";    
                            
                            $sql3 = "INSERT INTO tbl_referred (username, coins, referer, status, date)
                                VALUES ('$username', '$refer_bonus', '$referer', '1', '$today')";
                              
                            
                            $sql4 = "INSERT INTO tbl_transaction (user_id, order_id, req_amount, getway_name, remark, type, date, status) 
                                VALUES ('$id', '$order_id', '$refer_bonus', 'System', 'App Share Bonus', '0', '$current_time', '1')";
                                
                            $result = mysqli_query($conn, $sql1);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                            else {
                                $last_id = mysqli_insert_id($conn);
                                $order_id = $last_id.$current_time;
                                
                                
                                $sql5 = "INSERT INTO tbl_transaction (user_id, order_id, req_amount, getway_name, remark, type, date, status) 
                                VALUES ('$last_id', '$order_id', '$referer_bonus', 'System', 'App Download Bonus', '1', '$current_time', '1')";
                            }
                            
                            $result = mysqli_query($conn, $sql2);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                            
                            $result = mysqli_query($conn, $sql3);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                            
                            $result = mysqli_query($conn, $sql4);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                            
                            $result = mysqli_query($conn, $sql5);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                    
                            
                            if ($flag) {
                                mysqli_commit($conn);
                                $set['result'][] = array('id' => $last_id, 'msg' => "Your account has been register succesfully.", 'success'=>'1');
            				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                            } else {
                                mysqli_rollback($conn);
                                $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
            				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                            }
                        } else {
                            $set1['result'][]=array('msg' => "Referral code not found or wrong.", 'success'=>'0');
                            echo $val= str_replace('\\/', '/', json_encode($set1, JSON_UNESCAPED_UNICODE));
                        }
                                    
                    }
                } 
                else if(isset($_POST['email'])) {
                    $device_id = mysqli_real_escape_string($conn, $_POST['device_id']);
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
                    $country_code = mysqli_real_escape_string($conn, $_POST['country_code']);
                    $phone_no = mysqli_real_escape_string($conn, $_POST['mobile']);
                    $fcmToken = mysqli_real_escape_string($conn, $_POST['fcm_token']);
                    
                    $qry1 = "SELECT id FROM tbl_user WHERE username = '$username' OR mobile = '$phone_no'";
                    $sel1 = mysqli_query($conn, $qry1);
                    
                    $qry2 = "SELECT id FROM tbl_user WHERE device_id = '$device_id'";
                    $sel2 = mysqli_query($conn, $qry2);
                
                    if(mysqli_num_rows($sel1) > 0) {
                        $set['result'][]=array('msg' => "Username, email or mobile already used!", 'success'=>'0');
                        echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    } 
                    else if(mysqli_num_rows($sel2) > 2) {
                        $set['result'][]=array('msg' => "Please login with existing account. Multipal account not allowd!", 'success'=>'0');
                        echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    }
                    else {
                        mysqli_autocommit($conn, false);
                        $flag = true;
                
                        $date_created = date("Y-m-d h:i:s");
                
                            
                        $sql1 = "INSERT INTO tbl_user (device_id, name, username, email, password, country_code, mobile, status, is_block, refer, created_date, fcm_token)
                                VALUES ('$device_id', '$name', '$username', '$email', '$password', '$country_code', '$phone_no', '1', '0', '$username', '$date_created', '$fcmToken')";
                            
                        $result = mysqli_query($conn, $sql1);
                        if (!$result) {
                            $flag = false;
                            echo "Error details: " . mysqli_error($conn) . ".";
                        }
                        else {
                            $last_id = mysqli_insert_id($conn);
                        }
                        
                        if ($flag) {
                            mysqli_commit($conn);
                            $set['result'][] = array('id' => $last_id, 'msg' => "Your account has been register succesfully.", 'success'=>'1');
        				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                        } else {
                            mysqli_rollback($conn);
                            $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
        				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                        }
                    }
                }
                else {
                     header( 'Content-Type: application/json; charset=utf-8' );
                     $json = json_encode($set);
                     echo $json;
                }
            }
            
            mysqli_close($conn);
        }
    	
    	
    	public function userLogin() {
            include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
                echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $mobile = mysqli_real_escape_string($conn, $_GET['mobile']);
                $password = mysqli_real_escape_string($conn, md5($_GET['password']));
                    
                $qry = "SELECT id, name, user_profile, username, email, dob, gender, status, is_block FROM tbl_user WHERE mobile = '$mobile' AND password = '$password'"; 
                $result = mysqli_query($conn, $qry);
                $num_rows = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                    
                if ($num_rows > 0 && $row['status'] == '1' && $row['is_block'] == '0') {
                    $set['result'][] = array('id' => $row['id'], 'name' => $row['name'], 'user_profile' => $row['user_profile'], 'username' => $row['username'], 'email' => $row['email'], 'gender' => $row['gender'], 'dob' => $row['dob'], 'msg' => 'Login Successfully', 'success' => '1'); 
                } else if ($num_rows > 0 && $row['status'] == '0') {
                    $set['result'][] = array('msg' => 'Your account is under reviewed 48 hours!', 'success' => '0');
                } else if ($num_rows > 0 && $row['is_block'] == '1') {
                    $set['result'][] = array('msg' => 'Your device has been locked.', 'success' => '0');
                } else {
                    $set['result'][] = array('msg' => 'Incorrect username or password', 'success' => '0');
                }
                 
                header( 'Content-Type: application/json; charset=utf-8' );
                $json = json_encode($set);
                echo $json;
            }
            
            mysqli_close($conn);
        }
    
    	
    	public function userWallet() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $id = mysqli_real_escape_string($conn, $_GET["id"]);
                
        		$qry = "SELECT cur_balance, won_balance, bonus_balance, status, is_block FROM tbl_user WHERE id = '$id'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'cur_balance' => $row['cur_balance'],
        			'won_balance' => $row['won_balance'],
        			'bonus_balance' => $row['bonus_balance'],
        			'status' => $row['status'],
        			'is_block' => $row['is_block'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
        		echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	
    	
    	public function updateUserProfile() {
    		include "../admin/include/conn.php";
    
            if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']) {
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            } 
            else {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                
                if(isset($_POST['password'])) {
                    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
                    
                    $sql = "UPDATE tbl_user SET password = '$password' WHERE id = '$id'";
        			
        			if (mysqli_query($conn, $sql)) {
                        $set['result'][] = array('msg' => "Password updated succesfully.", 'success'=>'1');
        			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    } else {
                        $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
        			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    }
        		} 
        		else if(isset($_POST['fcm_token'])) {
        		    $fcm_token = mysqli_real_escape_string($conn, $_POST['fcm_token']);
        		    
        			$sql = "UPDATE tbl_user SET fcm_token = '$fcm_token' WHERE id = '$id'";
        			
        			if (mysqli_query($conn, $sql)) {
                        $set['result'][] = array('msg' => "Token updated succesfully.", 'success'=>'1');
        			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    } else {
                        $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
        			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    }
        		} 
        		else {
        		    $name = mysqli_real_escape_string($conn, $_POST['name']);
        		    $email = mysqli_real_escape_string($conn, $_POST['email']);
        		    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        		    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        		    
        			$sql = "UPDATE tbl_user SET name = '$name', email = '$email', gender = '$gender', dob = '$dob' WHERE id = '$id'";
        			
        			if (mysqli_query($conn, $sql)) {
                        $set['result'][] = array('msg' => "Profile updated succesfully.", 'success'=>'1');
        			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    } else {
                        $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
        			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    }
        		}
			} 
			
			mysqli_close($conn);
		}
		
		
		public function updateUserPhoto() {
            include "../admin/include/conn.php";
                
            if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']) {
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            } 
            else if(isset($_POST['id'])) {
                $data = $_POST['user_profile'];
                $id = mysqli_real_escape_string($conn, $_POST["id"]);
    
                $sql = "select count(id) as totrow from tbl_user where id = '$id'";
                $res = mysqli_query($conn, $sql);
                $res_count = mysqli_fetch_array($res);  
                $response = array();
            
                if($res_count['totrow'] > 0) {
                    $path = "$id.jpg";
                    $actualpath = "../upload/avatar/$path";
                    $actuallink = "upload/avatar/$path";
                    
                    $qry = "UPDATE tbl_user SET user_profile='$actuallink' where id = '$id'";
                    $result = mysqli_query($conn,$qry);
            
                    if(mysqli_query($conn,$qry)){
                        file_put_contents($actualpath,base64_decode($data));
                    }
                    
                    $success = "1";
                    $msg = "Your profile has been update successfully.";
                    array_push($response, array("success"=>$success,"msg"=>$msg));
                    echo json_encode($response);
                }
                else {
                     $success = "0";
                     $msg = "Your profile not found in our record.";
                     array_push($response, array("success"=>$success,"msg"=>$msg));
                     echo json_encode($response);
                }
            } 
            else {
                $respon = array( 'success' => '0', 'msg' => 'Forbidden, API Key is Required!');
                $this->response($this->json($respon), 404);
            }
            
            mysqli_close($conn);
        }
        

        public function forgotUserPassword() {
    		include "../admin/include/conn.php";
    
            if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']) {
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            } 
            else {
                $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
                $password = mysqli_real_escape_string($conn, md5($_POST['password']));
                
                $sql = "UPDATE tbl_user SET password = '$password' WHERE mobile = '$mobile'";
        			
    			if (mysqli_query($conn, $sql)) {
                    $set['result'][] = array('msg' => "Password updated succesfully.", 'success'=>'1');
    			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                } else {
                    $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
    			    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                }
			} 
			
			mysqli_close($conn);
		}
    	
    	
    	public function verifyUserMobile() {
            include "../admin/include/conn.php";
                
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else if (isset($_GET['mobile'])) {
                $mobile = mysqli_real_escape_string($conn, $_GET['mobile']);
            
                $qry = "SELECT status, is_block FROM tbl_user WHERE mobile = '$mobile'"; 
                $result = mysqli_query($conn, $qry);
                $num_rows = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                    
                if ($num_rows > 0 && $row['status'] == '1' && $row['is_block'] == '0') {         
                    $set['result'][] = array('msg' => 'Success', 'success' => '1'); 
                } else if ($num_rows > 0 && $row['status'] == '0') {
                    $set['result'][] = array('msg' => 'Your account has been locked.', 'success' => '0');
                } else if ($num_rows > 0 && $row['is_block'] == '1') {
                    $set['result'][] = array('msg' => 'Your device has been locked.', 'success' => '0');
                } else {
                    $set['result'][] = array('msg' => 'User mobile number not found. Try to register with same number.', 'success' => '0');
                }
                 
                header( 'Content-Type: application/json; charset=utf-8' );
                $json = json_encode($set);
                echo $json;
            } else{
                $respon = array( 'success' => '0', 'msg' => 'Forbidden, Data Key is Required!');
                $this->response($this->json($respon), 404);
            }
        
            mysqli_close($conn);
        }
        
        
        
        
        public function getUpcomingContest() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $currenttime = time();
                
        		$qry = "SELECT id, start_time FROM tbl_contest WHERE status = '1' ORDER BY id DESC LIMIT 0,1";
        		$result = mysqli_query($conn, $qry);	 
        		
        		if(mysqli_num_rows($result) > 0) {
    			    $row = mysqli_fetch_assoc($result);
        						 
            		$set['result'][] = array(
            		    'id' => $row['id'],
            			'start_time' => $row['start_time'],
            			'current_time' => $currenttime,
            			'success'=>'1'
            		);
            
            		header( 'Content-Type: application/json; charset=utf-8' );
            		$json = json_encode($set);
            		echo $json;
    			} else {
    				$set['result'][] = array(
            			'success'=>'0'
            		);
            
            		header( 'Content-Type: application/json; charset=utf-8' );
            		$json = json_encode($set);
            		echo $json;
    			}
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getLiveContest() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $currenttime = time();
                
        		$qry = "SELECT id, end_time FROM tbl_contest WHERE status = '2' ORDER BY id DESC LIMIT 0,1";
        		$result = mysqli_query($conn, $qry);	 
        		
        		if(mysqli_num_rows($result) > 0) {
            		$row = mysqli_fetch_assoc($result);
            						 
            		$set['result'][] = array(
            		    'id' => $row['id'],
            			'end_time' => $row['end_time'],
            			'current_time' => $currenttime,
            			'success'=>'1'
            		);
            
            		header( 'Content-Type: application/json; charset=utf-8' );
            		$json = json_encode($set);
            		echo $json;
        		} else {
    				$set['result'][] = array(
            			'success'=>'0'
            		);
            
            		header( 'Content-Type: application/json; charset=utf-8' );
            		$json = json_encode($set);
            		echo $json;
    			}
            }
            
            mysqli_close($conn);
    	}
    	
        
    	public function getContestStatus() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
          		$qry = "SELECT count(case when status = '1' THEN start_time END) AS upcoming_contest, count(case when status = '2' THEN end_time END) AS live_contest from tbl_contest";
        		$result = mysqli_query($conn, $qry);	 
        		
        		while($row = mysqli_fetch_assoc($result)){  				 
            		$set['result'][] = array(
            			'upcoming_contest' => $row['upcoming_contest'],
            			'live_contest'=>$row['live_contest'],
            			'success'=>'1'
            		);
        		}
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
        		echo $json;
            }
            
            mysqli_close($conn);
		}
		
  
    	
    	
    	public function getPackages() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                
                $query = "SELECT id, pkg_name,pkg_status 
                FROM tbl_packages
                GROUP BY id 
                ORDER BY id ASC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	
        public function getContest() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $contest_id = mysqli_real_escape_string($conn, $_GET["contest_id"]);
                $pkg_id = mysqli_real_escape_string($conn, $_GET["pkg_id"]);
                
                $query = "SELECT t1.id, t1.price, t1.question, t1.no_of_winners, t1.no_of_tickets, t1.answer_key,t1.status as feeMasterStatus, COUNT(t2.id) AS no_of_sold,t5.id as contestID,t5.status as contestStatus,t5.start_time as contestStartTime,t5.end_time contestEndTime,t2.user_id,
				(SELECT prize FROM prizepool_master AS t3 WHERE t3.fees_id = t1.id AND rank = '1') AS first_prize,
				(SELECT SUM(prize) FROM prizepool_master AS t4 WHERE t4.fees_id = t1.id) AS total_prize
                FROM fees_master AS t1 
                LEFT JOIN tbl_participants AS t2 on (t1.id = t2.fees_id AND t2.contest_id = '$contest_id' AND t2.status = 0)
                LEFT JOIN tbl_contest AS t5 on (t5.id ='$contest_id' ) 
                WHERE t1.pkg_id = '$pkg_id'
                GROUP BY t1.id 
                ORDER BY t1.price ASC";
                

                
                
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	//new all contest api
    	  public function getAllContest() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
              
                
                /*$query = "SELECT tc.id as contestId ,tc.start_time,tc.end_time,tc.status,tc.pkg_id,tc.fee_id,fm.id as fmId,fm.pkg_id,fm.price,fm.question,fm.answer_key,fm.no_of_winners,fm.no_of_tickets,fm.created_date,fm.modify_date,fm.status as feeStatus ,fm.endDate,fm.endTime,fm.tbl_packages_status from tbl_contest as tc  
                left join fees_master as fm on tc.fee_id = fm.id
                left join tbl_participants as ps ps.fees_id = tc.fee_id
                
                order by tc.start_time  asc"; */
                
                    $query ="SELECT t1.id, t1.price, t1.question, t1.no_of_winners, t1.no_of_tickets, t1.answer_key,t1.status as feeMasterStatus, COUNT(t2.id) AS no_of_sold,t5.id as contestID,t5.status as contestStatus,t5.start_time as contestStartTime,t5.end_time contestEndTime, t5.pkg_id AS contest_pkg_id, t5.fee_id AS contest_fees_id, (SELECT prize FROM prizepool_master AS t3 WHERE t3.fees_id = t1.id AND rank = '1') AS first_prize,(SELECT SUM(prize) FROM prizepool_master AS t4 WHERE t4.fees_id = t1.id) AS total_prize
                            FROM fees_master AS t1 
                            LEFT JOIN tbl_participants AS t2 on (t1.id = t2.fees_id  AND   t2.status = 0)
                            LEFT JOIN tbl_contest AS t5 on (t5.fee_id = t1.id  )
                            WHERE t1.pkg_id = t5.pkg_id 
                            GROUP BY t1.id 
                            ORDER BY t1.price ASC";
                
                
                
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	//end new contest api
    	
    	
    	
    	public function getPriceSlots() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $fees_id = mysqli_real_escape_string($conn, $_GET["fees_id"]);
                
                $query = "SELECT rank, prize 
                FROM prizepool_master 
                WHERE fees_id = '$fees_id' 
                ORDER BY rank ASC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	
    	public function getTicketsSold() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $fees_id = mysqli_real_escape_string($conn, $_GET["fees_id"]);
                $contest_id = mysqli_real_escape_string($conn, $_GET["contest_id"]);
                
                $query = "SELECT username, ticket_no 
                FROM tbl_participants 
                WHERE contest_id = '$contest_id' AND fees_id = '$fees_id' 
                ORDER BY id ASC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	
    	
    	
    	public function addReportIssue() {
    		include "../admin/include/conn.php";
    
            if(!isset($_POST['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
    		else {
    		    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    		    $email = mysqli_real_escape_string($conn, $_POST['email']);
    		    $report = mysqli_real_escape_string($conn, $_POST['report']);
    		    
    		    $sql = "INSERT INTO tbl_report_issue (user_id, email, report) VALUES ('$user_id', '$email', '$report')";
                        
                if (mysqli_query($conn, $sql)) {
                    $set['result'][] = array('msg' => "Your feedback has been submited succesfully.", 'success'=>'1');
				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                } else {
                    $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                }
    		}
    		
    		mysqli_close($conn);
    	}

    	
    	// public function addTransaction() {
        //     include "../admin/include/conn.php";
                
        //     if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']) {
        //         $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    	// 		echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
        //     } 
        //     else if(isset($_POST['request_name']) && isset($_POST['id'])) {
        //         $id = mysqli_real_escape_string($conn, $_POST['id']);
        //         $request_name = mysqli_real_escape_string($conn, $_POST['request_name']);
        //         $req_from = mysqli_real_escape_string($conn, $_POST['req_from']);
        //         $req_amount = mysqli_real_escape_string($conn, $_POST['req_amount']);
        //         $getway_name = mysqli_real_escape_string($conn, $_POST['getway_name']);
        //         $ifsc_code = mysqli_real_escape_string($conn, $_POST['ifsc_code']);
                        
        //         $current_time = time();
        //         $order_id = $current_time.$id;
                
        //         $sql = "Select id from tbl_transaction WHERE user_id = '$id' AND is_withdraw = '1' AND type = '0' AND status = '0'";
        //         $res = mysqli_query($conn, $sql);
        //         $num_res = mysqli_num_rows($res);
                
        //         if ($num_res == 0) {    
        //             $qry = "SELECT cur_balance, won_balance, acc_status FROM tbl_user WHERE id = '$id'"; 
        //             $userdata = mysqli_fetch_array(mysqli_query($conn,$qry));
        //             $dep_balance = $userdata['cur_balance'];
        //             $won_balance = $userdata['won_balance'];
        //             $acc_status = $userdata['acc_status'];
        //             $tot_balance = $dep_balance + $won_balance;
                    
        //             if ($acc_status == '0') {
        //                 $set['result'][] = array('msg' => "oops! You haven't submit bank details or not approved yet.",'success'=>'0');
		// 				header( 'Content-Type: application/json; charset=utf-8' );
		// 				echo $json = json_encode($set);
        //             }
        //             else if ($won_balance >= $req_amount) {
        //                 mysqli_autocommit($conn, false);
        //                 $flag = true;
                        
        //                 $new_won_balance = $won_balance - $req_amount;

        //                 $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, request_name,req_from, req_amount, getway_name, remark, type, date, status, is_withdraw,ifsc_code) 
        //                 VALUES ('$id', '$order_id', '$request_name','$req_from', '$req_amount', '$getway_name', 'Withdraw Requested', '0', '$current_time', '0', '1','$ifsc_code')";
                    
        //                 $sql2 = "UPDATE tbl_user SET won_balance = '$new_won_balance' WHERE id = '$id'";    
                        
        //                 $result = mysqli_query($conn, $sql1);
        //                 if (!$result) {
        //                     $flag = false;
        //                     echo "Error details: " . mysqli_error($conn) . ".";
        //                 }
                        
        //                 $result = mysqli_query($conn, $sql2);
        //                 if (!$result) {
        //                     $flag = false;
        //                     echo "Error details: " . mysqli_error($conn) . ".";
        //                 }
    
        //                 if ($flag) {
        //                     mysqli_commit($conn);
        //                     $set['result'][] = array('msg' => "Withdraw Requested!", 'success'=>'1');
        // 				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
        //                 } else {
        //                     mysqli_rollback($conn);
        //                     $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
        // 				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
        //                 }
        //             } else {
		// 				$set['result'][] = array('msg' => "oops! You don't have enough winning balance to redeem.",'success'=>'0');
		// 				echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
		// 			}
        //         }
        //         else {
        //             $set['result'][] = array('msg' => "Oops! You can't send new withdraw request until old one review.",'success'=>'0');
        //             echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
        //         }
        //     } else if(isset($_POST['payment_id']) && isset($_POST['id'])) {
        //         $id = mysqli_real_escape_string($conn, $_POST['id']);
        //         $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);
        //         $req_amount = mysqli_real_escape_string($conn, $_POST['req_amount']);
        //         $getway_name = mysqli_real_escape_string($conn, $_POST['getway_name']);
        //         $ifsc_code = mysqli_real_escape_string($conn, $_POST['ifsc_code']);
        //         $current_time = time();
        //         $order_id = $current_time.$id;
                
        //         mysqli_autocommit($conn, false);
        //         $flag = true;
                        
        //         $sql0 = "SELECT cur_balance FROM tbl_user WHERE id = '$id'"; 
        //         $userdata = mysqli_fetch_array(mysqli_query($conn,$sql0));
        //         $dep_balance = $userdata['cur_balance'];
        //         $new_dep_balance = $dep_balance + $req_amount;
                
        //         $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, payment_id, req_amount, getway_name, remark, type, date, status, is_withdraw,ifsc_code) 
        //         VALUES ('$id', '$order_id', '$payment_id', '$req_amount', '$getway_name', 'Deposited', '1', '$current_time', '1', '0','$ifsc_code')";
            
        //         $sql2 = "UPDATE tbl_user SET cur_balance = '$new_dep_balance' WHERE id = '$id'";    
                
        //         $result = mysqli_query($conn, $sql1);
        //         if (!$result) {
        //             $flag = false;
        //             echo "Error details: " . mysqli_error($conn) . ".";
        //         }
                
        //         $result = mysqli_query($conn, $sql2);
        //         if (!$result) {
        //             $flag = false;
        //             echo "Error details: " . mysqli_error($conn) . ".";
        //         }

        //         if ($flag) {
        //             mysqli_commit($conn);
        //             $set['result'][] = array('msg' => "Deposit Successful!", 'success'=>'1');
		// 		    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
        //         } else {
        //             mysqli_rollback($conn);
        //             $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
		// 		    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
        //         }
        //     } else {
        //         $respon = array( 'success' => '0', 'msg' => 'Forbidden, Data Key is Required!');
        //         $this->response($this->json($respon), 404);
        //     }
            
        //     mysqli_close($conn); 
        // }
        
        public function addTransaction() {
            include "../admin/include/conn.php";
                
            if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']) {
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            } 
            else if(isset($_POST['request_name']) && isset($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $request_name = mysqli_real_escape_string($conn, $_POST['request_name']);
                $req_from = mysqli_real_escape_string($conn, $_POST['req_from']);
                $req_amount = mysqli_real_escape_string($conn, $_POST['req_amount']);
                $getway_name = mysqli_real_escape_string($conn, $_POST['getway_name']);
                        
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

                        $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, request_name, req_from, req_amount, getway_name, remark, type, date, status, is_withdraw) 
                        VALUES ('$id', '$order_id', '$request_name', '$req_from', '$req_amount', '$getway_name', 'Withdraw Requested', '0', '$current_time', '0', '1')";
                    
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
                
                mysqli_autocommit($conn, false);
                $flag = true;
                        
                $sql0 = "SELECT cur_balance,bonus_balance FROM tbl_user WHERE id = '$id'";
                $userdata = mysqli_fetch_array(mysqli_query($conn,$sql0));
                $getBonusORQ=mysqli_query($conn,"SELECT bonus_on_recharge FROM tbl_app_details WHERE id = '1' limit 1"); 
                if(mysqli_num_rows($getBonusORQ)>0){
                    $ftchBonusRechargePrt=mysqli_fetch_assoc($getBonusORQ);
                    $bonusRechargePrt=$ftchBonusRechargePrt['bonus_on_recharge'];
                }
                $dep_balance = $userdata['cur_balance'];
                $user_b_bal=$userdata['bonus_balance'];
                $p_bonus_balance = round(($req_amount * $bonusRechargePrt) / 100);
                $new_bonus_bal=$user_b_bal+$p_bonus_balance;
                $new_dep_balance = $dep_balance + $req_amount;
                
                $sql1 = "INSERT INTO tbl_transaction (user_id, order_id, payment_id, req_amount, getway_name, remark, type, date, status, is_withdraw) 
                VALUES ('$id', '$order_id', '$payment_id', '$req_amount', '$getway_name', 'Deposited', '1', '$current_time', '1', '0')";
            
                $sql2 = "UPDATE tbl_user SET cur_balance = '$new_dep_balance',bonus_balance='$new_bonus_bal' WHERE id = '$id'";    
                
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
                $this->response($this->json($respon), 404);
            }
            
            mysqli_close($conn); 
        }
        
        public function addTickets() {
            include "../admin/include/conn.php";
                
            //if(!isset($_POST['access_key']) || $pur_code != $_POST['access_key']) {
            if($pur_code != $_POST['access_key']) {
                $set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            } 
             else if(isset($_POST['contest_id']) && isset($_POST['fees_id'])) {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $contest_id = mysqli_real_escape_string($conn, $_POST['contest_id']);
                $fees_id = mysqli_real_escape_string($conn, $_POST['fees_id']);
                $entry_fee = mysqli_real_escape_string($conn, $_POST['entry_fee']);
                $ticket_no = mysqli_real_escape_string($conn, $_POST['ticket_no']);
                
                $current_time = time();
                $order_id = $id.time();
                $remark = 'Contest Fee #'.$contest_id;
                
                $sql0 = "SELECT bonus_used FROM tbl_app_details WHERE id = '1'";
                $sel0 = mysqli_query($conn, $sql0);
                $row0 = mysqli_fetch_assoc($sel0);
                $use_of_bonus = $row0['bonus_used'];
                $bonus = round(($use_of_bonus * $entry_fee) / 100);
                        
                $qry1 = "SELECT status FROM tbl_contest WHERE id = '$contest_id'"; 
                $row1 = mysqli_fetch_array(mysqli_query($conn,$qry1));
                $status = $row1['status'];
                
                $qry2 = "SELECT cur_balance, won_balance, bonus_balance FROM tbl_user WHERE id = '$id'"; 
                $row2 = mysqli_fetch_array(mysqli_query($conn,$qry2));
                $depoit_balance1 = $row2['cur_balance']; 
                $won_balance1 = $row2['won_balance'];
                $bonus_balance1 = $row2['bonus_balance'];
                
                if($status != 2) {
                    $set['result'][] = array('msg' => "Opps! you can't Join Contest due to contest is over. please wait to start upcoming contest.", 'success'=>'0');
            		echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                } else if ($bonus_balance1 >= $bonus) {
                    $total_balance = $depoit_balance1 + $won_balance1 + $bonus;
                    
                    if ($total_balance >= $entry_fee) {
                        $qry3 = "SELECT t1.no_of_tickets, COUNT(t2.id) AS no_of_sold
                        FROM fees_master t1
                        LEFT JOIN tbl_participants t2 ON (t1.id = t2.fees_id)
                        WHERE t2.contest_id = '$contest_id' AND t2.fees_id =$fees_id"; 
                        $row3 = mysqli_fetch_array(mysqli_query($conn,$qry3));
                        $no_of_tickets = $row3['no_of_tickets'];
                        //$no_of_tickets = 10;
                        $no_of_sold = $row3['no_of_sold'];
                    
                        if($no_of_sold < $no_of_tickets || $no_of_sold==0 || $no_of_tickets==NULL ) {
                            mysqli_autocommit($conn, false);
                            $flag = true;
                
                            $dep_bonus_balance = $depoit_balance1 + $bonus;
                            if($dep_bonus_balance >= $entry_fee) {
                                $depoit_balance2 = $depoit_balance1 - ($entry_fee - $bonus);
                                $won_balance2 = $won_balance1;
                                $bonus_balance2 = $bonus_balance1 - $bonus;
                            }
                            else {
                                $depoit_balance2 = '0';
                                $won_balance2 = $won_balance1 - ($entry_fee - $dep_bonus_balance);
                                $bonus_balance2 = $bonus_balance1 - $bonus;
                            }
                    
                            $sql1 = "INSERT INTO tbl_participants (contest_id, fees_id, user_id, username, entry_fee, ticket_no, date_created, status) 
                            VALUES ('$contest_id', '$fees_id', '$id', '$username', '$entry_fee', '$ticket_no', '$current_time', '0')";
                            
                            $sql2 = "UPDATE tbl_user SET cur_balance = '$depoit_balance2', won_balance = '$won_balance2', bonus_balance = '$bonus_balance2' WHERE id = '$id'";    
                            
                            $sql3 = "INSERT INTO tbl_transaction (user_id, order_id, req_amount, getway_name, remark, type, date, status, is_withdraw) 
                            VALUES ('$id', '$order_id', '$entry_fee', 'System', '$remark', '0', '$current_time', '1', '0')";
                    
                            
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
        
                            $result = mysqli_query($conn, $sql3);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                            
                            if ($flag) {
                                mysqli_commit($conn);
                                $set['result'][] = array('msg' => "You succesfully registred on this contest.", 'success'=>'1');
            				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                            } else {
                                mysqli_rollback($conn);
                                $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
            				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                            }
                        }
                        else {
                            $set['result'][] = array('msg' => "All tickets sold of this .", 'success'=>'0');
            				echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                        }
                    }
                    else {
                        $set['result'][]=array('msg' => "You have not enough deposit or winning balance to participate.", 'success'=>'0');
                        echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    }
                }
                else {
                    $total_balance = $depoit_balance1 + $won_balance1 + $bonus_balance1;
                    
                    if ($total_balance >= $entry_fee) {
                        $qry3 = "SELECT t1.no_of_tickets, COUNT(t2.id) AS no_of_sold
                        FROM fees_master t1
                        LEFT JOIN tbl_participants t2 ON (t1.id = t2.fees_id)
                        WHERE t2.contest_id = '$contest_id' AND t2.fees_id = $fees_id"; 
                        $row3 = mysqli_fetch_array(mysqli_query($conn,$qry3));
                        $no_of_tickets = $row3['no_of_tickets']; 
                        $no_of_sold = $row3['no_of_sold'];
                    
                        if($no_of_sold < $no_of_tickets || $no_of_sold==0 || $no_of_tickets==NULL ) {
                            mysqli_autocommit($conn, false);
                            $flag = true;
                
                            $dep_bonus_balance = $depoit_balance1 + $bonus_balance1;
                            if($dep_bonus_balance >= $entry_fee) {
                                $depoit_balance2 = $depoit_balance1 - ($entry_fee - $bonus_balance1);
                                $won_balance2 = $won_balance1;
                                $bonus_balance2 = '0';
                            }
                            else {
                                $depoit_balance2 = '0';
                                $won_balance2 = $won_balance1 - ($entry_fee - $dep_bonus_balance);
                                $bonus_balance2 = '0';
                            }
                            
                            $sql1 = "INSERT INTO tbl_participants (contest_id, fees_id, user_id, username, entry_fee, ticket_no, date_created, status) 
                            VALUES ('$contest_id', '$fees_id', '$id', '$username', '$entry_fee', '$ticket_no', '$current_time', '0')";
                            
                            $sql2 = "UPDATE tbl_user SET cur_balance = '$depoit_balance2', won_balance = '$won_balance2', bonus_balance = '$bonus_balance2' WHERE id = '$id'";    
                            
                            $sql3 = "INSERT INTO tbl_transaction (user_id, order_id, req_amount, getway_name, remark, type, date, status, is_withdraw) 
                            VALUES ('$id', '$order_id', '$entry_fee', 'System', '$remark', '0', '$current_time', '1', '0')";
                            
                            
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
        
                            $result = mysqli_query($conn, $sql3);
                            if (!$result) {
                                $flag = false;
                                echo "Error details: " . mysqli_error($conn) . ".";
                            }
                            
                            if ($flag) {
                                mysqli_commit($conn);
                                $set['result'][] = array('msg' => "You succesfully registred on this contest.", 'success'=>'1');
            				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                            } else {
                                mysqli_rollback($conn);
                                $set['result'][] = array('msg' => "Please try again later.", 'success'=>'0');
            				    echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                            }
                        }
                        else {
                            $set['result'][] = array('msg' => "All tickets sold of this fees-----.", 'success'=>'0');
            				echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                        }
                    }
                    else {
                        $set['result'][]=array('msg' => "You have not enough deposit or winning balance to participate.", 'success'=>'0');
                        echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
                    }
                }
            } 
            else {
                $respon = array( 'success' => '0', 'msg' => 'Forbidden, API Key is Required!');
                $this->response($this->json($respon), 404);
            }
            
            mysqli_close($conn); 
        }
        
       
        
    	
    	public function getMyTickets() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $contest_id = mysqli_real_escape_string($conn, $_GET["contest_id"]);
                
                $query = "SELECT t1.id, t1.price, t1.no_of_winners, t1.no_of_tickets, COUNT(CASE WHEN t2.user_id = '$user_id' THEN t2.id END) AS no_of_bought, from_unixtime(t2.date_created, '%d/%m/%Y') AS date, 
                (SELECT SUM(t3.prize) FROM prizepool_master as t3 WHERE t3.fees_id = t1.id) AS total_prize,
                (SELECT COUNT(t4.id) FROM tbl_participants as t4 WHERE t4.contest_id = '$contest_id' AND t4.fees_id = t1.id AND t4.status = '0') AS no_of_sold,
                t5.status, t6.pkg_name
                FROM fees_master AS t1 
                LEFT JOIN tbl_participants AS t2 on (t1.id = t2.fees_id AND t2.status = 0) 
                LEFT JOIN tbl_contest AS t5 on (t2.contest_id = t5.id)
                LEFT JOIN tbl_packages t6 ON (t1.pkg_id = t6.id)
                WHERE t2.contest_id = '$contest_id' AND t2.user_id = '$user_id'
                GROUP BY t1.id 
                ORDER BY t1.price ASC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getMyTicketNo() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $contest_id = mysqli_real_escape_string($conn, $_GET["contest_id"]);
                $fees_id = mysqli_real_escape_string($conn, $_GET["fees_id"]);
                
        		$qry = "SELECT username, ticket_no, entry_fee, date_created 
        		FROM tbl_participants 
        		WHERE contest_id = '$contest_id' AND fees_id = '$fees_id' AND user_id = '$user_id' AND status = '0'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'username' => $row['username'],
        			'ticket_no' => $row['ticket_no'],
        			'entry_fee' => $row['entry_fee'],
        			'date_created' => $row['date_created'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
        		echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getHistory() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                
                $query = "SELECT from_unixtime(t1.start_time, '%h:%m:%s') AS time, from_unixtime(t1.start_time, '%d/%m/%Y') AS date, t2.contest_id 
                FROM tbl_contest AS t1
                LEFT JOIN tbl_participants AS t2 ON (t1.id = t2.contest_id) 
                WHERE t1.status = '4' AND t2.user_id = '$user_id' 
                GROUP BY t2.contest_id 
                ORDER BY t2.contest_id DESC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
        
    	public function getMyResults() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $contest_id = mysqli_real_escape_string($conn, $_GET["contest_id"]);
                
                $query = "SELECT t1.fees_id, t1.ticket_no, t1.entry_fee, t1.win_prize,t2.answer_key, t3.pkg_name  
                FROM tbl_participants t1
                LEFT JOIN fees_master AS t2 ON (t2.id = t1.fees_id)
                LEFT JOIN tbl_packages t3 ON (t3.id = t2.pkg_id)
                WHERE t1.contest_id = '$contest_id' AND t1.user_id = '$user_id' 
                GROUP BY t1.id ORDER BY t1.id DESC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	
    	public function getTopWinners() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $contest_id = mysqli_real_escape_string($conn, $_GET["contest_id"]);
                $fees_id = mysqli_real_escape_string($conn, $_GET["fees_id"]);
                
                $query = "SELECT username, ticket_no, win_prize,rank FROM tbl_participants WHERE contest_id = '$contest_id' AND fees_id = '$fees_id' AND win_prize != '0' GROUP BY id ORDER BY rank ASC";
        	    $result = mysqli_query($conn,$query);
        
                if($result){
                	while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
            	    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
    	
    	
    	
        
        public function getTransactions() {
            include "../admin/include/conn.php";
                
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $flag = array();
        
                $query = "SELECT order_id, payment_id, req_amount, remark, type, from_unixtime(date, '%d-%m-%Y') AS date, status FROM tbl_transaction WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 0,20";
                $result = mysqli_query($conn,$query);
        
                if($result){
                    while($row=mysqli_fetch_array($result)){
                        $flag[]=$row;
                    }
                    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            } 
            
            mysqli_close($conn);
        }
       
        
        public function getNotification() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
                $flag = array();
                $date_created = date("Y-m-d h:i:s");
                
                $query = "SELECT title, description as message, poster as image, url, created FROM tbl_notification ORDER BY id DESC LIMIT 0,10";
                $result = mysqli_query($conn,$query);
               
                if($result){
                    while($row=mysqli_fetch_array($result)){
                        $flag[]= array(
                            'title' => $row['title'],
                            'message' => $row['message'],
                            'image' => $row['image'],
                            'price' => $row['price'],
                            'url' => $row['url'],
                            'created' => $row['created'],
                            'current_time' => $date_created,
                            'success'=>'1'
                        );
                    }
                    header( 'Content-Type: application/json; charset=utf-8' );
                    print(json_encode($flag));
                }
            }
            mysqli_close($conn);
    	}
        
    	
    	
    	
    	public function getAppDetails() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
        		$qry = "SELECT tawkto_chat_link, currency_sign, country_code, mop, wallet_mode, maintenance_mode, upi, upi_mc, upi_tn, upi_pn, upi_token, paytm_mer_id, razorpay_api_key, share_prize, download_prize, bonus_used, min_withdraw, max_withdraw, min_deposit, max_deposit, force_update, whats_new, update_date, latest_version_name, latest_version_code, update_url FROM tbl_app_details";
        		$result = mysqli_query($conn, $qry);	 
        		$num_rows = mysqli_num_rows($result);
        		$row = mysqli_fetch_assoc($result);
        		
        		if ($num_rows > 0 ) { 		 
        			$set['result'][] = array(
        			    'tawkto_chat_link' => $row['tawkto_chat_link'],
        			    'currency_sign' => $row['currency_sign'],
            			'country_code' => $row['country_code'],
            			'mop' => $row['mop'],
            			'wallet_mode' => $row['wallet_mode'],
            			'maintenance_mode' => $row['maintenance_mode'],
            			'upi' => $row['upi'],
            			'upi_mc' => $row['upi_mc'],
            			'upi_tn' => $row['upi_tn'],
            			'upi_pn' => $row['upi_pn'],
            			'upi_token' => $row['upi_token'],
            			'paytm_mer_id' => $row['paytm_mer_id'],
            			'razorpay_api_key' => $row['razorpay_api_key'],
            			'share_prize' => $row['share_prize'],
            			'download_prize' => $row['download_prize'],
                        'bonus_used' => $row['bonus_used'],
                        'min_withdraw' => $row['min_withdraw'],
                        'max_withdraw' => $row['max_withdraw'],
                        'min_deposit' => $row['min_deposit'],
                        'max_deposit' => $row['max_deposit'],
            			'force_update' => $row['force_update'],
                        'whats_new' => strip_tags($row['whats_new']),
                        'update_date' => $row['update_date'],
                        'latest_version_name' => $row['latest_version_name'],
                        'latest_version_code' => $row['latest_version_code'],
                        'update_url' => $row['update_url'],
            			'success'=>'1'
            		);
        		} else {
        			$set['result'][] = array('msg' => 'Error', 'success' => '0');
        		}
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
        
        		echo $json;
            }
            
            mysqli_close($conn);
    	}
	
    	
    	public function getAboutUs() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
        		$qry = "SELECT about FROM tbl_configuration WHERE id = '1'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'about' => $row['about'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
        		echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getContactUs() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
        		$qry = "SELECT contact FROM tbl_configuration WHERE id = '1'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'contact' => $row['contact'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
                echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getFAQ() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
        		$qry = "SELECT faq FROM tbl_configuration WHERE id = '1'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'faq' => $row['faq'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
                echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getPrivacyPolicy() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
        		$qry = "SELECT privacy FROM tbl_configuration WHERE id = '1'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'privacy' => $row['privacy'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
                echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
    	
    	public function getTermsCondition() {
    		include "../admin/include/conn.php";
    
            if(!isset($_GET['access_key']) || $pur_code != $_GET['access_key']){
        		$set['result'][]=array('msg' => "Invalid Access Key", 'success'=>'0');
    			echo $val= str_replace('\\/', '/', json_encode($set, JSON_UNESCAPED_UNICODE));
            }
            else {
        		$qry = "SELECT terms FROM tbl_configuration WHERE id = '1'";
        		$result = mysqli_query($conn, $qry);	 
        		$row = mysqli_fetch_assoc($result);
        						 
        		$set['result'][] = array(
        			'terms' => $row['terms'],
        			'success'=>'1'
        		);
        
        		header( 'Content-Type: application/json; charset=utf-8' );
        		$json = json_encode($set);
                echo $json;
            }
            
            mysqli_close($conn);
    	}
    	
        
    }
?>