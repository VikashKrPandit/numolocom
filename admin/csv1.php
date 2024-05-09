<?php
//function generateCsv1($conn,$input=null){
    include('include/security.php');
    /**
     * CSV Export functionality using PHP.
     *
     * @author Mehul Gohil
     */
    $data=array();
    // Start the output buffer.
    ob_start();
    
    // Set PHP headers for CSV output.
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=csv_export.csv');
    
    // Create the headers.
    $header_args = array( 'ID','Username','Mobile','OrderId','PaymentId','Ammount','Wallet','AccountName','AccountNo','IFSC Code','Date','Remark','Status' );
    
    // Prepare the content to write it to CSV file.
    $fetchCsv =$conn->query("SELECT u.id, u.username,u.mobile,t.order_id,t.payment_id,t.req_amount,t.getway_name,u.acc_name,u.acc_no,u.ifsc_code,from_unixtime(t.date, '%d-%m-%Y') AS date,t.remark,IF(t.status=1,'Approved','Rejected') AS status FROM `tbl_transaction` AS `t` LEFT JOIN `tbl_user` AS `u` ON (`u`.`id` = `t`.`user_id`)");
    if(mysqli_num_rows($fetchCsv)>0){
        
        while($csvR = $fetchCsv->fetch_assoc()){
            //print_r($csvR);
           /*  $data = array(
                array($csvR['id'], $csvR['name'], $csvR['email'],$csvR['phone']),
                //array('2', 'Test 2', 'test2@test.com'),
                //array('3', 'Test 3', 'test3@test.com'),
            ); */
            $data[]=$csvR;
        }
     
    }
    
    
    // Clean up output buffer before writing anything to CSV file.
    ob_end_clean();
    
    // Create a file pointer with PHP.
    $output = fopen( 'php://output', 'w' );
    
    // Write headers to CSV file.
    fputcsv( $output, $header_args );
    
    // Loop through the prepared data to output it to CSV file.
    foreach( $data as $key=> $data_item ){
        print_r($key);
        fputcsv( $output, $data_item );
    }
    
    // Close the file pointer with PHP with the updated output.
    fclose( $output );
    exit;
    
    /*
    SELECT u.username,u.mobile,t.order_id,t.payment_id,t.req_amount,t.getway_name,u.acc_no,t.date,t.remark,t.status FROM `tbl_transaction` AS `t` LEFT JOIN `tbl_user` AS `u` ON (`u`.`id` = `t`.`user_id`);
    
    SELECT u.username,u.mobile,t.order_id,t.payment_id,t.req_amount,t.getway_name,u.acc_no,t.date,t.remark,IF(t.status=1,"Approved","Rejected") AS status FROM `tbl_transaction` AS `t` LEFT JOIN `tbl_user` AS `u` ON (`u`.`id` = `t`.`user_id`);
    */
//}
